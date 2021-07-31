<?php 
date_default_timezone_set('Asia/Jakarta');

class Barang extends CI_Model
{
    public function getDataStokBarang()
    {
        $qry = $this->db->query("SELECT a.*, b.nama_barang 
                                FROM master_barang a
                                LEFT JOIN kode_barang b ON CONCAT(b.kode, b.sub_kode) = a.kd_barang
                                WHERE a.status = '1'")->result_array();
        if ($qry) {
            return $qry;
        }else{
            return false;
        }
    }
}
