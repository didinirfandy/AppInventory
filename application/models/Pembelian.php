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
}
