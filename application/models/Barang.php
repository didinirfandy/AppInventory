<?php 
date_default_timezone_set('Asia/Jakarta');

class Barang extends CI_Model
{
    public function getDataBarang()
    {
        $qry = $this->db->query("SELECT * FROM kode_barang")->result_array();

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
        $qry = $this->db->query("SELECT kode, sub_kode, nama_barang FROM kode_barang $where $orderBy LIMIT 1");
        $data = $qry->row_array();
        if (count($data) > 0) {
            $subKode = $data['sub_kode'] == '*' ? '00.' : $data['sub_kode'];
            if ($kode == '') {
                $lastKode = trim($data['kode'], '.');
                $newKode  = $lastKode + 1;
                $data['kodeHeader']  = sprintf('%02d', $newKode).'.';
                $data['kodeDetail']  = '01.';
                $data['namaHead']  = '';
            }else{
                $data['kodeHeader'] = $kode;
                $lastKode = trim($subKode, '.');
                $newKode  = $lastKode + 1;
                $data['kodeDetail']  = sprintf('%02d', $newKode).'.';
                $data['namaHead']  = $data['nama_barang'];
            }
            return $data;
        }else{
            return false;
        }
    }

    public function insertMasterBarang($opt,$kodeHead,$namaHead,$kodeDetail,$namaDetail)
    {
        if ($opt == '') {
            $qry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, `status`) VALUES ('$kodeHead', '*', '$namaHead', '1')");
            if ($qry) {
                for ($i=0; $i < count($kodeDetail); $i++) { 
                    $detQry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, `status`) VALUES ('$kodeHead', '$kodeDetail[$i]', '$namaDetail[$i]', '1')");
                }
            }
        } else {
            for ($i=0; $i < count($kodeDetail); $i++) { 
                $detQry = $this->db->query("INSERT INTO kode_barang (kode, sub_kode, nama_barang, `status`) VALUES ('$kodeHead', '$kodeDetail[$i]', '$namaDetail[$i]', '1')");
            }
        }

        if($detQry){
            return true;
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

    public function editMasterBrg($idBrg,$namaBrg,$statusBrg)
    {
        $qry = $this->db->query("UPDATE kode_barang SET nama_barang='$namaBrg', `status`='$statusBrg' WHERE id_kd_barang='$idBrg'");

        if ($qry) {
            return true;
        }else{
            return false;
        }
    }
}
