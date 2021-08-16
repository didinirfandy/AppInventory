<?php
date_default_timezone_set('Asia/Jakarta');

class JobsHarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jobs');
    }

    public function HargaJual()
    {
        $qry = $this->db->query(
            "SELECT
                a.kd_pembelian
                , a.kd_gudang
                , a.kd_barang
                , c.kd_supplier
                , a.tgl_masuk_gudang
                , a.harga_beli
                , a.harga_jual_start
                , a.harga_jual_now
                , b.persen_naik
                , b.persen_turun
            FROM 
                master_barang a
                LEFT JOIN kode_barang b ON b.kode = SUBSTR(a.kd_barang, 1, 3)
                LEFT JOIN master_pembelian c ON c.kd_pembelian = a.kd_pembelian
            WHERE
                DATE(a.tgl_masuk_gudang) < DATE(CURDATE())
                AND DATE(a.tgl_masuk_gudang) > DATE(CONCAT(YEAR(CURDATE())-1,'-',IF(MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())), MONTH(CURDATE())),'-01'))
                AND a.`status` = '0'
            GROUP BY a.kd_gudang
            ORDER BY a.created_at ASC"
        )->result_array();

        $res = array();

        for ($i = 0; $i < count($qry); $i++) {
            $kd_pembelian   = $qry[$i]['kd_pembelian'];
            $kd_barang      = $qry[$i]['kd_barang'];
            $kd_gudang      = $qry[$i]['kd_gudang'];
            $kd_supplier    = $qry[$i]['kd_supplier'];
            $hrgbeli        = $qry[$i]['harga_beli'];
            $hrgJualStart   = $qry[$i]['harga_jual_start'];
            $persenNaik     = $qry[$i]['persen_naik'];
            $persenTurun    = $qry[$i]['persen_turun'];
            $tgl            = $qry[$i]['tgl_masuk_gudang'];
            $tglMasukGudang = new DateTime($qry[$i]['tgl_masuk_gudang']);
            $nowDate        = new DateTime();
            $diff           = $nowDate->diff($tglMasukGudang);

            $valdata = array();
            $a = 0;
            $hrg = $status_no = $bln = 0;
            $status_txt = "";
            while ($a <= $diff->m) {
                if ($a >= 1 && $a <= 7) {
                    $status_txt = "Harga Naik";
                    $status_no = 1;
                    $bln = $a;
                    $hrgbeli = $a > 1 ? $hrg : $hrgbeli;
                    $hrg = $hrgbeli + ($persenNaik / 100 * $hrgbeli); // Rumus Harga Naik
                } else if ($a >= 8 && $a <= 10) {
                    $status_txt = "Harga Turun / diskon";
                    $status_no = 2;
                    $bln = $a;
                    $hrgbeli = $a > 1 ? $hrg : $hrgbeli;
                    $hrg = $hrgbeli - ($persenTurun / 100 * $hrgbeli); //  Rumus Harga Turun
                } else if ($a >= 11 || $a == 0) {
                    $status_txt = "Harga Flash Sale";
                    $status_no = 3;
                    $bln = $a;
                    $hrg = $hrgJualStart; // Krmbalikan harga ke 1 bulan awal
                }

                $datalist = array(
                    "hrgAwal"    => floor($hrgbeli),
                    "hsl"        => floor($hrg),
                    "status_txt" => $status_txt,
                    "status_no"  => $status_no,
                    "bulan"      => $bln
                );
                array_push($valdata, $datalist);
                $a++;
            }

            $header = array(
                "kd_pembelian"     => $kd_pembelian,
                "kd_barang"        => $kd_barang,
                "kd_gudang"        => $kd_gudang,
                "kd_supplier"      => $kd_supplier,
                "hrgJualStart"     => $hrgJualStart,
                "tgl_masuk_gudang" => $tgl
            );

            $data = array("header" => $header, "data" => $valdata);
            array_push($res, $data);
        }

        // print_r($res);
        // die();

        for ($d = 0; $d < count($res); $d++) {
            $data       = $res[$d]['data'][count($res[$d]['data']) - 1];
            $hsl        = (int) $data['hsl'];
            $hargaUP    = array('harga_jual_now' => $hsl);
            $kd_gudang  = array($res[$d]['header']['kd_gudang']);

            $data = $this->Jobs->UpdateData($kd_gudang, $hargaUP, $res);
            echo $data . "<br>";
            // print_r($data);
        }
    }
}
