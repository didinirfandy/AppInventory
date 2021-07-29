<?php
date_default_timezone_set('Asia/Jakarta');

class Pembelian extends CI_Model
{
    public function tampil_barang_pembelian()
    {
        $qry = $this->db->query("SELECT * FROM detail_pembelian WHERE status = '0'")->result_array();
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
        $qry    = $this->db->query("SELECT MAX(kd_pembelian) AS kd_pembelian FROM master_pembelian")->num_rows();
        $urutan = (int) substr($qry['kd_pembelian'], 9, 5);
        // $hari   = (int) substr($qry['kd_pembelian'], 3, 2);
        // $bulan  = (int) substr($qry['kd_pembelian'], 5, 2);
        // $tahun  = (int) substr($qry['kd_pembelian'], 7, 4);

        $urutan++;

        // $dateNow  = date("Y-m-d");
        // $tgl_kode = $tahun . "-" . $bulan . "-" . $hari;

        // if ($tgl_kode != $dateNow) {
        //     $urutan = "";
        // }

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

    public function insertDataPembelian($nik_admin, $tgl_pembelian, $kd_supplier, $kd_pembelian, $remark)
    {
        $getTem = $this->db->query("SELECT 
                                        kd_pembelian
                                        , kd_barang
                                        , nama
                                        , satuan
                                        , harga
                                        , item
                                        , total
                                        , sum(total) AS total_beli 
                                    FROM 
                                        tem_pembelian 
                                    WHERE kd_pemebelian = $kd_pembelian")->result_array();

        $dataMaster = array();
        $datadetail = array();

        for ($i = 0; $i < count($getTem); $i++) {
            $master = array(
                'kd_pembelian'    => $getTem[$i]['kd_pembelian'],
                'tgl_pembelian'   => $tgl_pembelian,
                'nik_admin'       => $nik_admin,
                'kd_supplier'     => $kd_supplier,
                'total_pembelian' => $getTem[$i]['total_beli']
            );
            array_push($dataMaster, $master);

            $detail = array(
                'kd_pembelian' => $getTem[$i]['kd_pembelian'],
                'kd_barang'    => $getTem[$i]['kd_barang'],
                'nama'         => $getTem[$i]['nama'],
                'satuan'       => $getTem[$i]['satuan'],
                'harga'        => $getTem[$i]['harga'],
                'item'         => $getTem[$i]['item'],
                'total'        => $getTem[$i]['total']
            );
            array_push($datadetail, $detail);

            if ($master != "" && $detail != "") {
                activity_log_barang($kd_supplier, $getTem[$i]['satuan'], $getTem[$i]['item'], '0', '0', $remark);
            }
        }

        $insMater  = $this->db->insert("master_pemebelian", $dataMaster);
        $insdetail = $this->db->insert("detail_pembelian", $datadetail);

        if ($insMater && $insdetail) {
            return true;
        } else {
            return false;
        }
    }
}
