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
            '".$data['nomor_telepon']."',
            '".$data['id_user']."',
            '".$data['id_lokasi']."'
        )";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_user_data($id){
        $sql ="SELECT  
                    no_ktp,
                    biodata_customer.nama AS nama,
                    biodata_customer.tanggal_lahir,
                    biodata_customer.jenis_kelamin,
                    biodata_customer.nomor_telepon,
                    lokasi.alamat,
                    lokasi.kode_pos,
                    biodata_customer.id_user,
                    CONCAT('KELURAHAN ',`desa_kelurahan`.`name`,', KECAMATAN ',`kecamatan`.`name`,', ',`kabupaten_kota`.`name`,', PROVINSI ',`provinsi`.`name`) AS detail_lokasi
                FROM biodata_customer
                JOIN lokasi
                on(biodata_customer.id_lokasi =lokasi.id)
                JOIN desa_kelurahan
                on(desa_kelurahan.id= lokasi.id_kelurahan)
                JOIN kecamatan
                on(desa_kelurahan.id_kecamatan =kecamatan.id)
                JOIN kabupaten_kota
                on(kecamatan.id_kabupaten_kota =kabupaten_kota.id)
                JOIN provinsi 
                on(kabupaten_kota.id_provinsi =provinsi.id)
                WHERE `id_user` = ".$id."
                ";

        return $this->db->query($sql);
    }
    public function edit_profile($id){
        // $sql

    }
}
