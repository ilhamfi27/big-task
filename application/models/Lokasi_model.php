<?php
class Lokasi_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function create($data){
        $sql = "
        INSERT INTO `lokasi` (
            `id_kelurahan`,
            `alamat`,
            `kode_pos`
        )
        VALUES
        (
            '".$data['id_kelurahan']."',
            '".$data['alamat']."',
            '".$data['kode_pos']."'
        )          
        ";
        $affected_row = $this->db->query($sql);
        return $affected_row;
    }

    public function get_lokasi($data){
        $sql = "
        SELECT
            `id`,
            `id_kelurahan`,
            `alamat`,
            `kode_pos`
        FROM
            `lokasi`
        WHERE
            `id_kelurahan` = '".$data['id_kelurahan']."' AND
            `alamat` = '".$data['alamat']."' AND
            `kode_pos` = '".$data['kode_pos']."'
        ";
        $affected_row = $this->db->query($sql);
        return $affected_row;
    }

    public function all_provinsi() {
        $sql = "
        SELECT
            `id`,
            `name`
        FROM
            `provinsi`
        ";
        return $this->db->query($sql);
    }

    public function get_kab_kota($id_prov){
        $sql = "
        SELECT
            `id`,
            `name`
        FROM
            `kabupaten_kota`
        WHERE `province_id` = '$id_prov'
        ";
        return $this->db->query($sql);
    }

    public function get_kecamatan($id_kab_kota){
        $sql = "
        SELECT
            `id`,
            `name`
        FROM
            `kecamatan`
        WHERE `regency_id` = '$id_kab_kota'
        ";
        return $this->db->query($sql);
    }

    public function get_kelurahan($id_kab_kota){
        $sql = "
        SELECT
            `id`,
            `name`
        FROM
            `desa_kelurahan`
        WHERE `district_id` = '$id_kab_kota'
        ";
        return $this->db->query($sql);
    }
}
