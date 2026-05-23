<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
        if (!$this->session->userdata('id')) {
            redirect('cAuth');
        }
    }

    public function index()
    {
        $data = array(
            'jml' => $this->mDashboard->total()
        );
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/vDashboard', $data);
        $this->load->view('Kodam/Layout/footer');
    }
}

/* End of file cDashboard.php */
