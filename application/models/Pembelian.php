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
        $qry    = $this->db->query("SELECT MAX(kd_pembelian) AS kode FROM master_pembelian")->result_array();
        $urutan = (int) substr($qry[0]['kode'], 9, 5);
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
        $getTem = $this->db->query("SELECT 
                                        kd_pembelian
                                        , kd_barang
                                        , nama
                                        , satuan
                                        , harga
                                        , item
                                        , total
                                    FROM 
                                        tem_pembelian 
                                    WHERE kd_pembelian = '$kd_pembelian'")->result_array();

        $dataMaster = array(
            'kd_pembelian'    => $kd_pembelian,
            'tgl_pembelian'   => $tgl_pembelian,
            'nik_admin'       => $nik_admin,
            'kd_supplier'     => $kd_supplier,
            'total_pembelian' => $subTotal
        );

        $datadetail = array();
        for ($i = 0; $i < count($getTem); $i++) {
            $detail = array(
                'kd_pembelian' => $getTem[$i]['kd_pembelian'],
                'kd_barang'    => $getTem[$i]['kd_barang'],
                'nama'         => $getTem[$i]['nama'],
                'satuan'       => $getTem[$i]['satuan'],
                'harga_beli'   => $getTem[$i]['harga'],
                'item'         => $getTem[$i]['item'],
                'total'        => $getTem[$i]['total']
            );
            array_push($datadetail, $detail);
        }

        $insMater  = $this->db->insert("master_pembelian", $dataMaster); // insert ke tabel master
        $insdetail = $this->db->insert_batch("detail_pembelian", $datadetail); // insert ke tabel detail

        if ($insMater && $insdetail) {
            if ($this->db->affected_rows() > 0) {
                for ($i = 0; $i < count($getTem); $i++) {
                    activity_log_barang($kd_pembelian, $kd_supplier, $getTem[$i]['kd_barang'], $getTem[$i]['item'], '0', '0', $remark);
                }
            }

            $this->db->delete("tem_pembelian", array('kd_pembelian' => $kd_pembelian)); // hapus data di tabel sementara
            return true;
        } else {
            return false;
        }
    }
}
