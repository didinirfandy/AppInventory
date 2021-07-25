<?php

class Activity_log extends CI_Model
{

    function save_log($param)
    {
        $sql    = $this->db->insert_string('activity_log_user', $param);
        $ex     = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}
