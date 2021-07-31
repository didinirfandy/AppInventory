<?php 
date_default_timezone_set('Asia/Jakarta');

class Barang extends CI_Model
{
    public function getDataBarang()
    {
        $qry = $this->db->query("SELECT * FROM kode_barang WHERE status = '1'")->result_array();

        if ($qry) {
            return $qry;
        }else{
            return false;
        }
    }

    public function getDataStokBarang()
    {
        $qry = $this->db->query("SELECT a.*, b.nama_barang, c.satuan 
                                FROM master_barang a
                                LEFT JOIN kode_barang b ON CONCAT(b.kode, b.sub_kode) = a.kd_barang
                                LEFT JOIN detail_pembelian c ON c.kd_pembelian = a.kd_pembelian
                                WHERE a.status = '1'")->result_array();
        if ($qry) {
            return $qry;
        }else{
            return false;
        }
    }
}
