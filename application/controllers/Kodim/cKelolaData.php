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

    // Ambil id_kodim milik user yang sedang login
    private function _get_id_kodim()
    {
        $id_user = (int) $this->session->userdata('id');
        $row = $this->db->query("SELECT id_wilayah FROM `user` WHERE id_user = {$id_user} LIMIT 1")->row();
        return ($row && !empty($row->id_wilayah)) ? (int) $row->id_wilayah : null;
    }

    // Query data komponen bangsa hanya untuk kodim aktif
    private function _select_by_kodim($table, $id_col)
    {
        $this->db->select('t.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from("$table t");
        $this->db->join('kodim kd', "t.id_kodim = kd.id_kodim", 'left');
        $this->db->where('t.id_kodim', $this->_get_id_kodim());
        return $this->db->get()->result();
    }

    // ===================== READ ONLY =====================
    public function kodam()
    {
        $data = array('kodam' => $this->mKelolaData->select_kodam());
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/Kodam/vKodam', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function korem()
    {
        $data = array('korem' => $this->mKelolaData->select_korem());
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/Korem/vKorem', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function kodim()
    {
        $data = array('kodim' => $this->mKelolaData->select_kodim());
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/Kodim/vKodim', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    // ===================== DATA KELUARGA BESAR TNI =====================
    public function data_keluarga_besar_tni()
    {
        $my_kodim = $this->db->get_where('kodim', ['id_kodim' => $this->_get_id_kodim()])->row();
        $data = array(
            'data_keluarga_besar_tni' => $this->_select_by_kodim('data_keluarga_besar_tni', 'id_kbt'),
            'my_kodim' => $my_kodim,
        );
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/DataKeluargaBesarTni/vDataKeluargaBesarTni', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function createdata_keluarga_besar_tni()
    {
        $data = array(
            'id_kodim'    => $this->_get_id_kodim(),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'        => $this->input->post('nama'),
            'pekerjaan'   => $this->input->post('pekerjaan'),
            'no_hp'       => $this->input->post('no_hp'),
            'alamat'      => $this->input->post('alamat'),
            'keterangan'  => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_keluarga_besar_tni($data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Ditambahkan!');
        redirect('Kodim/cKelolaData/data_keluarga_besar_tni');
    }

    public function updatedata_keluarga_besar_tni($id)
    {
        $data = array(
            'id_kodim'    => $this->_get_id_kodim(),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'        => $this->input->post('nama'),
            'pekerjaan'   => $this->input->post('pekerjaan'),
            'no_hp'       => $this->input->post('no_hp'),
            'alamat'      => $this->input->post('alamat'),
            'keterangan'  => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatedata_keluarga_besar_tni($id, $data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Diperbaharui!');
        redirect('Kodim/cKelolaData/data_keluarga_besar_tni');
    }

    public function deletedata_keluarga_besar_tni($id)
    {
        $this->mKelolaData->deletedata_keluarga_besar_tni($id);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Dihapus!');
        redirect('Kodim/cKelolaData/data_keluarga_besar_tni');
    }

    // ===================== DATA PARA TOKOH =====================
    public function data_para_tokoh()
    {
        $my_kodim = $this->db->get_where('kodim', ['id_kodim' => $this->_get_id_kodim()])->row();
        $data = array(
            'data_para_tokoh' => $this->_select_by_kodim('data_para_tokoh', 'id_tokoh'),
            'my_kodim'        => $my_kodim,
        );
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/DataParaTokoh/vDataParaTokoh', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function createdata_para_tokoh()
    {
        $data = array(
            'id_kodim'       => $this->_get_id_kodim(),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_para_tokoh($data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Ditambahkan!');
        redirect('Kodim/cKelolaData/data_para_tokoh');
    }

    public function updatedata_para_tokoh($id)
    {
        $data = array(
            'id_kodim'       => $this->_get_id_kodim(),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatedata_para_tokoh($id, $data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Diperbaharui!');
        redirect('Kodim/cKelolaData/data_para_tokoh');
    }

    public function deletedata_para_tokoh($id)
    {
        $this->mKelolaData->deletedata_para_tokoh($id);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Dihapus!');
        redirect('Kodim/cKelolaData/data_para_tokoh');
    }

    // ===================== DATA ORGANISASI =====================
    public function data_organisasi()
    {
        $my_kodim = $this->db->get_where('kodim', ['id_kodim' => $this->_get_id_kodim()])->row();
        $data = array(
            'data_organisasi' => $this->_select_by_kodim('data_organisasi', 'id_organisasi'),
            'my_kodim'        => $my_kodim,
        );
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/DataOrganisasi/vDataOrganisasi', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function createdata_organisasi()
    {
        $data = array(
            'id_kodim'            => $this->_get_id_kodim(),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'no_hp'               => $this->input->post('no_hp'),
            'alamat'              => $this->input->post('alamat'),
        );
        $this->mKelolaData->insert_data_organisasi($data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Ditambahkan!');
        redirect('Kodim/cKelolaData/data_organisasi');
    }

    public function updatedata_organisasi($id)
    {
        $data = array(
            'id_kodim'            => $this->_get_id_kodim(),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'no_hp'               => $this->input->post('no_hp'),
            'alamat'              => $this->input->post('alamat'),
        );
        $this->mKelolaData->updatedata_organisasi($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Diperbaharui!');
        redirect('Kodim/cKelolaData/data_organisasi');
    }

    public function deletedata_organisasi($id)
    {
        $this->mKelolaData->deletedata_organisasi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Dihapus!');
        redirect('Kodim/cKelolaData/data_organisasi');
    }

    // ===================== ORGANISASI PENGGIAT HOBI =====================
    public function organisasi_penggiat_hobi()
    {
        $my_kodim = $this->db->get_where('kodim', ['id_kodim' => $this->_get_id_kodim()])->row();
        $this->db->select('oph.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('organisasi_penggiat_hobi oph');
        $this->db->join('kodim kd', 'oph.id_kodim = kd.id_kodim', 'left');
        $this->db->where('oph.id_kodim', $this->_get_id_kodim());
        $data = array(
            'organisasi_penggiat_hobi' => $this->db->get()->result(),
            'my_kodim'                 => $my_kodim,
        );
        $this->load->view('Kodim/Layout/head');
        $this->load->view('Kodim/Layout/aside');
        $this->load->view('Kodim/OrganisasiPenggiatHobi/vOrganisasiPenggiatHobi', $data);
        $this->load->view('Kodim/Layout/footer');
    }

    public function createorganisasi_penggiat_hobi()
    {
        $data = array(
            'id_kodim'        => $this->_get_id_kodim(),
            'nama_komunitas'  => $this->input->post('nama_komunitas'),
            'jenis_hobi'      => $this->input->post('jenis_hobi'),
            'ketua_komunitas' => $this->input->post('ketua_komunitas'),
            'pekerjaan'       => $this->input->post('pekerjaan'),
            'no_hp'           => $this->input->post('no_hp'),
            'alamat'          => $this->input->post('alamat'),
            'jumlah_anggota'  => $this->input->post('jumlah_anggota'),
            'keterangan'      => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_organisasi_penggiat_hobi($data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Ditambahkan!');
        redirect('Kodim/cKelolaData/organisasi_penggiat_hobi');
    }

    public function updateorganisasi_penggiat_hobi($id)
    {
        $data = array(
            'id_kodim'        => $this->_get_id_kodim(),
            'nama_komunitas'  => $this->input->post('nama_komunitas'),
            'jenis_hobi'      => $this->input->post('jenis_hobi'),
            'ketua_komunitas' => $this->input->post('ketua_komunitas'),
            'pekerjaan'       => $this->input->post('pekerjaan'),
            'no_hp'           => $this->input->post('no_hp'),
            'alamat'          => $this->input->post('alamat'),
            'jumlah_anggota'  => $this->input->post('jumlah_anggota'),
            'keterangan'      => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updateorganisasi_penggiat_hobi($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Diperbaharui!');
        redirect('Kodim/cKelolaData/organisasi_penggiat_hobi');
    }

    public function deleteorganisasi_penggiat_hobi($id)
    {
        $this->mKelolaData->deleteorganisasi_penggiat_hobi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Dihapus!');
        redirect('Kodim/cKelolaData/organisasi_penggiat_hobi');
    }
}

/* End of file cKelolaData.php */
