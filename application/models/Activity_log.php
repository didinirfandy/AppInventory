<?php

class Activity_log extends CI_Model
{

    function save_log($param)
    {
        $sql    = $this->db->insert_string('activity_log_user', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function insertDataLog($param)
    {
        $sql    = $this->db->insert_string('activity_log_barang', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function saveLogHarga($param)
    {
        $sql    = $this->db->insert_string('activity_log_harga', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}
