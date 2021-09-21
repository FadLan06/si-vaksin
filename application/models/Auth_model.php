<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_user($email)
    {
        $this->db->where("email = '$email' or username = '$email'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
