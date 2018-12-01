<?php
class Data_mall_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function create($data){
        $sql = "
        INSERT INTO `mall` 
        (
            `nama`,
            `no_telp`,
            `fax`,
            `tahun_berdiri`,
            `id_lokasi`,
            `id_user`
        )
        VALUES
        (
            '".$data['nama']."',
            '".$data['no_telp']."',
            '".$data['fax']."',
            '".$data['tahun_berdiri']."',
            '".$data['id_lokasi']."',
            '".$data['id_user']."'
        );
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
