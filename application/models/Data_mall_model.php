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
            `kapasitas`,
            `id_lokasi`,
            `id_user`
        )
        VALUES
        (
            '".$data['nama']."',
            '".$data['no_telp']."',
            '".$data['fax']."',
            '".$data['tahun_berdiri']."',
            '".$data['kapasitas']."',
            '".$data['id_lokasi']."',
            '".$data['id_user']."'
        );
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_data_mall_by_id_user($id){
        $sql = "
        SELECT
            `mall`.`id`,
            `nama`,
            `no_telp`,
            `fax`,
            `tahun_berdiri`,
            `mall`.`id_lokasi`,
            `id_user`,
            `lokasi`.`alamat`,
            `lokasi`.`kode_pos`,
            CONCAT('KELURAHAN ',`desa_kelurahan`.`name`,', KECAMATAN ',`kecamatan`.`name`,', ',`kabupaten_kota`.`name`,', PROVINSI ',`provinsi`.`name`) AS detail_lokasi
        FROM
            `mall`
        JOIN `lokasi` ON (`lokasi`.`id` = `mall`.`id_lokasi`)
        JOIN `desa_kelurahan` ON (`desa_kelurahan`.`id` = `lokasi`.`id_kelurahan`)
        JOIN `kecamatan` ON (`kecamatan`.`id` = `desa_kelurahan`.`id_kecamatan`)
        JOIN `kabupaten_kota` ON (`kabupaten_kota`.`id` = `kecamatan`.`id_kabupaten_kota`)
        JOIN `provinsi` ON (`provinsi`.`id` = `kabupaten_kota`.`id_provinsi`)
        WHERE `mall`.`id_user` = ".$id."
        ";
        return $this->db->query($sql);
    }

    public function get_data_mall_by_id($id){
        $sql = "
        SELECT
            `mall`.`id`,
            `nama`,
            `no_telp`,
            `fax`,
            `tahun_berdiri`,
            `mall`.`id_lokasi`,
            `id_user`,
            `lokasi`.`alamat`,
            `lokasi`.`kode_pos`,
            CONCAT('KELURAHAN ',`desa_kelurahan`.`name`,', KECAMATAN ',`kecamatan`.`name`,', ',`kabupaten_kota`.`name`,', PROVINSI ',`provinsi`.`name`) AS detail_lokasi
        FROM
            `mall`
        JOIN `lokasi` ON (`lokasi`.`id` = `mall`.`id_lokasi`)
        JOIN `desa_kelurahan` ON (`desa_kelurahan`.`id` = `lokasi`.`id_kelurahan`)
        JOIN `kecamatan` ON (`kecamatan`.`id` = `desa_kelurahan`.`id_kecamatan`)
        JOIN `kabupaten_kota` ON (`kabupaten_kota`.`id` = `kecamatan`.`id_kabupaten_kota`)
        JOIN `provinsi` ON (`provinsi`.`id` = `kabupaten_kota`.`id_provinsi`)
        WHERE `mall`.`id` = ".$id."
        ";
        return $this->db->query($sql);
    }

    public function mall_terdekat($id_user){
        $sql="SELECT
                `mall`.`id`,
                `nama`,
                `no_telp`,
                `fax`,
                `tahun_berdiri`
            FROM
                mall
            JOIN lokasi ON (mall.id_lokasi = lokasi.id)
            JOIN desa_kelurahan ON (desa_kelurahan.id = lokasi.id_kelurahan)
            JOIN kecamatan ON (desa_kelurahan.id_kecamatan = kecamatan.id)
            JOIN kabupaten_kota ON (kecamatan.id_kabupaten_kota = kabupaten_kota.id)
            JOIN provinsi ON (kabupaten_kota.id_provinsi = provinsi.id)
            WHERE
            kabupaten_kota.id = (
                SELECT
                    kabupaten_kota.id
                FROM
                    biodata_customer
                JOIN lokasi ON (biodata_customer.id_lokasi = lokasi.id)
                JOIN desa_kelurahan ON (desa_kelurahan.id = lokasi.id_kelurahan)
                JOIN kecamatan ON (desa_kelurahan.id_kecamatan = kecamatan.id)
                JOIN kabupaten_kota ON (kecamatan.id_kabupaten_kota = kabupaten_kota.id)
                JOIN provinsi ON (kabupaten_kota.id_provinsi = provinsi.id)
                WHERE id_user = 19
            )
            OR
            kecamatan.id = (
                SELECT
                    kecamatan.id
                FROM
                    biodata_customer
                JOIN lokasi ON (biodata_customer.id_lokasi = lokasi.id)
                JOIN desa_kelurahan ON (desa_kelurahan.id = lokasi.id_kelurahan)
                JOIN kecamatan ON (desa_kelurahan.id_kecamatan = kecamatan.id)
                JOIN kabupaten_kota ON (kecamatan.id_kabupaten_kota = kabupaten_kota.id)
                JOIN provinsi ON (kabupaten_kota.id_provinsi = provinsi.id)
                WHERE id_user = 19
            )";
            return $this->db->query($sql); 
    }
}
