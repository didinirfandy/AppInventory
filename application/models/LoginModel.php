<?php
date_default_timezone_set('Asia/Jakarta');

class LoginModel extends CI_Model
{
    public function actionLogin($username, $password)
    {
        $get = $this->db->get_where('master_login', array('username' => $username, 'password' => $password));

        foreach ($get->result_array() as $q) {
            $data = array(
                'user_id'       => $q['user_id'],
                'nik'           => $q['nik'],
                'username'      => $q['username'],
                'nama'          => $q['nama'],
                'user_level'    => $q['user_level'],
                'genre'         => $q['genre'],
                'date_login'    => $q['date_login'],
                'status_login'  => $q['status_login'],
                'user_valid'    => $q['user_valid'],
                'image'         => $q['image'],
            );
            $this->session->set_userdata($data);
            $valid = $data['user_valid'];
        }

        if ($valid == 1) {
            if ($get->num_rows() > 0) {
                $date = date("Y-m-d H:i:s");
                $data = array('date_login' => $date, 'status_login' => '1');

                $this->db->where('username', $username);
                $this->db->update('master_login', $data);

                if ($this->db->affected_rows() > 0) {
                    activity_log("login", "Masuk", '');
                    return $valid;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function actionLogout($username)
    {
        $this->db->set('status_login', 0);
        $this->db->where('username', $username);
        $this->db->update('master_login');

        if ($this->db->affected_rows() > 0) {
            activity_log("logout", "Keluar", '');
            return true;
        } else {
            return false;
        }
    }
}
