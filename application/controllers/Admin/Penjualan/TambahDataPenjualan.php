<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahDataPenjualan extends CI_Controller
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
        $data['title'] = "Tambah Data Penjualan";
        $data['getKdJual'] = $this->Penjualan->kodeOtomatis();

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Penjualan/TambahDataPenjualan', $data);
    }

    public function GetKodeBarang()
    {
        $data = $this->Penjualan->GetKodeBarang();
        echo json_encode($data);
    }

    public function getStockGudang()
    {
        $kodeGudang     = $this->input->post('kodeGudang');
        $kdBarang       = $this->input->post('kdBarang');
        $qtyBeli        = $this->input->post('qtyBeli');

        $where = [
            "kd_gudang" => $kodeGudang,
            "kd_barang" => $kdBarang
        ];

        $getStock = $this->Penjualan->getStockGudang($where);

        $qtyGudang = $getStock['qty'];

        $hasil = $qtyGudang - $qtyBeli;

        echo json_encode($hasil);
    }

    public function insertDataDetail()
    {
        $kodeGudang     = $this->input->post('kodeGudang');
        $kodePembelian  = $this->input->post('kodePembelian');
        $kdBarang       = $this->input->post('kdBarang');
        $nmBarang       = $this->input->post('nmBarang');
        $satuan         = $this->input->post('satuan');
        $hrgBeli        = $this->input->post('hrgBeli');
        $qtyBeli        = $this->input->post('qtyBeli');

        $pecah      = explode(".", $hrgBeli);
        $pch1       = (array_key_exists('1', $pecah) ? $pecah[1] : null);
        $pch2       = (array_key_exists('2', $pecah) ? $pecah[2] : null);
        $pch3       = (array_key_exists('3', $pecah) ? $pecah[3] : null);
        $hargaBeli  = $pecah[0] . $pch1 . $pch2 . $pch3;
        $total      = $qtyBeli * $hargaBeli;

        $data   = array(
            'kd_penjualan'  => $kodePembelian,
            'kd_gudang'     => $kodeGudang,
            'kd_barang'     => $kdBarang,
            'satuan'        => $satuan,
            'harga'         => $hargaBeli,
            'qty'           => $qtyBeli,
            'total'         => $total,
        );

        $hasil = $this->Penjualan->insertDataDetail('tem_penjualan', $data, $qtyBeli, $kodeGudang, $kdBarang);

        echo json_encode($hasil);
    }

    public function GetJualBarang()
    {
        $kodeJual = $this->input->post("kode_penjualan");
        $data = $this->Penjualan->GetJualBarang($kodeJual);
        echo json_encode($data);
    }

    public function delDetailPenjualan()
    {
        $idTem      = $this->input->post("id_tem");
        $kodeGudang = $this->input->post("kd_gudang");
        $kodeBarang = $this->input->post("kd_barang");
        $qtyTemp    = $this->input->post("qtyTemp");
        $data = $this->Penjualan->delDetailPenjualan('tem_penjualan', $idTem, $kodeGudang, $kodeBarang, $qtyTemp);
        echo json_encode($data);
    }

    public function insertDataPenjualan()
    {
        $kodeBeli         = $this->input->post('kodeBeli');
        $tglBeli          = date("Y-m-d", strtotime($this->input->post('tglBeli')));
        $namaPelanggan    = $this->input->post('namaPelanggan');
        $alamatPelanggan  = $this->input->post('alamatPelanggan');
        $subTotal         = $this->input->post('subTotal');
        $bayar            = $this->input->post('bayar');
        $nik_admin        = $this->session->userdata('nik');

        // echo $tglBeli;
        $hasil = $this->Penjualan->insertDataPenjualan($nik_admin, $tglBeli, $namaPelanggan, $kodeBeli, $alamatPelanggan, $subTotal, $bayar);

        echo json_encode($hasil);
    }
}
