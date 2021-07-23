<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index()
    {
        $this->load->view('Login');
    }

    public function actionLogin()
    {
        if (isset($_POST['submit'])) {
            $username   =   $this->input->post('username', true);
            $password   =   md5($this->input->post('password', true));
            $hasil      =   $this->LoginModel->actionLogin($username, $password);

            if ($hasil == 1) {
                $this->session->set_flashdata('notif', 'Login Berhasil');
                redirect(base_url() . "Admin/IndexAdmin");
            } elseif ($hasil == 2) {
                $this->session->set_flashdata('notif', 'Login Berhasil');
                redirect(base_url() . "User/IndexUser");
            } else {
                $this->session->set_flashdata('notif', 'Username atau Password Salah');
                redirect(base_url() . "Login/index");
            }
        } else {
            $this->session->set_flashdata('notif', 'Gagal Login');
            redirect(base_url() . "Login/index");
        }
    }

    public function actionLogout()
    {
        $username   =   $this->session->userdata('username');
        $this->LoginModel->actionLogout($username);
        $this->session->set_flashdata('notif', 'Loguot Berhasil, Terima Kasih');
        redirect(base_url() . "Login/index");
    }
}
