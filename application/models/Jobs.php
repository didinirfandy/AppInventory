<?php
date_default_timezone_set('Asia/Jakarta');

class Jobs extends CI_Model
{
    public function UpdateData($kd_gudang, $hargaUP, $res)
    {
        $this->db->where_in('kd_gudang', $kd_gudang);
        $run = $this->db->update('master_barang', $hargaUP);

        if ($run) {
            if ($this->db->affected_rows() > 0) {
                $dateNow    = date("Y-m-d H:i:s");
                for ($i = 0; $i < count($res); $i++) {
                    $kd_pembelian   = $res[$i]['header']['kd_pembelian'];
                    $kd_barang      = $res[$i]['header']['kd_barang'];
                    $kd_gudang      = $res[$i]['header']['kd_gudang'];
                    $kd_supplier    = $res[$i]['header']['kd_supplier'];
                    $hrgJualStart   = $res[$i]['header']['hrgJualStart'];
                    $tgl            = $res[$i]['header']['tgl_masuk_gudang'];
                    $data           = $res[$i]['data'][count($res[$i]['data']) - 1];
                    $hrgJualNow     = (int) $data['hsl'];

                    activity_log_harga($kd_pembelian, $kd_supplier, $kd_barang, $kd_gudang, $hrgJualStart, $hrgJualNow, $tgl, $dateNow, ''); // log harga barang
                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
