<?php
date_default_timezone_set('Asia/Jakarta');

class Pembelian extends CI_Model
{
    public function getListPembelian()
    {
        $qry = $this->db->query("SELECT COUNT(*) totBeli FROM master_pembelian WHERE `status` = '0'")->row();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getSupplier()
    {
        $qry = $this->db->query("SELECT * FROM supplier")->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function kodeOtomatis()
    {
        // Hapus data temporary hari sebelumnya
        $qry = $this->db->query(
            "SELECT 
                id_tem
            FROM tem_pembelian
            WHERE 
                SUBSTR(kd_pembelian, 4, 2) != if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_pembelian, 6, 2) != if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))"
        )->result_array();

        if ($qry) {
            for ($i = 0; $i < count($qry); $i++) {
                $this->db->delete("tem_pembelian", array("id_tem" => $qry[$i]['id_tem']));
            }
        }

        // Ambil kode pembelian terbaru
        $qry2 = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_pembelian, 10, 5)) AS kode,
                SUBSTR(kd_pembelian, 4, 2) AS day,
                SUBSTR(kd_pembelian, 6, 2) AS month,
                SUBSTR(kd_pembelian, 8, 2) as year
            FROM master_pembelian
            WHERE 
                SUBSTR(kd_pembelian, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_pembelian, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_pembelian, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry2[0]['kode'];
        $urutan++;

        $kodeBeli = "BLI";
        $day   = date("d");
        $month = date("m");
        $year  = substr(date("Y"), 2, 2);

        $getKode = $kodeBeli . $day . $month . $year . sprintf("%05s", $urutan);

        if ($getKode) {
            return $getKode;
        } else {
            return false;
        }
    }

    public function GetKodeBarang()
    {
        $qry = $this->db->get_where("kode_barang", array("status" => "1"))->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function GetBeliBarang($kodeBeli)
    {
        $qry = $this->db->get_where("tem_pembelian", array("kd_pembelian" => $kodeBeli))->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function insertDataDetail($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function insertDataPembelian($nik_admin, $tgl_pembelian, $kd_supplier, $kd_pembelian, $remark, $subTotal)
    {
        $getTem = $this->db->query(
            "SELECT 
                kd_pembelian
                , kd_barang
                , nama
                , satuan
                , harga
                , qty
                , total
            FROM 
                tem_pembelian 
            WHERE kd_pembelian = '$kd_pembelian'"
        )->result_array();

        $dateNow = date("Y-m-d H:i:s");

        $dataMaster = array(
            'kd_pembelian'    => $kd_pembelian,
            'tgl_pembelian'   => $tgl_pembelian . " " . date("H:i:s"),
            'nik_admin'       => $nik_admin,
            'kd_supplier'     => $kd_supplier,
            'total_pembelian' => $subTotal,
            'created_at'      => $dateNow
        );

        $datadetail = array();
        for ($i = 0; $i < count($getTem); $i++) {
            $detail = array(
                'kd_pembelian' => $getTem[$i]['kd_pembelian'],
                'kd_barang'    => $getTem[$i]['kd_barang'],
                'satuan'       => $getTem[$i]['satuan'],
                'harga_beli'   => $getTem[$i]['harga'],
                'qty'          => $getTem[$i]['qty'],
                'qty_sisa'     => $getTem[$i]['qty'],
                'total'        => $getTem[$i]['total']
            );
            array_push($datadetail, $detail);
        }

        $insMater  = $this->db->insert("master_pembelian", $dataMaster); // insert ke tabel master
        $insdetail = $this->db->insert_batch("detail_pembelian", $datadetail); // insert ke tabel detail

        if ($insMater && $insdetail) {
            if ($this->db->affected_rows() > 0) {
                for ($i = 0; $i < count($getTem); $i++) {
                    activity_log_barang($kd_pembelian, $kd_supplier, $getTem[$i]['kd_barang'], $getTem[$i]['qty'], '0', '0', $remark);
                }
            }

            $this->db->delete("tem_pembelian", array('kd_pembelian' => $kd_pembelian)); // hapus data di tabel sementara
            return true;
        } else {
            return false;
        }
    }

    public function delDetailPembelian($tabel, $idTem)
    {
        $data = $this->db->get_where($tabel, array('id_tem' => $idTem))->result_array();
        if ($this->db->affected_rows() > 0) {
            activity_log("Tambah Pembelian", "Delete", $data[0]["kd_pembelian"]);
            $action = $this->db->delete($tabel, array('id_tem' => $idTem));
            return $action;
        } else {
            return false;
        }
    }

    public function GetDataPembelian()
    {
        $qry = $this->db->query(
            "SELECT 
                a.kd_pembelian
                , a.tgl_pembelian
                , c.nama_supplier
                , sum(b.qty) qty
                , sum(b.qty_gudang) qty_gudang
                , sum(b.qty_batal) qty_batal
                , sum(b.qty_sisa) qty_sisa
                , a.total_pembelian
                , b.status_beli
            FROM 
                master_pembelian a
                LEFT JOIN detail_pembelian b ON a.kd_pembelian = b.kd_pembelian
                LEFT JOIN supplier c ON a.kd_supplier = c.kd_supplier
            WHERE a.status != '1'
            GROUP BY a.kd_pembelian
            ORDER BY a.tgl_pembelian ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getMasterpembelian($kd_pembelian)
    {
        $qry = $this->db->query(
            "SELECT 
                a.kd_pembelian
                , a.tgl_pembelian
                , b.nama_supplier
            FROM
                master_pembelian a
                LEFT JOIN supplier b ON b.kd_supplier = a.kd_supplier
            WHERE
                kd_pembelian = '$kd_pembelian'"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function GetDetailPembelian($kd_pembelian)
    {
        $qry = $this->db->query(
            "SELECT 
                a.id_detail
                , a.kd_barang
                , b.nama_barang
                , a.satuan
                , a.harga_beli
                , a.qty
                , a.qty_sisa
                , a.qty_gudang
                , a.qty_batal
                , a.status_beli
                , a.total
            FROM 
                detail_pembelian a
                LEFT JOIN kode_barang b ON concat(b.kode,b.sub_kode) = a.kd_barang
            WHERE
                a.kd_pembelian = '$kd_pembelian'
                AND a.status != '1'
            "
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function GetQtyBli($id_detail)
    {
        $qry = $this->db->get_where("detail_pembelian", array("id_detail" => $id_detail))->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function CencelPembelian($kd_pembelian, $tglcencel, $remark)
    {
        $qry = "SELECT 
                    a.kd_pembelian
                    , a.kd_barang
                    , a.harga_beli
                    , sum(a.qty_sisa) qty_sisa
                    , sum(a.qty_gudang) qty_gudang
                    , sum(a.qty_batal) qty_batal
                    , b.kd_supplier
                FROM 
                    detail_pembelian a
                    LEFT JOIN master_pembelian b ON b.kd_pembelian = a.kd_pembelian
                WHERE
                    a.status != ?
                    AND a.kd_pembelian = ?";
        $res = $this->db->query($qry, array('1', $kd_pembelian))->row();

        $kdBarang   = $res->kd_barang;
        $kdSupplier = $res->kd_supplier;
        $qtySisa    = $res->qty_sisa;
        $qtyGudang  = $res->qty_gudang;
        $qtyBatal   = $res->qty_batal;
        $datecencel = $tglcencel . " " . date("H:i:s");

        if ($qtySisa != '0' && $qtyGudang == '0' && $qtyBatal == '0') {
            $data = array('status' => '1', 'created_at' => $datecencel);
            $this->db->where('kd_pembelian', $kd_pembelian);
            $req = $this->db->update('master_pembelian', $data);
            if ($req) {
                if ($this->db->affected_rows() > 0) {
                    activity_log_barang($kd_pembelian, $kdSupplier, $kdBarang, $qtySisa, '0', '0', $remark);
                    return true;
                } else {
                    return false;
                }
            } else {
                false;
            }
        } else {
            return false;
        }
    }
}
