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

    // Ambil id_korem milik user yang sedang login
    private function _get_id_korem()
    {
        $id_user = (int) $this->session->userdata('id');
        $row = $this->db->query("SELECT id_wilayah FROM `user` WHERE id_user = {$id_user} LIMIT 1")->row();
        return ($row && !empty($row->id_wilayah)) ? (int) $row->id_wilayah : null;
    }

    // ===================== KODIM (CRUD) =====================
    public function kodim()
    {
        $id_korem = $this->_get_id_korem();

        // Hanya tampilkan Kodim milik Korem user ini
        $this->db->select('kd.*, kr.nama_korem, kr.kode_korem');
        $this->db->from('kodim kd');
        $this->db->join('korem kr', 'kd.id_korem = kr.id_korem', 'left');
        $this->db->where('kd.id_korem', $id_korem);
        $kodim = $this->db->get()->result();

        $my_korem = $this->db->get_where('korem', ['id_korem' => $id_korem])->row();

        $data = array(
            'kodim'    => $kodim,
            'my_korem' => $my_korem,
        );
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/Kodim/vKodim', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function createkodim()
    {
        $data = array(
            'id_korem'   => $this->_get_id_korem(),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->insert_kodim($data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/kodim');
    }

    public function updatekodim($id)
    {
        $data = array(
            'id_korem'   => $this->_get_id_korem(),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah'    => $this->input->post('wilayah'),
        );
        $this->mKelolaData->updatekodim($id, $data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/kodim');
    }

    public function deletekodim($id)
    {
        $this->mKelolaData->deletekodim($id);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Dihapus!');
        redirect('Korem/cKelolaData/kodim');
    }

    // ===================== READ ONLY =====================
    public function kodam()
    {
        $data = array('kodam' => $this->mKelolaData->select_kodam());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/Kodam/vKodam', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function korem()
    {
        $data = array('korem' => $this->mKelolaData->select_korem());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/Korem/vKorem', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function data_keluarga_besar_tni()
    {
        $data = array('data_keluarga_besar_tni' => $this->mKelolaData->select_data_keluarga_besar_tni());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataKeluargaBesarTni/vDataKeluargaBesarTni', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function data_para_tokoh()
    {
        $data = array('data_para_tokoh' => $this->mKelolaData->select_data_para_tokoh());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataParaTokoh/vDataParaTokoh', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function data_organisasi()
    {
        $data = array('data_organisasi' => $this->mKelolaData->select_data_organisasi());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataOrganisasi/vDataOrganisasi', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function organisasi_penggiat_hobi()
    {
        $data = array('organisasi_penggiat_hobi' => $this->mKelolaData->select_organisasi_penggiat_hobi());
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/OrganisasiPenggiatHobi/vOrganisasiPenggiatHobi', $data);
        $this->load->view('Korem/Layout/footer');
    }
}

/* End of file cKelolaData.php */
