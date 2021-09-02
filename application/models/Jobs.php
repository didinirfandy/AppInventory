<?php
date_default_timezone_set('Asia/Jakarta');
set_time_limit(51600);

class Jobs extends CI_Model
{
    public function UpdateData($kode_gudang, $hargaUP, $dt)
    {
        $this->db->where_in('kd_gudang', $kode_gudang);
        $this->db->update('master_barang', $hargaUP);

        if ($this->db->affected_rows() > 0) {
            $dateDefault = "0000-00-00 00:00:00";
            $dateNowNaik = $dateNowTurun = $dateNowFlashSale = "0000-00-00 00:00:00";

            for ($i = 0; $i < count($dt); $i++) {
                $kd_pembelian   = $dt[$i]['kd_pembelian'];
                $kd_barang      = $dt[$i]['kd_barang'];
                $kd_gudang      = $dt[$i]['kd_gudang'];
                $kd_supplier    = $dt[$i]['kd_supplier'];
                $hrgJualStart   = $dt[$i]['hrgJualStart'];
                $tgl            = $dt[$i]['tgl_masuk_gudang'];
                $hrgJualNow     = $dt[$i]['hrgNow'];
                $status_no      = $dt[$i]['status_no'];
                $tanggal        = $dt[$i]['tanggal'];

                if ($status_no == 1) {
                    $dateNowNaik        = $tanggal;
                    $dateNowTurun       = $dateDefault;
                    $dateNowFlashSale   = $dateDefault;
                } else if ($status_no == 2) {
                    $dateNowNaik        = $dateDefault;
                    $dateNowTurun       = $tanggal;
                    $dateNowFlashSale   = $dateDefault;
                } else if ($status_no == 3) {
                    $dateNowNaik        = $dateDefault;
                    $dateNowTurun       = $dateDefault;
                    $dateNowFlashSale   = $tanggal;
                } else {
                    $dateNowNaik        = $dateDefault;
                    $dateNowTurun       = $dateDefault;
                    $dateNowFlashSale   = $dateDefault;
                }

                activity_log_harga($tanggal, $kd_pembelian, $kd_supplier, $kd_gudang, $kd_barang, $hrgJualStart, $hrgJualNow, $tgl, $dateNowNaik, $dateNowTurun, $dateNowFlashSale, $status_no); // log harga barang
                // $array = array(
                //     'hrgJualNow' => $hrgJualNow,
                //     'tgl' => $tanggal,
                //     'status_no' => $status_no,
                //     'kd_gudangDtl' => $kd_gudang,
                //     'dateNowNaik' => $dateNowNaik,
                //     'dateNowTurun' => $dateNowTurun,
                //     'dateNowFlashSale' => $dateNowFlashSale
                // );
                // print_r($array);
            }
            return "Berhasil mengubah harga";
        } else {
            return "Tidak ada perubahan harga";
        }
    }

    public function emptyTabelLog($tabel)
    {
        $this->db->from($tabel);
        $this->db->truncate();

        $this->db->query("UPDATE master_barang SET harga_jual_now = 0");

        return true;
    }
}
