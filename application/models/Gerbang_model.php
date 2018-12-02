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
            `gerbang_parkir`.id AS id_gerbang,
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

    public function get_all_gerbang_by_mall($id_mall){
        $sql = "
        SELECT
            `gerbang_parkir`.`id`,
            `nama`,
            `peruntukan`,
            `user`.`id` AS id_user,
            `username`
        FROM
            `monitoring_parkiran_mall`.`gerbang_parkir`
        JOIN `user` ON (`user`.`id` = `gerbang_parkir`.`id_user`)
        WHERE `gerbang_parkir`.`id_mall` = ".$id_mall."
        ";
        return $this->db->query($sql);
    }

    public function get_detail_gerbang($id){
        $sql = "
        SELECT
            `gerbang_parkir`.`id`,
            `nama`,
            `peruntukan`,
            `user`.`id` AS id_user,
            `username`
        FROM
            `monitoring_parkiran_mall`.`gerbang_parkir`
        JOIN `user` ON (`user`.`id` = `gerbang_parkir`.`id_user`)
        WHERE `gerbang_parkir`.`id` = ".$id."
        ";
        return $this->db->query($sql);
    }

    public function update_gerbang($data,$id){
        $sql = "
        UPDATE
            `monitoring_parkiran_mall`.`gerbang_parkir`
        SET
            `nama` = '".$data['nama']."',
            `peruntukan` = '".$data['peruntukan']."'
        WHERE `id` = '".$id."';
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function hapus_gerbang($id){
        $sql = "
        DELETE
            FROM
                `monitoring_parkiran_mall`.`gerbang_parkir`
            WHERE `id` = '".$id."';
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
