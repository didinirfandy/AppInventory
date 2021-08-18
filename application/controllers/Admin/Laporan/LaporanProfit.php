<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanProfit extends CI_Controller
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
        $this->load->model('Laporan');

        if (empty($_SESSION['username'])) {
            $this->session->set_flashdata('notif', 'Anda Harus Login Terlebih Dahulu');
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = "Laporan Profit";

        $this->load->view('Template/HeadDataTablesJS', $data);
        $this->load->view('PageAdmin/Laporan/LaporanProfit', $data);
    }

    public function GetDataProfit()
    {
        $tglAwal = $this->input->post('awal');
        $tglAkhir = $this->input->post('akhir');

        $tglAwal = DateTime::createFromFormat("d/m/Y", $tglAwal)->format('Y-m-d');
        $tglAkhir = DateTime::createFromFormat("d/m/Y", $tglAkhir)->format('Y-m-d');

        $data = $this->Laporan->GetDataProfit($tglAwal, $tglAkhir);
        echo json_encode($data);
    }
}
