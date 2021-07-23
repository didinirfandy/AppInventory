<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBarangPembelian extends CI_Controller
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
        $this->load->model('Pembelian');

        // if (empty($_SESSION['username'])) {
        //     redirect('Welcome/index');
        // }
    }

    public function index()
    {
        $data['title'] = "Data Barang Pembelian";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Pembelian/DataBarangPembelian', $data);
    }

    public function GetData()
    {
        $data = $this->Pembelian->tampil_barang_pembelian();
        echo json_encode($data);
    }
}
