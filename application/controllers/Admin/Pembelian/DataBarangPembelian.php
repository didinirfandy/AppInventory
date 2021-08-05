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
        $this->load->model('Barang');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Data Barang Pembelian";
        $kd_pembelian = $this->uri->segment(5);

        $data['master'] = $this->Pembelian->getMasterpembelian($kd_pembelian);

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Pembelian/DataBarangPembelian', $data);
    }

    public function getMaster()
    {
        $kd_pembelian = $this->input->post("kd_pembelian");
        $data = $this->Pembelian->getMasterpembelian($kd_pembelian);
        echo json_encode($data);
    }

    public function GetData()
    {
        $kd_pembelian = $this->input->post("kd_pembelian");
        $data = $this->Pembelian->GetDetailPembelian($kd_pembelian);
        echo json_encode($data);
    }

    public function GetQtyBli()
    {
        $id_detail = $this->input->post('id_detail');
        $data = $this->Pembelian->GetQtyBli($id_detail);
        echo json_encode($data);
    }

    public function insertGudang()
    {
        $id_detail   = $this->input->post('id_detail_br');
        $qty         = $this->input->post('qtyBeli_to_gd');
        $tgl_gudang  = date("Y-m-d", strtotime($this->input->post('tglGudangTerima')));
        $remark      = $this->input->post('remarkGudangTerima');

        $data = $this->Barang->insertGudang($id_detail, $qty, $tgl_gudang, $remark);
        echo json_encode($data);
    }

    public function batalGudang()
    {
        $id_detail  = $this->input->post('id_detail_btl');
        $qty        = $this->input->post('qtyBatal');
        $tgl        = date("Y-m-d", strtotime($this->input->post('tglGudangBatal')));
        $remark     = $this->input->post('remarkBatal');

        $data = $this->Barang->batalGudang($id_detail, $qty, $tgl, $remark);
        echo json_encode($data);
    }
}
