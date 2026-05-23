<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAuth extends CI_Model
{
    public function Auth($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('level_user l', 'u.level_user = l.id_level');
        $this->db->where(array(
            'u.username' => $username,
            'u.password' => $password
        ));
        return $this->db->get()->row();
    }
}

/* End of file mAuth.php */
