<?php
date_default_timezone_set('Asia/Jakarta');

function activity_log($menu, $aksi, $item)
{
    $CI = &get_instance();
    $time = date("Y/m/d H:i:s");

    $param = array(
        'log_time' => $time,
        'log_user' => $CI->session->userdata('username'),
        'log_menu' => $menu,
        'log_aksi' => $aksi,
        'log_item' => $item,
    );

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->save_log($param);
}

function activity_log_barang($date_log, $kd_pembelian, $kd_supplier, $kd_barang, $qty_sisa, $qty_gudang, $qty_batal, $remark, $status_log, $kdGudang)
{
    $CI = &get_instance();
    if ($date_log == "") {
        $date_log = date("Y-m-d H:i:s");
    }

    $param = array(
        'date_log'      => $date_log,
        'nik_admin'     => (int) $CI->session->userdata('nik'),
        'kd_pembelian'  => $kd_pembelian,
        'kd_supplier'   => $kd_supplier,
        'kd_gudang'     => $kd_kdGudang,
        'kd_barang'     => $kd_barang,
        'qty_sisa'      => $qty_sisa,
        'qty_gudang'    => $qty_gudang,
        'qty_batal'     => $qty_batal,
        'remark'        => $remark,
        'status_log'    => $status_log
    );

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->insertDataLog($param);
}

function activity_log_harga($kd_pembelian, $kd_supplier, $kd_gudang, $kd_barang, $harga_start, $harga_now, $tgl_masuk_gudang, $tgl_harga_naik, $tgl_harga_turun, $tgl_harga_flashSale)
{
    $CI = &get_instance();

    date_default_timezone_set('Asia/Jakarta');
    $time   = date("Y-m-d H:i:s");

    $param = array(
        'date_log'              => $time,
        'nik_admin'             => (int) $CI->session->userdata('nik'),
        'kd_pembelian'          => $kd_pembelian,
        'kd_gudang'             => $kd_gudang,
        'kd_barang'             => $kd_barang,
        'kd_supplier'           => $kd_supplier,
        'harga_start'           => $harga_start,
        'harga_now'             => $harga_now,
        'tgl_masuk_gudang'      => $tgl_masuk_gudang,
        'tgl_harga_naik'        => $tgl_harga_naik,
        'tgl_harga_turun'       => $tgl_harga_turun,
        'tgl_harga_flashSale'   => $tgl_harga_flashSale,
    );

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->saveLogHarga($param);
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    $setdata = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    return $setdata;
}

function tgl_indo_bsr($tanggal)
{
    $bulan = array(
        1 => 'JANUARI',
        'FEBRUARI',
        'MARET',
        'APRIL',
        'MEI',
        'JUNI',
        'JULI',
        'AGUSTUS',
        'SEPTEMBER',
        'OKTOBER',
        'NOVEMBER',
        'DESEMBER'
    );

    $pecahkan = explode('-', $tanggal);
    $setData = $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];

    return $setData;
}
