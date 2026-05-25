<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaData');
    }


    //kategori
    public function kategori()
    {
        $data = array(
            'kategori' => $this->mKelolaData->select_kategori()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/kategori/vkategori', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->insert_kategori($data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function updatekategori($id)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->updatekategori($id, $data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Update!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function deletekategori($id)
    {
        $this->mKelolaData->deletekategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('Admin/cKelolaData/kategori');
    }

    //barang
    public function barang()
    {
        $data = array(
            'barang' => $this->mKelolaData->select_barang()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/barang/vbarang', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createbarang()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_barang($data);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/barang');
    }
    public function updatebarang($id)
    {
        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatebarang($id, $data);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/barang');
    }
    public function deletebarang($id)
    {
        $this->mKelolaData->deletebarang($id);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus!');
        redirect('Admin/cKelolaData/barang');
    }

    //lokasi
    public function lokasi()
    {
        $data = array(
            'lokasi' => $this->mKelolaData->select_lokasi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/lokasi/vlokasi', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createlokasi()
    {
        $data = array(
            'nama_lokasi' => $this->input->post('nama'),
            'alamat_lengkap' => $this->input->post('alamat')
        );
        $this->mKelolaData->insert_lokasi($data);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Disimpan!');
        redirect('Admin/cKelolaData/lokasi');
    }
    public function updatelokasi($id)
    {
        $data = array(
            'nama_lokasi' => $this->input->post('nama'),
            'alamat_lengkap' => $this->input->post('alamat')
        );
        $this->mKelolaData->updatelokasi($id, $data);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/lokasi');
    }
    public function deletelokasi($id)
    {
        $this->mKelolaData->deletelokasi($id);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Dihapus!');
        redirect('Admin/cKelolaData/lokasi');
    }


    //user
    public function user()
    {
        $data = array(
            'user'   => $this->mKelolaData->select_user(),
            'kodam'  => $this->mKelolaData->select_kodam(),
            'korem'  => $this->mKelolaData->select_korem(),
            'kodim'  => $this->mKelolaData->select_kodim(),
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/user/vuser', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createuser()
    {
        $level = $this->input->post('level');
        $data = array(
            'nama_user'  => $this->input->post('nama'),
            'no_hp'      => $this->input->post('no_hp'),
            'alamat'     => $this->input->post('alamat'),
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
            'level_user' => $level,
            'id_wilayah' => in_array($level, ['3', '4', '5']) ? $this->input->post('id_wilayah') : null,
        );
        $this->mKelolaData->insert_user($data);
        $this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
        redirect('Admin/cKelolaData/user');
    }
    public function updateuser($id)
    {
        $level = $this->input->post('level');
        $data = array(
            'nama_user'  => $this->input->post('nama'),
            'no_hp'      => $this->input->post('no_hp'),
            'alamat'     => $this->input->post('alamat'),
            'username'   => $this->input->post('username'),
            'password'   => $this->input->post('password'),
            'level_user' => $level,
            'id_wilayah' => in_array($level, ['3', '4', '5']) ? $this->input->post('id_wilayah') : null,
        );
        $this->mKelolaData->updateuser($id, $data);
        $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/user');
    }
    public function deleteuser($id)
    {
        $this->mKelolaData->delete($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/cKelolaData/user');
    }

    //kodam
    public function kodam()
    {
        $data = array(
            'kodam' => $this->mKelolaData->select_kodam()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Kodam/vKodam', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkodam()
    {
        $data = array(
            'kode_kodam' => $this->input->post('kode'),
            'nama_kodam' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->insert_kodam($data);
        $this->session->set_flashdata('success', 'Data Kodam Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/kodam');
    }
    public function updatekodam($id)
    {
        $data = array(
            'kode_kodam' => $this->input->post('kode'),
            'nama_kodam' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->updatekodam($id, $data);
        $this->session->set_flashdata('success', 'Data Kodam Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/kodam');
    }
    public function deletekodam($id)
    {
        $this->mKelolaData->deletekodam($id);
        $this->session->set_flashdata('success', 'Data Kodam Berhasil Dihapus!');
        redirect('Admin/cKelolaData/kodam');
    }

    //korem
    public function korem()
    {
        $data = array(
            'korem' => $this->mKelolaData->select_korem(),
            'kodam' => $this->mKelolaData->select_kodam()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Korem/vKorem', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkorem()
    {
        $data = array(
            'id_kodam' => $this->input->post('id_kodam'),
            'kode_korem' => $this->input->post('kode'),
            'nama_korem' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->insert_korem($data);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/korem');
    }
    public function updatekorem($id)
    {
        $data = array(
            'id_kodam' => $this->input->post('id_kodam'),
            'kode_korem' => $this->input->post('kode'),
            'nama_korem' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->updatekorem($id, $data);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/korem');
    }
    public function deletekorem($id)
    {
        $this->mKelolaData->deletekorem($id);
        $this->session->set_flashdata('success', 'Data Korem Berhasil Dihapus!');
        redirect('Admin/cKelolaData/korem');
    }

    //kodim
    public function kodim()
    {
        $data = array(
            'kodim' => $this->mKelolaData->select_kodim(),
            'korem' => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Kodim/vKodim', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkodim()
    {
        $data = array(
            'id_korem' => $this->input->post('id_korem'),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->insert_kodim($data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/kodim');
    }
    public function updatekodim($id)
    {
        $data = array(
            'id_korem' => $this->input->post('id_korem'),
            'kode_kodim' => $this->input->post('kode'),
            'nama_kodim' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->updatekodim($id, $data);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/kodim');
    }
    public function deletekodim($id)
    {
        $this->mKelolaData->deletekodim($id);
        $this->session->set_flashdata('success', 'Data Kodim Berhasil Dihapus!');
        redirect('Admin/cKelolaData/kodim');
    }

    //koramil
    public function koramil()
    {
        $data = array(
            'koramil' => $this->mKelolaData->select_koramil(),
            'kodim' => $this->mKelolaData->select_kodim()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Koramil/vKoramil', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkoramil()
    {
        $data = array(
            'id_kodim' => $this->input->post('id_kodim'),
            'kode_koramil' => $this->input->post('kode'),
            'nama_koramil' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->insert_koramil($data);
        $this->session->set_flashdata('success', 'Data Koramil Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/koramil');
    }
    public function updatekoramil($id)
    {
        $data = array(
            'id_kodim' => $this->input->post('id_kodim'),
            'kode_koramil' => $this->input->post('kode'),
            'nama_koramil' => $this->input->post('nama'),
            'wilayah' => $this->input->post('wilayah')
        );
        $this->mKelolaData->updatekoramil($id, $data);
        $this->session->set_flashdata('success', 'Data Koramil Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/koramil');
    }
    public function deletekoramil($id)
    {
        $this->mKelolaData->deletekoramil($id);
        $this->session->set_flashdata('success', 'Data Koramil Berhasil Dihapus!');
        redirect('Admin/cKelolaData/koramil');
    }

    //babinsa
    public function babinsa()
    {
        $data = array(
            'babinsa' => $this->mKelolaData->select_babinsa(),
            'koramil' => $this->mKelolaData->select_koramil()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Babinsa/vBabinsa', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createbabinsa()
    {
        $data = array(
            'id_koramil' => $this->input->post('id_koramil'),
            'nrp' => $this->input->post('nrp'),
            'nama_babinsa' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'jabatan' => $this->input->post('jabatan'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
        );
        $this->mKelolaData->insert_babinsa($data);
        $this->session->set_flashdata('success', 'Data Babinsa Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/babinsa');
    }
    public function updatebabinsa($id)
    {
        $data = array(
            'id_koramil' => $this->input->post('id_koramil'),
            'nrp' => $this->input->post('nrp'),
            'nama_babinsa' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'jabatan' => $this->input->post('jabatan'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
        );
        $this->mKelolaData->updatebabinsa($id, $data);
        $this->session->set_flashdata('success', 'Data Babinsa Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/babinsa');
    }
    public function deletebabinsa($id)
    {
        $this->mKelolaData->deletebabinsa($id);
        $this->session->set_flashdata('success', 'Data Babinsa Berhasil Dihapus!');
        redirect('Admin/cKelolaData/babinsa');
    }

    //data_keluarga_besar_tni
    public function data_keluarga_besar_tni()
    {
        $data = array(
            'data_keluarga_besar_tni' => $this->mKelolaData->select_data_keluarga_besar_tni(),
            'data_keluarga_besar_tni_korem' => $this->mKelolaData->select_data_keluarga_besar_tni_korem(),
            'kodim' => $this->mKelolaData->select_kodim(),
            'korem' => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/DataKeluargaBesarTni/vDataKeluargaBesarTni', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createdata_keluarga_besar_tni()
    {
        $data = array(
            'id_kodim' => $this->input->post('id_kodim'),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_data_keluarga_besar_tni($data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni');
    }
    public function updatedata_keluarga_besar_tni($id)
    {
        $data = array(
            'id_kodim' => $this->input->post('id_kodim'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->mKelolaData->updatedata_keluarga_besar_tni($id, $data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni');
    }
    public function deletedata_keluarga_besar_tni($id)
    {
        $this->mKelolaData->deletedata_keluarga_besar_tni($id);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni');
    }

    //data_para_tokoh
    public function data_para_tokoh()
    {
        $data = array(
            'data_para_tokoh'       => $this->mKelolaData->select_data_para_tokoh(),
            'data_para_tokoh_korem' => $this->mKelolaData->select_data_para_tokoh_korem(),
            'kodim'                 => $this->mKelolaData->select_kodim(),
            'korem'                 => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/DataParaTokoh/vDataParaTokoh', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createdata_para_tokoh()
    {
        $data = array(
            'id_kodim'      => $this->input->post('id_kodim'),
            'nama_tokoh'    => $this->input->post('nama_tokoh'),
            'kategori_tokoh'=> $this->input->post('kategori_tokoh'),
            'pekerjaan'     => $this->input->post('pekerjaan'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_data_para_tokoh($data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }
    public function updatedata_para_tokoh($id)
    {
        $data = array(
            'id_kodim'      => $this->input->post('id_kodim'),
            'nama_tokoh'    => $this->input->post('nama_tokoh'),
            'kategori_tokoh'=> $this->input->post('kategori_tokoh'),
            'pekerjaan'     => $this->input->post('pekerjaan'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->mKelolaData->updatedata_para_tokoh($id, $data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }
    public function deletedata_para_tokoh($id)
    {
        $this->mKelolaData->deletedata_para_tokoh($id);
        $this->session->set_flashdata('success', 'Data Para Tokoh Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }
    public function createdata_para_tokoh_korem()
    {
        $data = array(
            'id_korem'      => $this->input->post('id_korem'),
            'nama_tokoh'    => $this->input->post('nama_tokoh'),
            'kategori_tokoh'=> $this->input->post('kategori_tokoh'),
            'pekerjaan'     => $this->input->post('pekerjaan'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_data_para_tokoh_korem($data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Korem Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }
    public function updatedata_para_tokoh_korem($id)
    {
        $data = array(
            'id_korem'      => $this->input->post('id_korem'),
            'nama_tokoh'    => $this->input->post('nama_tokoh'),
            'kategori_tokoh'=> $this->input->post('kategori_tokoh'),
            'pekerjaan'     => $this->input->post('pekerjaan'),
            'alamat'        => $this->input->post('alamat'),
            'no_hp'         => $this->input->post('no_hp'),
            'keterangan'    => $this->input->post('keterangan')
        );
        $this->mKelolaData->update_data_para_tokoh_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Para Tokoh Korem Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }
    public function deletedata_para_tokoh_korem($id)
    {
        $this->mKelolaData->delete_data_para_tokoh_korem($id);
        $this->session->set_flashdata('success', 'Data Para Tokoh Korem Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_para_tokoh');
    }

    //data_organisasi
    public function data_organisasi()
    {
        $data = array(
            'data_organisasi'       => $this->mKelolaData->select_data_organisasi(),
            'data_organisasi_korem' => $this->mKelolaData->select_data_organisasi_korem(),
            'kodim'                 => $this->mKelolaData->select_kodim(),
            'korem'                 => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/DataOrganisasi/vDataOrganisasi', $data);
        $this->load->view('Admin/Layout/footer');
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
            'no_hp'               => $this->input->post('no_hp')
        );
        $this->mKelolaData->insert_data_organisasi($data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_organisasi');
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
            'no_hp'               => $this->input->post('no_hp')
        );
        $this->mKelolaData->updatedata_organisasi($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_organisasi');
    }
    public function deletedata_organisasi($id)
    {
        $this->mKelolaData->deletedata_organisasi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_organisasi');
    }
    public function createdata_organisasi_korem()
    {
        $data = array(
            'id_korem'            => $this->input->post('id_korem'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp')
        );
        $this->mKelolaData->insert_data_organisasi_korem($data);
        $this->session->set_flashdata('success', 'Data Organisasi Korem Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_organisasi');
    }
    public function updatedata_organisasi_korem($id)
    {
        $data = array(
            'id_korem'            => $this->input->post('id_korem'),
            'nama_organisasi'     => $this->input->post('nama_organisasi'),
            'kelompok_organisasi' => $this->input->post('kelompok_organisasi'),
            'jenis_organisasi'    => $this->input->post('jenis_organisasi'),
            'ketua_organisasi'    => $this->input->post('ketua_organisasi'),
            'pekerjaan'           => $this->input->post('pekerjaan'),
            'alamat'              => $this->input->post('alamat'),
            'no_hp'               => $this->input->post('no_hp')
        );
        $this->mKelolaData->update_data_organisasi_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Korem Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_organisasi');
    }
    public function deletedata_organisasi_korem($id)
    {
        $this->mKelolaData->delete_data_organisasi_korem($id);
        $this->session->set_flashdata('success', 'Data Organisasi Korem Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_organisasi');
    }

    //organisasi_penggiat_hobi
    public function organisasi_penggiat_hobi()
    {
        $data = array(
            'organisasi_penggiat_hobi'       => $this->mKelolaData->select_organisasi_penggiat_hobi(),
            'organisasi_penggiat_hobi_korem' => $this->mKelolaData->select_organisasi_penggiat_hobi_korem(),
            'kodim'                          => $this->mKelolaData->select_kodim(),
            'korem'                          => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/OrganisasiPenggiatHobi/vOrganisasiPenggiatHobi', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createorganisasi_penggiat_hobi()
    {
        $data = array(
            'id_kodim'       => $this->input->post('id_kodim'),
            'nama_komunitas' => $this->input->post('nama_komunitas'),
            'jenis_hobi'     => $this->input->post('jenis_hobi'),
            'ketua_komunitas'=> $this->input->post('ketua_komunitas'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'jumlah_anggota' => $this->input->post('jumlah_anggota'),
            'keterangan'     => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_organisasi_penggiat_hobi($data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }
    public function updateorganisasi_penggiat_hobi($id)
    {
        $data = array(
            'id_kodim'       => $this->input->post('id_kodim'),
            'nama_komunitas' => $this->input->post('nama_komunitas'),
            'jenis_hobi'     => $this->input->post('jenis_hobi'),
            'ketua_komunitas'=> $this->input->post('ketua_komunitas'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'jumlah_anggota' => $this->input->post('jumlah_anggota'),
            'keterangan'     => $this->input->post('keterangan')
        );
        $this->mKelolaData->updateorganisasi_penggiat_hobi($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }
    public function deleteorganisasi_penggiat_hobi($id)
    {
        $this->mKelolaData->deleteorganisasi_penggiat_hobi($id);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Berhasil Dihapus!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }
    public function createorganisasi_penggiat_hobi_korem()
    {
        $data = array(
            'id_korem'       => $this->input->post('id_korem'),
            'nama_komunitas' => $this->input->post('nama_komunitas'),
            'jenis_hobi'     => $this->input->post('jenis_hobi'),
            'ketua_komunitas'=> $this->input->post('ketua_komunitas'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'jumlah_anggota' => $this->input->post('jumlah_anggota'),
            'keterangan'     => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_organisasi_penggiat_hobi_korem($data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Korem Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }
    public function updateorganisasi_penggiat_hobi_korem($id)
    {
        $data = array(
            'id_korem'       => $this->input->post('id_korem'),
            'nama_komunitas' => $this->input->post('nama_komunitas'),
            'jenis_hobi'     => $this->input->post('jenis_hobi'),
            'ketua_komunitas'=> $this->input->post('ketua_komunitas'),
            'pekerjaan'      => $this->input->post('pekerjaan'),
            'no_hp'          => $this->input->post('no_hp'),
            'alamat'         => $this->input->post('alamat'),
            'jumlah_anggota' => $this->input->post('jumlah_anggota'),
            'keterangan'     => $this->input->post('keterangan')
        );
        $this->mKelolaData->update_organisasi_penggiat_hobi_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Korem Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }
    public function deleteorganisasi_penggiat_hobi_korem($id)
    {
        $this->mKelolaData->delete_organisasi_penggiat_hobi_korem($id);
        $this->session->set_flashdata('success', 'Data Organisasi Penggiat Hobi Korem Berhasil Dihapus!');
        redirect('Admin/cKelolaData/organisasi_penggiat_hobi');
    }

    //data_keluarga_besar_tni_korem
    public function data_keluarga_besar_tni_korem()
    {
        $data = array(
            'data_keluarga_besar_tni' => $this->mKelolaData->select_data_keluarga_besar_tni(),
            'data_keluarga_besar_tni_korem' => $this->mKelolaData->select_data_keluarga_besar_tni_korem(),
            'kodim' => $this->mKelolaData->select_kodim(),
            'korem' => $this->mKelolaData->select_korem()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/DataKeluargaBesarTni/vDataKeluargaBesarTniKorem', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createdata_keluarga_besar_tni_korem()
    {
        $data = array(
            'id_korem' => $this->input->post('id_korem'),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->mKelolaData->insert_data_keluarga_besar_tni_korem($data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Korem Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni_korem');
    }
    public function updatedata_keluarga_besar_tni_korem($id)
    {
        $data = array(
            'id_korem' => $this->input->post('id_korem'),
            'kelompok_kbt' => $this->input->post('kelompok_kbt'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->mKelolaData->update_data_keluarga_besar_tni_korem($id, $data);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Korem Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni_korem');
    }
    public function deletedata_keluarga_besar_tni_korem($id)
    {
        $this->mKelolaData->delete_data_keluarga_besar_tni_korem($id);
        $this->session->set_flashdata('success', 'Data Keluarga Besar TNI Korem Berhasil Dihapus!');
        redirect('Admin/cKelolaData/data_keluarga_besar_tni_korem');
    }
}

/* End of file cKelolaData.php */
