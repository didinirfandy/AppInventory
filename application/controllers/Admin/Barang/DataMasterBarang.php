<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMasterBarang extends CI_Controller
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
        $data['title'] = "Data Master Barang";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Barang/DataMasterBarang', $data);
    }

    public function getDataBarang()
    {
        $data = $this->Barang->getDataBarang();
        echo json_encode($data);
    }

    public function deleteMasterBarang()
    {
        $id = $this->input->post('id');

        $data = $this->Barang->deleteDataMasterBarang($id);
        echo json_encode($data);
    }

    public function getDataHeaderBarang()
    {
        $data = $this->Barang->getKodeHeader();
        echo json_encode($data);
    }

    public function getNewKodeBrg()
    {
        $kode = $this->input->post('kode');

        $data = $this->Barang->getNewKodeBrg($kode);
        echo json_encode($data);
    }

    public function insertMasterBarang()
    {
        // print_r($_POST['data']);
        $opt        = isset($_POST['optTambah']) ? $_POST['optTambah'] : '';
        $kodeHead   = $_POST['kodeHeader'];
        $namaHead   = $_POST['namaHeader'];
        $kodeDetail = $_POST['kodeDetail'];
        $namaDetail = $_POST['namaDetail'];

        $insert = $this->Barang->insertMasterBarang($opt, $kodeHead, $namaHead, $kodeDetail, $namaDetail);
        echo json_encode($insert);
    }

    public function editMasterBarang()
    {
        $idBrg      = $_POST['idBrgEdit'];
        $namaBrg    = $_POST['namaBrgEdit'];
        $statusBrg  = isset($_POST['statusBrgEdit']) && $_POST['statusBrgEdit'] == 'on' ? '1' : '0';

        $editBrg = $this->Barang->editMasterBrg($idBrg, $namaBrg, $statusBrg);
        echo json_encode($editBrg);
    }
}
