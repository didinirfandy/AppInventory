<?php
date_default_timezone_set('Asia/Jakarta');

class Supplier extends CI_Model
{
    public function getListSupplier()
    {
        $qry = $this->db->query("SELECT COUNT(*) totSupp FROM supplier WHERE `status` = '0'")->row();
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

    public function getSupplierKode($kodeSupp)
    {
        $qry = $this->db->query("SELECT * FROM supplier WHERE kd_supplier = '$kodeSupp'")->row_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function deleteSupplier($kode)
    {
        $qry = $this->db->query("DELETE FROM supplier WHERE kd_supplier = '$kode'");
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }

    public function getKodeSupp()
    {
        $qry = $this->db->query("SELECT kd_supplier FROM supplier ORDER BY kd_supplier DESC LIMIT 1");
        $data = $qry->row_array();

        if (count($data) > 0) {
            $subKode = substr($data['kd_supplier'], 3);

            $subKode += 1;

            $kodeSuppFix = sprintf('%06d', $subKode);
            $kodeSuppFix = "SUP" . $kodeSuppFix;
            return $kodeSuppFix;
        } else {
            return false;
        }
    }

    public function insertSupplier($kodeSupp, $namaSupp, $alamatSupp, $deskSupp)
    {
        $qry = $this->db->query("INSERT INTO supplier (kd_supplier, nama_supplier, alamat, deskripsi) VALUES ('$kodeSupp', '$namaSupp', '$alamatSupp', '$deskSupp')");

        if ($qry) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSupplier($kodeSupp, $namaSupp, $alamatSupp, $deskSupp)
    {
        $qry = $this->db->query("UPDATE supplier SET nama_supplier='$namaSupp', alamat='$alamatSupp', deskripsi='$deskSupp' WHERE kd_supplier = '$kodeSupp'");

        if ($qry) {
            return true;
        } else {
            return false;
        }
    }
}
