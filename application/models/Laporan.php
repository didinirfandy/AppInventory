<?php
date_default_timezone_set('Asia/Jakarta');

class Laporan extends CI_Model
{
    public function getDataPembelian($tglAwal, $tglAkhir)
    {
        $qry = $this->db->query("SELECT  
                                hds.kodepem, DATE(hds.tglpem) as tglpem, hds.supp, kb.nama_barang AS namabrg, dt.satuan, dt.harga_beli AS hrgbeli, dt.qty, dt.total,
                                hds.totalqty AS totqty, hds.totalharga AS totharga, hds.totaltotal AS tottotal
                            FROM detail_pembelian dt
                            LEFT JOIN kode_barang kb ON dt.kd_barang = concat(kb.kode,kb.sub_kode)
                            LEFT JOIN (SELECT hd.kd_pembelian AS kodepem, hd.tgl_pembelian AS tglpem, su.nama_supplier AS supp, 
                                (SELECT SUM(dts.qty)
                                FROM detail_pembelian dts WHERE hd.kd_pembelian = dts.kd_pembelian) AS totalqty,
                                (SELECT SUM(dts.harga_beli)
                                FROM detail_pembelian dts WHERE hd.kd_pembelian = dts.kd_pembelian) AS totalharga,
                                (SELECT SUM(dts.total)
                                FROM detail_pembelian dts WHERE hd.kd_pembelian = dts.kd_pembelian) AS totaltotal
                            FROM master_pembelian hd 
                            LEFT JOIN supplier su ON hd.kd_supplier = su.kd_supplier) AS hds
                            ON hds.kodepem = dt.kd_pembelian
                            WHERE DATE(hds.tglpem) BETWEEN '$tglAwal' AND '$tglAkhir'
                            ORDER BY dt.kd_pembelian")->result_array();
        if ($qry > 0) {
            return $qry;
        } else {
            return false;
        }        
    }

    public function getDataPenjualan($tglAwal, $tglAkhir)
    {
        $qry = $this->db->query("SELECT  
                                    hds.kodepen, DATE(hds.tglpen) as tglpen, kb.nama_barang AS namabrg, dt.kd_gudang as kodegdg, dt.satuan, dt.qty, dt.harga AS hrgjual,  dt.total,
                                    hds.totalqty AS totqty, hds.totalharga AS totharga, hds.totaltotal AS tottotal
                                FROM detail_penjualan dt
                                LEFT JOIN kode_barang kb ON dt.kd_barang = concat(kb.kode,kb.sub_kode)
                                LEFT JOIN (SELECT hd.kd_penjualan AS kodepen, hd.tgl_penjualan AS tglpen, 
                                    (SELECT SUM(dts.qty)
                                    FROM detail_penjualan dts WHERE hd.kd_penjualan = dts.kd_penjualan) AS totalqty,
                                    (SELECT SUM(dts.harga)
                                    FROM detail_penjualan dts WHERE hd.kd_penjualan = dts.kd_penjualan) AS totalharga,
                                    (SELECT SUM(dts.total)
                                    FROM detail_penjualan dts WHERE hd.kd_penjualan = dts.kd_penjualan) AS totaltotal
                                FROM master_penjualan hd) AS hds
                                ON hds.kodepen = dt.kd_penjualan
                                WHERE DATE(hds.tglpen) BETWEEN '$tglAwal' AND '$tglAkhir'
                                ORDER BY dt.kd_penjualan")->result_array();
        if ($qry > 0) {
            return $qry;
        } else {
            return false;
        }        
    }

    public function getDataAset($tglAwal, $tglAkhir, $typeBtn)
    {
        $whereTgl = $typeBtn == '' ? " AND DATE(a.tgl_masuk_gudang) BETWEEN '$tglAwal' AND '$tglAkhir'" : "";

        $qry = $this->db->query("SELECT
                                    a.kd_gudang,
                                    a.kd_barang,
                                    b.nama_barang,
                                    c.satuan,
                                    a.qty,
                                    a.harga_beli,  
                                    a.harga_jual_now,
                                    a.harga_beli * a.qty as aset
                                FROM
                                    master_barang a
                                    LEFT JOIN kode_barang b ON CONCAT( b.kode, b.sub_kode ) = a.kd_barang
                                    LEFT JOIN detail_pembelian c ON c.kd_pembelian = a.kd_pembelian AND c.kd_barang = a.kd_barang
                                WHERE
                                    a.`status` != '1' AND a.qty > 0 $whereTgl")->result_array();
        if ($qry > 0) {
            return $qry;
        } else {
            return false;
        } 
    }
}