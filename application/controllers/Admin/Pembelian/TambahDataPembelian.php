<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahDataPembelian extends CI_Controller
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

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Tambah Pembelian";
        $data['getKdBeli'] = $this->Pembelian->kodeOtomatis();

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Pembelian/TambahDataPembelian', $data);
    }

    public function GetDataSupplier()
    {
        $data = $this->Pembelian->getSupplier();
        echo json_encode($data);
    }

    public function GetKodeBarang()
    {
        $data = $this->Pembelian->GetKodeBarang();
        echo json_encode($data);
    }

    public function GetBeliBarang()
    {
        $kodeBeli = $this->input->post("kode_pembelian");
        $data = $this->Pembelian->GetBeliBarang($kodeBeli);
        echo json_encode($data);
    }

    public function insertDataDetail()
    {
        $kodePembelian  = $this->input->post('kodePembelian');
        $kdBarang       = $this->input->post('kdBarang');
        $nmBarang       = $this->input->post('nmBarang');
        $satuan         = strtoupper($this->input->post('satuan'));
        $hrgBeli        = $this->input->post('hrgBeli');
        $qtyBeli        = $this->input->post('qtyBeli');

        $pecah      = explode(".", $hrgBeli);
        $pch1       = (array_key_exists('1', $pecah) ? $pecah[1] : null);
        $pch2       = (array_key_exists('2', $pecah) ? $pecah[2] : null);
        $pch3       = (array_key_exists('3', $pecah) ? $pecah[3] : null);
        $hargaBeli  = $pecah[0] . $pch1 . $pch2 . $pch3;
        $total      = $qtyBeli * $hargaBeli;

        $data   = array(
            'kd_pembelian'  => $kodePembelian,
            'kd_barang'     => $kdBarang,
            'nama'          => $nmBarang,
            'satuan'        => $satuan,
            'harga'         => $hargaBeli,
            'item'          => $qtyBeli,
            'total'         => $total,
        );

        $hasil = $this->Pembelian->insertDataDetail('tem_pembelian', $data);

        echo json_encode($hasil);
    }

    public function insertDataPembelian()
    {
        $tgl_pembelian = $this->input->post('tglbeli');
        $kd_supplier   = $this->input->post('supplierBarang');
        $kd_pembelian  = $this->input->post('kdPembelian');
        $remark        = $this->input->post('remark');
        $nik_admin     = $this->session->userdata('nik');

        $hasil = $this->Pembelian->insertDataPembelian($nik_admin, $tgl_pembelian, $kd_supplier, $kd_pembelian, $remark);

        echo json_encode($hasil);
    }
}
