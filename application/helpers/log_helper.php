<?php

function activity_log($menu, $aksi, $item)
{
    $CI = &get_instance();

    date_default_timezone_set('Asia/Jakarta');
    $time   = date("Y/m/d H:i:s");

    $param['log_time'] = $time;
    $param['log_user'] = $CI->session->userdata('username');
    $param['log_menu'] = $menu;
    $param['log_aksi'] = $aksi;
    $param['log_item'] = $item;

    //load model log
    $CI->load->model('Activity_log');

    //save to database
    $CI->Activity_log->save_log($param);
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
