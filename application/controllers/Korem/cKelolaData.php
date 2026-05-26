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

    // ===================== KOMPONEN BANGSA (CRUD) =====================

    // --- Data Keluarga Besar TNI ---
    public function data_keluarga_besar_tni()
    {
        $id_korem = $this->_get_id_korem();
        $data = array(
            'data_keluarga_besar_tni'       => $this->mKelolaData->select_data_keluarga_besar_tni_by_korem($id_korem),
            'data_keluarga_besar_tni_korem' => $this->mKelolaData->select_data_keluarga_besar_tni_korem_by_korem($id_korem),
            'kodim'                         => $this->mKelolaData->select_kodim_by_korem($id_korem),
            'korem'                         => $this->db->get_where('korem', ['id_korem' => $id_korem])->result(),
        );
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataKeluargaBesarTni/vDataKeluargaBesarTni', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function createdata_keluarga_besar_tni()
    {
        $data = array(
            'id_kodim'     => $this->input->post('id_kodim'),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'         => $this->input->post('nama'),
            'pekerjaan'    => $this->input->post('pekerjaan'),
            'no_hp'        => $this->input->post('no_hp'),
            'alamat'       => $this->input->post('alamat'),
            'keterangan'   => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_keluarga_besar_tni($data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    public function updatedata_keluarga_besar_tni($id)
    {
        $data = array(
            'id_kodim'     => $this->input->post('id_kodim'),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'         => $this->input->post('nama'),
            'pekerjaan'    => $this->input->post('pekerjaan'),
            'no_hp'        => $this->input->post('no_hp'),
            'alamat'       => $this->input->post('alamat'),
            'keterangan'   => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatedata_keluarga_besar_tni($id, $data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    public function deletedata_keluarga_besar_tni($id)
    {
        $this->mKelolaData->deletedata_keluarga_besar_tni($id);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    public function createdata_keluarga_besar_tni_korem()
    {
        $data = array(
            'id_korem'     => $this->_get_id_korem(),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'         => $this->input->post('nama'),
            'pekerjaan'    => $this->input->post('pekerjaan'),
            'no_hp'        => $this->input->post('no_hp'),
            'alamat'       => $this->input->post('alamat'),
            'keterangan'   => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_keluarga_besar_tni_korem($data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI (Korem) Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    public function updatedata_keluarga_besar_tni_korem($id)
    {
        $data = array(
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama'         => $this->input->post('nama'),
            'pekerjaan'    => $this->input->post('pekerjaan'),
            'no_hp'        => $this->input->post('no_hp'),
            'alamat'       => $this->input->post('alamat'),
            'keterangan'   => $this->input->post('keterangan'),
        );
        $this->mKelolaData->update_data_keluarga_besar_tni_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI (Korem) Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    public function deletedata_keluarga_besar_tni_korem($id)
    {
        $this->mKelolaData->delete_data_keluarga_besar_tni_korem($id);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI (Korem) Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_keluarga_besar_tni');
    }

    // --- Data Para Tokoh ---
    public function data_para_tokoh()
    {
        $id_korem = $this->_get_id_korem();
        $data = array(
            'data_para_tokoh'       => $this->mKelolaData->select_data_para_tokoh_by_korem($id_korem),
            'data_para_tokoh_korem' => $this->mKelolaData->select_data_para_tokoh_korem_by_korem($id_korem),
            'kodim'                 => $this->mKelolaData->select_kodim_by_korem($id_korem),
            'korem'                 => $this->db->get_where('korem', ['id_korem' => $id_korem])->result(),
        );
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataParaTokoh/vDataParaTokoh', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function createdata_para_tokoh()
    {
        $data = array(
            'id_kodim'       => $this->input->post('id_kodim'),
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'alamat'         => $this->input->post('alamat'),
            'no_hp'          => $this->input->post('no_hp'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_para_tokoh($data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    public function updatedata_para_tokoh($id)
    {
        $data = array(
            'id_kodim'       => $this->input->post('id_kodim'),
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'alamat'         => $this->input->post('alamat'),
            'no_hp'          => $this->input->post('no_hp'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatedata_para_tokoh($id, $data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    public function deletedata_para_tokoh($id)
    {
        $this->mKelolaData->deletedata_para_tokoh($id);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    public function createdata_para_tokoh_korem()
    {
        $data = array(
            'id_korem'       => $this->_get_id_korem(),
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'alamat'         => $this->input->post('alamat'),
            'no_hp'          => $this->input->post('no_hp'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_data_para_tokoh_korem($data);
        $this->session->set_flashdata('success', 'Data Para Tokoh (Korem) Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    public function updatedata_para_tokoh_korem($id)
    {
        $data = array(
            'nama_tokoh'     => $this->input->post('nama_tokoh'),
            'kategori_tokoh' => $this->input->post('kategori_tokoh'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'alamat'         => $this->input->post('alamat'),
            'no_hp'          => $this->input->post('no_hp'),
            'keterangan'     => $this->input->post('keterangan'),
        );
        $this->mKelolaData->update_data_para_tokoh_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Para Tokoh (Korem) Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    public function deletedata_para_tokoh_korem($id)
    {
        $this->mKelolaData->delete_data_para_tokoh_korem($id);
        $this->session->set_flashdata('success', 'Data Para Tokoh (Korem) Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_para_tokoh');
    }

    // --- Data Organisasi ---
    public function data_organisasi()
    {
        $id_korem = $this->_get_id_korem();
        $data = array(
            'data_organisasi'       => $this->mKelolaData->select_data_organisasi_by_korem($id_korem),
            'data_organisasi_korem' => $this->mKelolaData->select_data_organisasi_korem_by_korem($id_korem),
            'kodim'                 => $this->mKelolaData->select_kodim_by_korem($id_korem),
            'korem'                 => $this->db->get_where('korem', ['id_korem' => $id_korem])->result(),
        );
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/DataOrganisasi/vDataOrganisasi', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function createdata_organisasi()
    {
        $data = array(
            'id_kodim'            => $this->input->post('id_kodim'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp'),
        );
        $this->mKelolaData->insert_data_organisasi($data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    public function updatedata_organisasi($id)
    {
        $data = array(
            'id_kodim'            => $this->input->post('id_kodim'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp'),
        );
        $this->mKelolaData->updatedata_organisasi($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    public function deletedata_organisasi($id)
    {
        $this->mKelolaData->deletedata_organisasi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    public function createdata_organisasi_korem()
    {
        $data = array(
            'id_korem'            => $this->_get_id_korem(),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp'),
        );
        $this->mKelolaData->insert_data_organisasi_korem($data);
        $this->session->set_flashdata('success', 'Data Organisasi (Korem) Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    public function updatedata_organisasi_korem($id)
    {
        $data = array(
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp'),
        );
        $this->mKelolaData->update_data_organisasi_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi (Korem) Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    public function deletedata_organisasi_korem($id)
    {
        $this->mKelolaData->delete_data_organisasi_korem($id);
        $this->session->set_flashdata('success', 'Data Organisasi (Korem) Berhasil Dihapus!');
        redirect('Korem/cKelolaData/data_organisasi');
    }

    // --- Organisasi Penggiat Hobi ---
    public function organisasi_penggiat_hobi()
    {
        $id_korem = $this->_get_id_korem();
        $data = array(
            'organisasi_penggiat_hobi'       => $this->mKelolaData->select_organisasi_penggiat_hobi_by_korem($id_korem),
            'organisasi_penggiat_hobi_korem' => $this->mKelolaData->select_organisasi_penggiat_hobi_korem_by_korem($id_korem),
            'kodim'                          => $this->mKelolaData->select_kodim_by_korem($id_korem),
            'korem'                          => $this->db->get_where('korem', ['id_korem' => $id_korem])->result(),
        );
        $this->load->view('Korem/Layout/head');
        $this->load->view('Korem/Layout/aside');
        $this->load->view('Korem/OrganisasiPenggiatHobi/vOrganisasiPenggiatHobi', $data);
        $this->load->view('Korem/Layout/footer');
    }

    public function createorganisasi_penggiat_hobi()
    {
        $data = array(
            'id_kodim'        => $this->input->post('id_kodim'),
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
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }

    public function updateorganisasi_penggiat_hobi($id)
    {
        $data = array(
            'id_kodim'        => $this->input->post('id_kodim'),
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
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }

    public function deleteorganisasi_penggiat_hobi($id)
    {
        $this->mKelolaData->deleteorganisasi_penggiat_hobi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Dihapus!');
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }

    public function createorganisasi_penggiat_hobi_korem()
    {
        $data = array(
            'id_korem'        => $this->_get_id_korem(),
            'nama_komunitas'  => $this->input->post('nama_komunitas'),
            'jenis_hobi'      => $this->input->post('jenis_hobi'),
            'ketua_komunitas' => $this->input->post('ketua_komunitas'),
            'pekerjaan'       => $this->input->post('pekerjaan'),
            'no_hp'           => $this->input->post('no_hp'),
            'alamat'          => $this->input->post('alamat'),
            'jumlah_anggota'  => $this->input->post('jumlah_anggota'),
            'keterangan'      => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_organisasi_penggiat_hobi_korem($data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi (Korem) Berhasil Ditambahkan!');
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }

    public function updateorganisasi_penggiat_hobi_korem($id)
    {
        $data = array(
            'nama_komunitas'  => $this->input->post('nama_komunitas'),
            'jenis_hobi'      => $this->input->post('jenis_hobi'),
            'ketua_komunitas' => $this->input->post('ketua_komunitas'),
            'pekerjaan'       => $this->input->post('pekerjaan'),
            'no_hp'           => $this->input->post('no_hp'),
            'alamat'          => $this->input->post('alamat'),
            'jumlah_anggota'  => $this->input->post('jumlah_anggota'),
            'keterangan'      => $this->input->post('keterangan'),
        );
        $this->mKelolaData->update_organisasi_penggiat_hobi_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi (Korem) Berhasil Diperbaharui!');
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }

    public function deleteorganisasi_penggiat_hobi_korem($id)
    {
        $this->mKelolaData->delete_organisasi_penggiat_hobi_korem($id);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi (Korem) Berhasil Dihapus!');
        redirect('Korem/cKelolaData/organisasi_penggiat_hobi');
    }
}

/* End of file cKelolaData.php */
