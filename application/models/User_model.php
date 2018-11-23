<?php
class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_user($data_user){
        return $this->db->insert('user', $data_user);
    }

    public function cek_login($data_user){
        return $this->db->get_where('user', $data_user);
    }
}
