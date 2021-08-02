<?php
date_default_timezone_set('Asia/Jakarta');

class Barang extends CI_Model
{
    public function insertGudang($id_detail, $qty, $tgl_gudang, $remark)
    {
        $qry = $this->db->query(
            "SELECT 
                MAX(SUBSTR(kd_gudang, 10, 5)) AS kode,
                SUBSTR(kd_gudang, 4, 2) AS day,
                SUBSTR(kd_gudang, 6, 2) AS month,
                SUBSTR(kd_gudang, 8, 2) as year
            FROM master_barang
            WHERE 
                SUBSTR(kd_gudang, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT('0',DAY(CURDATE())),DAY(CURDATE()))
                AND SUBSTR(kd_gudang, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT('0',MONTH(CURDATE())),MONTH(CURDATE()))
                AND SUBSTR(kd_gudang, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)"
        )->result_array();

        $urutan = (int) $qry[0]['kode'];
        $urutan++;

        $kodeBeli = "GDG";
        $day   = date("d");
        $month = date("m");
        $year  = substr(date("Y"), 2, 2);

        $getKode = $kodeBeli . $day . $month . $year . sprintf("%05s", $urutan);

        $getBeli = $this->db->get_where("master_pemeblian", array("id_detail" => $id_detail))->result();

        $data = array(
            'kd_pembelian' => $getBeli->kd_pembelian,
            'kd_gudang' => $getKode,
            'kd_barang' => $getBeli->kd_barang,
        );

        $insert = $this->db->insert("master_barang");
    }
}
