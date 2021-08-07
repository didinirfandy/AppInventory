<?php

class Penjualan extends CI_Model
{
    public function kodeOtomatis()
    {
        // Hapus data temporary hari sebelumnya
        $qry = $this->db->query(
            "SELECT 
                id_tem_penjualan
            FROM tem_penjualan
            WHERE 
                SUBSTR(kd_penjualan, 4, 2) != if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_penjualan, 6, 2) != if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))"
        )->result_array();

        if ($qry) {
            for ($i = 0; $i < count($qry); $i++) {
                $this->db->delete("tem_penjualan", array("id_tem" => $qry[$i]['id_tem']));
            }
        }

        // Ambil kode penjualan terbaru
        $qry2 = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_penjualan, 10, 5)) AS kode,
                SUBSTR(kd_penjualan, 4, 2) AS day,
                SUBSTR(kd_penjualan, 6, 2) AS month,
                SUBSTR(kd_penjualan, 8, 2) as year
            FROM master_penjualan
            WHERE 
                SUBSTR(kd_penjualan, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_penjualan, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_penjualan, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry2[0]['kode'];
        $urutan++;

        $kodeBeli = "BLI";
        $day   = date("d");
        $month = date("m");
        $year  = substr(date("Y"), 2, 2);

        $getKode = $kodeBeli . $day . $month . $year . sprintf("%05s", $urutan);

        if ($getKode) {
            return $getKode;
        } else {
            return false;
        }
    }

    public function GetKodeBarang()
    {
        $qry = $this->db->query("SELECT b.kd_barang, c.nama_barang, b.qty, b.harga_jual_now FROM `master_barang` b
                                LEFT JOIN kode_barang c ON CONCAT(c.kode,c.sub_kode) = b.kd_barang
                                WHERE b.`status` = '0' AND b.qty > 0")->result_array();
        if ($qry) {
            return $qry;
        } else {
            return false;
        }
    }
}
