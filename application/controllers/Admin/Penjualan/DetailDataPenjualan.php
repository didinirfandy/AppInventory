<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailDataPenjualan extends CI_Controller
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
        $data['title'] = "Detail Data Penjualan";

        $kd_penjualan = $this->uri->segment(5);

        $data['master'] = $this->Penjualan->getMasterPenjualan($kd_penjualan);

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Penjualan/DetailDataPenjualan');
    }

    public function getMaster()
    {
        $kd_penjualan = $this->input->post("kd_penjualan");
        $data = $this->Penjualan->getMasterPenjualan($kd_penjualan);
        echo json_encode($data);
    }

    public function getDetailPenjualan()
    {
        $kd_penjualan = $this->input->post("kd_penjualan");
        $data = $this->Penjualan->getDetailPenjualan($kd_penjualan);
        echo json_encode($data);
    }
}
