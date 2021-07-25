<?php

class Pembelian extends CI_Model
{
    public function tampil_barang_pembelian()
    {
        $data = $this->db->query("SELECT * FROM barang_pembelian WHERE status = '0'")->result_array();
        return $data;
    }

    public function getSupplier()
    {
        $data = $this->db->query("SELECT * FROM supplier")->result_array();
        return $data;
    }

    public function kodeOtomatis()
    {
        $qry = $this->db->query("SELECT MAX(kd_penjualan) AS kode FROM penjualan")->num_rows();
        $kode = substr($qry['kode'], 3, 5);
        $jum = $kode + 1;
        if ($jum < 10) {
            $id = "PEN0000" . $jum;
        } else if ($jum >= 10 && $jum < 100) {
            $id = "PEN000" . $jum;
        } else if ($jum >= 100 && $jum < 1000) {
            $id = "PEN00" . $jum;
        } else {
            $id = "PEN0" . $jum;
        }
        return $id;
    }
}
