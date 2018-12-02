<?php
class Biodata_customer_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function create($data){
        $sql = "INSERT INTO `biodata_customer` 
        (
            `no_ktp`,
            `nama`,
            `tanggal_lahir`,
            `jenis_kelamin`,
            `alamat`,
            `nomor_telepon`,
            `id_user`,
            `id_lokasi`
        )
          VALUES
        (
            '".$data['no_ktp']."', 
            '".$data['nama']."', 
            '".$data['tanggal_lahir']."', 
            '".$data['jenis_kelamin']."', 
            '".$data['alamat']."',
            '".$data['nomor_telepon']."',
            '".$data['id_user']."',
            '".$data['id_lokasi']."'
        )";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
