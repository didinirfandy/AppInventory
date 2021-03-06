<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPenjualan extends CI_Controller
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
        $this->load->model('Penjualan');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Data Penjualan";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Penjualan/DataPenjualan');
    }

    public function GetDataPenjualan()
    {
        $data = $this->Penjualan->GetDataPenjualan();
        echo json_encode($data);
    }
}
