<?php
class Gerbang_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function create($data){
        $sql = "
        INSERT INTO `monitoring_parkiran_mall`.`gerbang_parkir` (
            `nama`,
            `peruntukan`,
            `id_user`,
            `id_mall`
        )
        VALUES
        (
            '".$data['nama']."',
            '".$data['peruntukan']."',
            '".$data['id_user']."',
            '".$data['id_mall']."'
        );
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_data_gerbang_by_id_user($id){
        $sql = "
        SELECT
            `mall`.`id`,
            `mall`.`nama`,
            `no_telp`,
            `fax`,
            `tahun_berdiri`,
            `mall`.`id_lokasi`,
            `mall`.`id_user`,
            `lokasi`.`alamat`,
            `lokasi`.`kode_pos`,
            `gerbang_parkir`.nama AS nama_gerbang,
            CONCAT('KELURAHAN ',`desa_kelurahan`.`name`,', KECAMATAN ',`kecamatan`.`name`,', ',`kabupaten_kota`.`name`,', PROVINSI ',`provinsi`.`name`) AS detail_lokasi
        FROM
            `mall`
        JOIN `gerbang_parkir` ON (`gerbang_parkir`.`id_mall` = `mall`.`id`)
        JOIN `user` ON (`user`.`id` = `gerbang_parkir`.`id_user`)
        JOIN `lokasi` ON (`lokasi`.`id` = `mall`.`id_lokasi`)
        JOIN `desa_kelurahan` ON (`desa_kelurahan`.`id` = `lokasi`.`id_kelurahan`)
        JOIN `kecamatan` ON (`kecamatan`.`id` = `desa_kelurahan`.`id_kecamatan`)
        JOIN `kabupaten_kota` ON (`kabupaten_kota`.`id` = `kecamatan`.`id_kabupaten_kota`)
        JOIN `provinsi` ON (`provinsi`.`id` = `kabupaten_kota`.`id_provinsi`)
        WHERE `user`.id = '".$id."'
        ";
        return $this->db->query($sql);
    }
}
