<?php
date_default_timezone_set('Asia/Jakarta');

class Jobs extends CI_Model
{
    public function UpdateData($kd_gudang, $hargaUP, $res)
    {
        $this->db->where_in('kd_gudang', $kd_gudang);
        $this->db->update('master_barang', $hargaUP);

        if ($this->db->affected_rows() > 0) {
            for ($i = 0; $i < count($res); $i++) {
                $kd_pembelian   = $res[$i]['header']['kd_pembelian'];
                $kd_barang      = $res[$i]['header']['kd_barang'];
                $kd_gudang      = $res[$i]['header']['kd_gudang'];
                $kd_supplier    = $res[$i]['header']['kd_supplier'];
                $hrgJualStart   = $res[$i]['header']['hrgJualStart'];
                $tgl            = $res[$i]['header']['tgl_masuk_gudang'];
                $data           = $res[$i]['data'][count($res[$i]['data']) - 1];
                $hrgJualNow     = (int) $data['hrgNow'];
                $status_no      = (int) $data['status_no'];
                $dateNowNaik = $dateNowTurun = $dateNowFlashSale = '';
                if ($status_no == 1) {
                    $dateNowNaik    = date("Y-m-d");
                } else if ($status_no == 2) {
                    $dateNowTurun   = date("Y-m-d");
                } else {
                    $dateNowFlashSale = date("Y-m-d");
                }

                activity_log_harga($tgl, $kd_pembelian, $kd_supplier, $kd_gudang, $kd_barang, $hrgJualStart, $hrgJualNow, $tgl, $dateNowNaik, $dateNowTurun, $dateNowFlashSale); // log harga barang
            }
            return "Berhasil";
        } else {
            return "Error log";
        }
    }
}
