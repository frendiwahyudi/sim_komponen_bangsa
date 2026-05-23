<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaData');
        if (!$this->session->userdata('id')) {
            redirect('cAuth');
        }
    }

    // ===================== KOREM (CRUD) =====================
    public function korem()
    {
        $data = array(
            'korem' => $this->mKelolaData->select_korem(),
            'kodam' => $this->mKelolaData->select_kodam(),
        );
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/Korem/vKorem', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function createkorem()
    {
        $data = array(
            'id_kodam'   => $this->input->post('id_kodam'),
            'kode_korem' => $this->input->post('kode'),
            'nama_korem' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->insert_korem($data);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Ditambahkan!');
        redirect('Kodam/cKelolaData/korem');
    }

    public function updatekorem($id)
    {
        $data = array(
            'id_kodam'   => $this->input->post('id_kodam'),
            'kode_korem' => $this->input->post('kode'),
            'nama_korem' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->updatekorem($id, $data);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Diperbaharui!');
        redirect('Kodam/cKelolaData/korem');
    }

    public function deletekorem($id)
    {
        $this->mKelolaData->deletekorem($id);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Dihapus!');
        redirect('Kodam/cKelolaData/korem');
    }

    // ===================== KODIM (CRUD) =====================
    public function kodim()
    {
        $data = array(
            'kodim' => $this->mKelolaData->select_kodim(),
            'korem' => $this->mKelolaData->select_korem(),
        );
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/Kodim/vKodim', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function createkodim()
    {
        $data = array(
            'id_korem'   => $this->input->post('id_korem'),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->insert_kodim($data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Ditambahkan!');
        redirect('Kodam/cKelolaData/kodim');
    }

    public function updatekodim($id)
    {
        $data = array(
            'id_korem'   => $this->input->post('id_korem'),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->updatekodim($id, $data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Diperbaharui!');
        redirect('Kodam/cKelolaData/kodim');
    }

    public function deletekodim($id)
    {
        $this->mKelolaData->deletekodim($id);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Dihapus!');
        redirect('Kodam/cKelolaData/kodim');
    }

    // ===================== READ ONLY =====================
    public function kodam()
    {
        $data = array('kodam' => $this->mKelolaData->select_kodam());
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/Kodam/vKodam', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function data_keluarga_besar_tni()
    {
        $data = array('data_keluarga_besar_tni' => $this->mKelolaData->select_data_keluarga_besar_tni());
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/DataKeluargaBesarTni/vDataKeluargaBesarTni', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function data_para_tokoh()
    {
        $data = array('data_para_tokoh' => $this->mKelolaData->select_data_para_tokoh());
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/DataParaTokoh/vDataParaTokoh', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function data_organisasi()
    {
        $data = array('data_organisasi' => $this->mKelolaData->select_data_organisasi());
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/DataOrganisasi/vDataOrganisasi', $data);
        $this->load->view('Kodam/Layout/footer');
    }

    public function organisasi_penggiat_hobi()
    {
        $data = array('organisasi_penggiat_hobi' => $this->mKelolaData->select_organisasi_penggiat_hobi());
        $this->load->view('Kodam/Layout/head');
        $this->load->view('Kodam/Layout/aside');
        $this->load->view('Kodam/OrganisasiPenggiatHobi/vOrganisasiPenggiatHobi', $data);
        $this->load->view('Kodam/Layout/footer');
    }
}

/* End of file cKelolaData.php */
