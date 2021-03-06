<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBarang extends CI_Controller
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
        $this->load->model('Barang');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Data Stok Barang";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Barang/DataBarang', $data);
    }

    public function getDataStokBarang()
    {
        $getData = $this->Barang->getDataStokBarang();
        echo json_encode($getData);
    }

    public function getDataTimeline()
    {
        $kd_pembelian   = $this->input->post('kd_pembelian');
        $kd_barang   = $this->input->post('kd_barang');

        $getData = $this->Barang->getDataTimeline($kd_pembelian, $kd_barang);
        echo json_encode($getData);
    }

    public function getDataTimelineHarga()
    {
        $kd_gudang   = $this->input->post('kd_gudang');

        $getData = $this->Barang->getDataTimelineHarga($kd_gudang);
        echo json_encode($getData);
    }
}
