<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function total()
    {
        $data['kodam']                  = $this->db->query("SELECT COUNT(id_kodam) as jml FROM `kodam`;")->row();
        $data['korem']                  = $this->db->query("SELECT COUNT(id_korem) as jml FROM `korem`;")->row();
        $data['kodim']                  = $this->db->query("SELECT COUNT(id_kodim) as jml FROM `kodim`;")->row();
        $data['keluarga_besar_tni']     = $this->db->query("SELECT COUNT(id_kbt) as jml FROM `data_keluarga_besar_tni`;")->row();
        $data['para_tokoh']             = $this->db->query("SELECT COUNT(id_tokoh) as jml FROM `data_para_tokoh`;")->row();
        $data['organisasi']             = $this->db->query("SELECT COUNT(id_organisasi) as jml FROM `data_organisasi`;")->row();
        $data['penggiat_hobi']          = $this->db->query("SELECT COUNT(id_hobi) as jml FROM `organisasi_penggiat_hobi`;")->row();
        return $data;
    }
}

/* End of file mDashboard.php */
