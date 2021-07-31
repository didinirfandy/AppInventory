<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataSupplier extends CI_Controller
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
        $this->load->model('Supplier');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Data Supplier";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Supplier/DataSupplier', $data);
    }

    public function getDataSupplier()
    {
        $data = $this->Supplier->getSupplier();
        echo json_encode($data);
    }

    public function getDataSupplierKode()
    {
        $kodeSupp = $_POST["kode"];

        $data = $this->Supplier->getSupplierKode($kodeSupp);
        echo json_encode($data);
    }

    public function deleteDataSupplier()
    {
        $kode = $_POST["kode"];

        $data = $this->Supplier->deleteSupplier($kode);
        echo json_encode(true);
    }

    public function tambahSupplier()
    { 
        $namaSupp   = $_POST["namaSupp"];
        $alamatSupp = $_POST["alamatSupp"];
        $deskSupp = $_POST["deskSupp"];

        $kodeSupp = $this->Supplier->getKodeSupp();
        
        $insertData = $this->Supplier->insertSupplier($kodeSupp, $namaSupp, $alamatSupp, $deskSupp);

        echo json_encode($insertData);
    }

    public function updateSupplier()
    {
        $kodeSupp   = $_POST["kodeSupp"];
        $namaSupp   = $_POST["namaSupp"];
        $alamatSupp = $_POST["alamatSupp"];
        $deskSupp   = $_POST["deskSupp"];

        $updateData = $this->Supplier->updateSupplier($kodeSupp, $namaSupp, $alamatSupp, $deskSupp);

        echo json_encode($updateData);
    }
}
