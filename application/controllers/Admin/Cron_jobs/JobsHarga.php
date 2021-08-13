<?php
date_default_timezone_set('Asia/Jakarta');

class JobsHarga extends CI_Controller
{
    public function HargaNaik()
    {
        $qry = $this->db->query(
            "SELECT
                a.kd_pembelian
                , a.kd_gudang
                , a.kd_barang
                , a.tgl_masuk_gudang
                , a.harga_beli
                , a.harga_jual_start
                , a.harga_jual_now
                , b.persen_naik
                , b.persen_turun
            FROM master_barang a
            LEFT JOIN kode_barang b ON b.kode = SUBSTR(a.kd_barang, 1, 3)
            WHERE
                MONTH(a.tgl_masuk_gudang) != MONTH(CURDATE())
                AND a.`status` = '0'
            GROUP BY a.kd_gudang
            ORDER BY a.created_at ASC"
        )->result_array();

        for ($i = 0; $i < count($qry); $i++) {
            $kd_gudang      = $qry[$i]['kd_gudang'];
            $hrgJualStart   = $qry[$i]['harga_jual_start'];
            $hrgJualNow     = $qry[$i]['harga_jual_now'];
            $persenNaik     = $qry[$i]['persen_naik'];
            $persenTurun    = $qry[$i]['persen_turun'];
            $tglMasukGudang = new DateTime($qry[$i]['tgl_masuk_gudang']);
            $nowDate        = new DateTime();
            $diff           = $nowDate->diff($tglMasukGudang);

            for ($k = 0; $k < $diff->m; $k++) {
                $l = 1;
                foreach ($qry as $hrg) {
                    $hrg;
                }
                // $hrg = $hrgJualStart + ($persenNaik * $hrgJualStart);
                print_r($hrg);
            }
            die();
        }
    }

    public function HargaDiskon()
    {
    }
}
