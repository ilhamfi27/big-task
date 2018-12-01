<?php
class User_model extends CI_Model{

    private $date_now;

    public function __construct() {
        parent::__construct();
        $this->date_now = date("Y-m-d");
    }

    public function create($data){
        $sql = "
        INSERT INTO `user` 
        (
            `username`,
            `password`,
            `status`,
            `join_date`
        )
          VALUES
        (
            '".$data['username']."', 
            '".$data['password']."',
            '".$data['status']."',
            '".$this->date_now."'
        )";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function cek_login($data){
        $sql = "
        SELECT
            `id`,
            `username`,
            `password`,
            `status`,
            `join_date`
        FROM
            `user`
        WHERE 
            `username` = '".$data['username']."' AND
            `password` = '".$data['password']."'
        ";
        return $this->db->query($sql);
    }

    public function get_user_id($data){
        $sql = "
        SELECT
            `id`
        FROM
            `user`
        WHERE 
            `username` = '".$data['username']."' AND
            `status` = '".$data['status']."'
        ";
        return $this->db->query($sql);
    }
}
