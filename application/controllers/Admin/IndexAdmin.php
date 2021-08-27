<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexAdmin extends CI_Controller
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
        $this->load->model('Penjualan');
        $this->load->model('Supplier');
        $this->load->model('Barang');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notifError', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        $this->load->view('Template/Head', $data);
        $this->load->view('PageAdmin/IndexAdmin', $data);
    }

    public function getListPembelian()
    {
        $data = $this->Pembelian->getListPembelian();
        echo json_encode($data);
    }

    public function getListPenjualan()
    {
        $data = $this->Penjualan->getListPenjualan();
        echo json_encode($data);
    }

    public function getListSupplier()
    {
        $data = $this->Supplier->getListSupplier();
        echo json_encode($data);
    }

    public function getListBarang()
    {
        $data = $this->Barang->getListBarang();
        echo json_encode($data);
    }

    public function getTotBrg()
    {
        $data = $this->Barang->getTotBrg();
        echo json_encode($data);
    }

    public function getTotBrgJual()
    {
        $data = $this->Barang->getTotBrgJual();
        echo json_encode($data);
    }
}
