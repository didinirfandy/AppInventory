<?php
date_default_timezone_set('Asia/Jakarta');

class Penjualan extends CI_Model
{
    public function GetDataPenjualan()
    {
        $qry = $this->db->query(
            "SELECT 
                a.kd_penjualan
                , date(a.tgl_penjualan) tgl_penjualan
                , sum(b.qty) qty
                , a.total_penjualan
            FROM 
                master_penjualan a
                LEFT JOIN detail_penjualan b ON a.kd_penjualan = b.kd_penjualan
            GROUP BY a.kd_penjualan
            ORDER BY a.tgl_penjualan ASC"
        )->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getMasterPenjualan($kd_penjualan)
    {
        $qry = $this->db->query(
            "SELECT 
                a.kd_penjualan
                , a.tgl_penjualan
                , a.nama_pelanggan
                , a.alamat_tujuan
                , a.total_penjualan
                , a.bayar
            FROM
                master_penjualan a
            WHERE
                kd_penjualan = '$kd_penjualan'"
        )->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getDetailPenjualan($kd_penjualan)
    {
        $qry = $this->db->query(
            "SELECT 
                b.nama_barang
                , a.satuan
                , a.harga
                , a.qty
                , a.total
            FROM
                detail_penjualan a
            LEFT JOIN kode_barang b ON a.kd_barang = CONCAT(b.kode,b.sub_kode) 
            WHERE
                a.kd_penjualan = '$kd_penjualan'"
        )->result_array();
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
                id_tem_penjualan
            FROM tem_penjualan
            WHERE 
                SUBSTR(kd_penjualan, 4, 2) != if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_penjualan, 6, 2) != if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))"
        )->result_array();

        if ($qry) {
            for ($i = 0; $i < count($qry); $i++) {
                $this->db->delete("tem_penjualan", array("id_tem" => $qry[$i]['id_tem']));
            }
        }

        // Ambil kode penjualan terbaru
        $qry2 = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_penjualan, 10, 5)) AS kode,
                SUBSTR(kd_penjualan, 4, 2) AS day,
                SUBSTR(kd_penjualan, 6, 2) AS month,
                SUBSTR(kd_penjualan, 8, 2) as year
            FROM master_penjualan
            WHERE 
                SUBSTR(kd_penjualan, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_penjualan, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_penjualan, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry2[0]['kode'];
        $urutan++;

        $kodeBeli = "PNJL";
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
        $qry = $this->db->query("SELECT
                                    a.kd_gudang,
                                    a.kd_barang,
                                    a.harga_jual_now,
                                    a.qty,
                                    b.nama_barang,
                                    c.satuan 
                                FROM
                                    master_barang a
                                    LEFT JOIN kode_barang b ON CONCAT( b.kode, b.sub_kode ) = a.kd_barang
                                    LEFT JOIN detail_pembelian c ON c.kd_pembelian = a.kd_pembelian AND c.kd_barang = a.kd_barang
                                WHERE
                                    a.`status` != '1' AND a.qty > 0")->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getStockGudang($where)
    {
        $qry = $this->db->get_where("master_barang", $where)->row_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function insertDataDetail($tabel, $data, $qtyBeli, $kodeGudang, $kdBarang)
    {
        $insert = $this->db->insert($tabel, $data);   
        if($insert){

            $updateStock = $this->db->query("UPDATE master_barang SET qty=qty-'$qtyBeli' WHERE kd_gudang = '$kodeGudang' AND kd_barang = '$kdBarang'");
            
            if ($updateStock) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    public function GetJualBarang($kodeJual)
    {
        $qry = $this->db->query("SELECT 
                                    a.*, b.nama_barang 
                                FROM `tem_penjualan` a 
                                LEFT JOIN kode_barang b ON a.kd_barang = CONCAT(b.kode,b.sub_kode)
                                WHERE a.kd_penjualan='$kodeJual'")->result_array();

        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function delDetailPenjualan($tabel, $idTem, $kodeGudang, $kodeBarang, $qtyTemp)
    {
        $data = $this->db->get_where($tabel, array('id_tem_penjualan' => $idTem))->result_array();
        if ($this->db->affected_rows() > 0) {
            activity_log("Tambah Penjualan", "Delete", $data[0]["kd_penjualan"]);
            $action = $this->db->delete($tabel, array('id_tem_penjualan' => $idTem));
            if ($action) {
                $updateStock = $this->db->query("UPDATE master_barang SET qty=qty+'$qtyTemp' WHERE kd_gudang = '$kodeGudang' AND kd_barang = '$kodeBarang'");
                
                if ($updateStock) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
            ;
        } else {
            return false;
        }
    }

    public function insertDataPenjualan($nik_admin, $tglBeli, $namaPelanggan, $kodeJual, $alamatPelanggan, $subTotal, $bayar)
    {
        $getTem = $this->db->query(
            "SELECT 
                kd_penjualan
                , kd_gudang
                , kd_barang
                , satuan
                , harga
                , qty
                , total
            FROM 
                tem_penjualan 
            WHERE kd_penjualan = '$kodeJual'"
        )->result_array();

        $dateNow = date("Y-m-d H:i:s");

        $dataMaster = array(
            'kd_penjualan'    => $kodeJual,
            'tgl_penjualan'   => $tglBeli . " " . date("H:i:s"),
            'nik_admin'       => $nik_admin,
            'nama_pelanggan'  => $namaPelanggan,
            'alamat_tujuan'   => $alamatPelanggan,
            'total_penjualan' => $subTotal,
            'bayar'           => $bayar,
            'created_at'      => $dateNow
        );

        $datadetail = array();
        for ($i = 0; $i < count($getTem); $i++) {
            $detail = array(
                'kd_penjualan' => $getTem[$i]['kd_penjualan'],
                'kd_gudang'    => $getTem[$i]['kd_gudang'],
                'kd_barang'    => $getTem[$i]['kd_barang'],
                'satuan'       => $getTem[$i]['satuan'],
                'harga'        => $getTem[$i]['harga'],
                'qty'          => $getTem[$i]['qty'],
                'total'        => $getTem[$i]['total']
            );
            array_push($datadetail, $detail);
        }

        $insMater  = $this->db->insert("master_penjualan", $dataMaster); // insert ke tabel master
        $insdetail = $this->db->insert_batch("detail_penjualan", $datadetail); // insert ke tabel detail

        if ($insMater && $insdetail) {
            if ($this->db->affected_rows() > 0) {
                for ($i = 0; $i < count($getTem); $i++) {
                    activity_log_barang($kodeJual, $namaPelanggan, $getTem[$i]['kd_barang'], $getTem[$i]['qty'], '0', '0', '');
                }
            }

            $this->db->delete("tem_penjualan", array('kd_penjualan' => $kodeJual)); // hapus data di tabel sementara
            return true;
        } else {
            return false;
        }
    }

    public function getDataNotaPenjualan($kdJual)
    {
        $qryHead = $this->db->query("SELECT a.*, b.nama 
                                    FROM master_penjualan a  
                                    LEFT JOIN master_login b ON a.nik_admin = b.nik
                                    WHERE kd_penjualan = '$kdJual'")->row_array();
        if ($qryHead) {
            $qryDetail = $this->db->query("SELECT a.*, b.nama_barang 
                                        FROM detail_penjualan a
                                        LEFT JOIN kode_barang b ON a.kd_barang = CONCAT(b.kode,b.sub_kode)
                                        WHERE a.kd_penjualan = '$kdJual'")->result_array();

            if ($qryDetail) {
                $data = [
                    "headPenjualan"     => $qryHead,
                    "detailPenjualan"   => $qryDetail
                ];
                return $data;
            } else {
                return false;
            }
            
        } else {
            return false;
        }        
    }
}
