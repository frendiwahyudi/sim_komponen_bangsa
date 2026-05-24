<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaData extends CI_Model
{
    //kategori
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function updatekategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function deletekategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    //barang
    public function select_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->result();
    }
    public function insert_barang($data)
    {
        $this->db->insert('barang', $data);
    }
    public function updatebarang($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function deletebarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    //lokasi
    public function select_lokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi_asset');
        return $this->db->get()->result();
    }
    public function insert_lokasi($data)
    {
        $this->db->insert('lokasi_asset', $data);
    }
    public function updatelokasi($id, $data)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi_asset', $data);
    }
    public function deletelokasi($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi_asset');
    }

    //user
    public function select_user()
    {
        $sql = "SELECT u.*,
                    COALESCE(kd.nama_kodam, kr.nama_korem, kdm.nama_kodim) as nama_wilayah,
                    COALESCE(kd.kode_kodam, kr.kode_korem, kdm.kode_kodim) as kode_wilayah
                FROM user u
                LEFT JOIN kodam kd  ON u.level_user = 3 AND u.id_wilayah = kd.id_kodam
                LEFT JOIN korem kr  ON u.level_user = 4 AND u.id_wilayah = kr.id_korem
                LEFT JOIN kodim kdm ON u.level_user = 5 AND u.id_wilayah = kdm.id_kodim
                
                ORDER BY FIELD(u.level_user, 1,3,4,5),
                     nama_wilayah ASC";
        return $this->db->query($sql)->result();
    }
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function updateuser($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    //kodam
    public function select_kodam()
    {
        $this->db->select('*');
        $this->db->from('kodam');
        $this->db->order_by('id_kodam', 'ASC');
        return $this->db->get()->result();
    }
    public function insert_kodam($data)
    {
        $this->db->insert('kodam', $data);
    }
    public function updatekodam($id, $data)
    {
        $this->db->where('id_kodam', $id);
        $this->db->update('kodam', $data);
    }
    public function deletekodam($id)
    {
        $this->db->where('id_kodam', $id);
        $this->db->delete('kodam');
    }

    //korem
    public function select_korem()
    {
        $this->db->select('k.*, ko.nama_kodam, ko.kode_kodam');
        $this->db->from('korem k');
        $this->db->join('kodam ko', 'k.id_kodam = ko.id_kodam', 'left');
        $this->db->order_by('k.kode_korem', 'ASC');
        return $this->db->get()->result();
    }
    public function insert_korem($data)
    {
        $this->db->insert('korem', $data);
    }
    public function updatekorem($id, $data)
    {
        $this->db->where('id_korem', $id);
        $this->db->update('korem', $data);
    }
    public function deletekorem($id)
    {
        $this->db->where('id_korem', $id);
        $this->db->delete('korem');
    }

    //kodim
    public function select_kodim()
    {
        $this->db->select('kd.*, kr.nama_korem, kr.kode_korem');
        $this->db->from('kodim kd');
        $this->db->join('korem kr', 'kd.id_korem = kr.id_korem', 'left');
        $this->db->order_by('kd.kode_kodim', 'ASC');
        return $this->db->get()->result();
    }
    public function insert_kodim($data)
    {
        $this->db->insert('kodim', $data);
    }
    public function updatekodim($id, $data)
    {
        $this->db->where('id_kodim', $id);
        $this->db->update('kodim', $data);
    }
    public function deletekodim($id)
    {
        $this->db->where('id_kodim', $id);
        $this->db->delete('kodim');
    }

    //koramil
    public function select_koramil()
    {
        $this->db->select('km.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('koramil km');
        $this->db->join('kodim kd', 'km.id_kodim = kd.id_kodim', 'left');
        $this->db->order_by('km.id_koramil', 'ASC');
        return $this->db->get()->result();
    }
    public function insert_koramil($data)
    {
        $this->db->insert('koramil', $data);
    }
    public function updatekoramil($id, $data)
    {
        $this->db->where('id_koramil', $id);
        $this->db->update('koramil', $data);
    }
    public function deletekoramil($id)
    {
        $this->db->where('id_koramil', $id);
        $this->db->delete('koramil');
    }

    //babinsa
    public function select_babinsa()
    {
        $this->db->select('b.*, km.nama_koramil, km.kode_koramil');
        $this->db->from('babinsa b');
        $this->db->join('koramil km', 'b.id_koramil = km.id_koramil', 'left');
        $this->db->order_by('b.id_babinsa', 'ASC');
        return $this->db->get()->result();
    }
    public function insert_babinsa($data)
    {
        $this->db->insert('babinsa', $data);
    }
    public function updatebabinsa($id, $data)
    {
        $this->db->where('id_babinsa', $id);
        $this->db->update('babinsa', $data);
    }
    public function deletebabinsa($id)
    {
        $this->db->where('id_babinsa', $id);
        $this->db->delete('babinsa');
    }

    //data_keluarga_besar_tni
    public function select_data_keluarga_besar_tni()
    {
        $this->db->select('dkbt.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_keluarga_besar_tni dkbt');
        $this->db->join('kodim kd', 'dkbt.id_kodim = kd.id_kodim', 'left');
        return $this->db->get()->result();
    }
    public function insert_data_keluarga_besar_tni($data)
    {
        $this->db->insert('data_keluarga_besar_tni', $data);
    }
    public function updatedata_keluarga_besar_tni($id, $data)
    {
        $this->db->where('id_kbt', $id);
        $this->db->update('data_keluarga_besar_tni', $data);
    }
    public function deletedata_keluarga_besar_tni($id)
    {
        $this->db->where('id_kbt', $id);
        $this->db->delete('data_keluarga_besar_tni');
    }

    //data_para_tokoh
    public function select_data_para_tokoh()
    {
        $this->db->select('dpt.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_para_tokoh dpt');
        $this->db->join('kodim kd', 'dpt.id_kodim = kd.id_kodim', 'left');
        return $this->db->get()->result();
    }
    public function insert_data_para_tokoh($data)
    {
        $this->db->insert('data_para_tokoh', $data);
    }
    public function updatedata_para_tokoh($id, $data)
    {
        $this->db->where('id_tokoh', $id);
        $this->db->update('data_para_tokoh', $data);
    }
    public function deletedata_para_tokoh($id)
    {
        $this->db->where('id_tokoh', $id);
        $this->db->delete('data_para_tokoh');
    }

    //data_organisasi
    public function select_data_organisasi()
    {
        $this->db->select('do.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_organisasi do');
        $this->db->join('kodim kd', 'do.id_kodim = kd.id_kodim', 'left');
        return $this->db->get()->result();
    }
    public function insert_data_organisasi($data)
    {
        $this->db->insert('data_organisasi', $data);
    }
    public function updatedata_organisasi($id, $data)
    {
        $this->db->where('id_organisasi', $id);
        $this->db->update('data_organisasi', $data);
    }
    public function deletedata_organisasi($id)
    {
        $this->db->where('id_organisasi', $id);
        $this->db->delete('data_organisasi');
    }

    //organisasi_penggiat_hobi
    public function select_organisasi_penggiat_hobi()
    {
        $this->db->select('oph.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('organisasi_penggiat_hobi oph');
        $this->db->join('kodim kd', 'oph.id_kodim = kd.id_kodim', 'left');
        return $this->db->get()->result();
    }
    public function insert_organisasi_penggiat_hobi($data)
    {
        $this->db->insert('organisasi_penggiat_hobi', $data);
    }
    public function updateorganisasi_penggiat_hobi($id, $data)
    {
        $this->db->where('id_hobi', $id);
        $this->db->update('organisasi_penggiat_hobi', $data);
    }
    public function deleteorganisasi_penggiat_hobi($id)
    {
        $this->db->where('id_hobi', $id);
        $this->db->delete('organisasi_penggiat_hobi');
    }

    // ===== Korem: filtered by id_korem =====

    public function select_kodim_by_korem($id_korem)
    {
        $this->db->from('kodim');
        $this->db->where('id_korem', $id_korem);
        return $this->db->get()->result();
    }

    public function select_data_keluarga_besar_tni_by_korem($id_korem)
    {
        $this->db->select('dkbt.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_keluarga_besar_tni dkbt');
        $this->db->join('kodim kd', 'dkbt.id_kodim = kd.id_kodim', 'left');
        $this->db->where('kd.id_korem', $id_korem);
        return $this->db->get()->result();
    }

    public function select_data_para_tokoh_by_korem($id_korem)
    {
        $this->db->select('dpt.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_para_tokoh dpt');
        $this->db->join('kodim kd', 'dpt.id_kodim = kd.id_kodim', 'left');
        $this->db->where('kd.id_korem', $id_korem);
        return $this->db->get()->result();
    }

    public function select_data_organisasi_by_korem($id_korem)
    {
        $this->db->select('do.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('data_organisasi do');
        $this->db->join('kodim kd', 'do.id_kodim = kd.id_kodim', 'left');
        $this->db->where('kd.id_korem', $id_korem);
        return $this->db->get()->result();
    }

    public function select_organisasi_penggiat_hobi_by_korem($id_korem)
    {
        $this->db->select('oph.*, kd.nama_kodim, kd.kode_kodim');
        $this->db->from('organisasi_penggiat_hobi oph');
        $this->db->join('kodim kd', 'oph.id_kodim = kd.id_kodim', 'left');
        $this->db->where('kd.id_korem', $id_korem);
        return $this->db->get()->result();
    }
}

/* End of file mKelolaData.php */
