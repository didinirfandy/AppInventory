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

    public function deleteDataMasterBarang($id)
    {
        $qry = $this->db->query("DELETE FROM kode_barang WHERE id_kd_barang = '$id'");

        if ($qry) {
            return true;
        }else{
            return false;
        }
    }

    public function getKodeHeader()
    {
        $qry = $this->db->query("SELECT kode, nama_barang FROM kode_barang WHERE sub_kode = '*' AND `status` = '1'")->result_array();
        if ($qry) {
            return $qry;
        }else{
            return false;
        }
    }

    public function getNewKodeBrg($kode)
    {
        $where = $kode != '' ? " WHERE kode = '$kode' " : "";
        $orderBy = $kode != '' ? " ORDER BY sub_kode DESC " : " ORDER BY kode DESC ";
        $qry = $this->db->query("SELECT kode, sub_kode FROM kode_barang $where $orderBy LIMIT 1");
        $data = $qry->row_array();
        if (count($data) > 0) {
            $subKode = $data['sub_kode'] == '*' ? '00.' : $data['sub_kode'];
            if ($kode == '') {
                $lastKode = trim($data['kode'], '.');
                $newKode  = $lastKode + 1;
                $data['kodeHeader']  = sprintf('%02d', $newKode).'.';
                $data['kodeDetail']  = '01.';
            }else{
                $data['kodeHeader'] = $kode;
                $lastKode = trim($subKode, '.');
                $newKode  = $lastKode + 1;
                $data['kodeDetail']  = sprintf('%02d', $newKode).'.';
            }
            return $data;
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
