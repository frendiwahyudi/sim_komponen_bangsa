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
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/vDashboard', $data);
        $this->load->view('Kodim/Layout/footer');
    }
}

/* End of file cDashboard.php */
