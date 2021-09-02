<?php
date_default_timezone_set('Asia/Jakarta');
set_time_limit(51600);

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
        $resdtl = array();

        for ($i = 0; $i < count($qry); $i++) {
            $kd_pembelian     = $qry[$i]['kd_pembelian'];
            $kd_barang        = $qry[$i]['kd_barang'];
            $kd_gudang        = $qry[$i]['kd_gudang'];
            $kd_supplier      = $qry[$i]['kd_supplier'];
            $hrgbeli          = $qry[$i]['harga_beli'];
            $hrgJualStart     = $qry[$i]['harga_jual_start'];
            $persenNaik       = $qry[$i]['persen_naik'];
            $persenTurun      = $qry[$i]['persen_turun'];
            $tgl_masuk_gudang = $qry[$i]['tgl_masuk_gudang'];

            //data awal
            $tgl_mulai = $tgl_masuk_gudang;
            $tgl_selesai = date("Y-m-d");

            //convert
            $timeStart = strtotime($tgl_mulai);
            $timeEnd   = strtotime($tgl_selesai);
            $numBulan  = 1 + (date("Y", $timeEnd) - date("Y", $timeStart)) * 12;
            $numBulan += (date("m", $timeEnd) - date("m", $timeStart)) - 1;

            // var_dump($numBulan);
            // die();

            $valdata = array();
            $hrg = $status_no = 0;
            $status_txt = "";
            $a = 1;
            while ($a <= $numBulan) {
                $hrgbeli = $a > 1 ? $hrg : $hrgbeli;
                $persenNaik = random_int(1, 10); // random Persentase Naik 
                $persenTurun = random_int(5, 10); // random Persentase Turun
                $persenDiskonTH1 = random_int(10, 15); // diskon tahun pertama 
                $persenDiskonTH2 = random_int(15, 20); // diskon tahun kedua

                if ($a <= 9 || $a >= 13 && $a <= 21 || $a >= 25 && $a <= 33) {
                    // random harga naik turun
                    $nt = mt_rand(1, 2);
                    if ($nt == 1) {
                        $status_txt = "Harga Naik";
                        $status_no  = 1;
                        $hrg        = $hrgbeli + ($persenNaik / 100 * $hrgbeli); // Rumus Harga Naik
                    } else {
                        $status_txt = "Harga Turun / Diskon";
                        $status_no  = 2;
                        $hrg        = $hrgbeli - ($persenTurun / 100 * $hrgbeli); //  Rumus Harga Turun
                    }
                } else if ($a >= 10 && $a <= 12 || $a >= 22 && $a <= 24 || $a >= 34 && $a <= 36) {
                    if ($a <= 12) {
                        $status_txt = "Harga Flash Sale";
                        $status_no  = 3;
                        $hrg        = $hrgbeli - ($persenDiskonTH1 / 100 * $hrgbeli); //  Rumus Harga Flash Sale tahun pertama
                    }

                    if ($a >= 13) {
                        $status_txt = "Harga Flash Sale";
                        $status_no  = 3;
                        $hrg        = $hrgbeli - ($persenDiskonTH2 / 100 * $hrgbeli); //  Rumus Harga Flash Sale tahun kedua
                    }
                } else {
                    $status_txt = "Harga EXP";
                    $status_no  = 3;
                    $hrg        = 0; // lebih dari 3 tahun set jdi 0
                }

                $date    = date("Y-m-d", strtotime("+" . $a . " month", strtotime($tgl_mulai)));
                $tanggal = date("Y-m-d", strtotime("-1 month", strtotime($date)));

                $datalist = array(
                    "kd_pembelian"      => $kd_pembelian,
                    "kd_barang"         => $kd_barang,
                    "kd_gudang"         => $kd_gudang,
                    "kd_supplier"       => $kd_supplier,
                    "hrgJualStart"      => $hrgJualStart,
                    "tgl_masuk_gudang"  => $tgl_masuk_gudang,
                    "hrgAwal"           => floor($hrgbeli),
                    "hrgNow"            => floor($hrg),
                    "status_txt"        => $status_txt,
                    "status_no"         => $status_no,
                    "tanggal"           => $tanggal . " 23:59:59",
                    "persen_naik"       => $persenNaik,
                    "persen_turun"      => $persenTurun,
                    "diskon_thn1"       => $persenDiskonTH1,
                    "diskon_thn2"       => $persenDiskonTH2
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
                "tgl_masuk_gudang" => $tgl_masuk_gudang
            );

            $data = array("header" => $header, "data" => $valdata);
            array_push($res, $data);

            $dtlData = array("data" => $valdata);
            array_push($resdtl, $dtlData);
        }

        // print_r($res);
        // die();

        $emptyTabelLog = $this->Jobs->emptyTabelLog('activity_log_harga');

        if ($emptyTabelLog) {
            for ($d = 0; $d < count($res); $d++) {
                $data       = $res[$d]['data'][count($res[$d]['data']) - 1];
                $hrgNow     = (int) $data['hrgNow'];
                $hargaUP    = array('harga_jual_now' => $hrgNow);
                $kd_gudang  = array($res[$d]['header']['kd_gudang']);
                $dataDtl    = $res[$d]['data'];

                $data = $this->Jobs->UpdateData($kd_gudang, $hargaUP, $dataDtl);
                echo $data . "<br>";
                // print_r($dataDtl);
            }
        }

        // die();
    }
}
