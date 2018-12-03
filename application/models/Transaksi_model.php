<?php
class Transaksi_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function create($data){
        $sql = "
        INSERT INTO `monitoring_parkiran_mall`.`transaksi` (
            `id_gerbang`
        )
        VALUES
        (
            '".$data['id_gerbang']."'
        );
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_parkir_kosong_by_id_mall($id_mall){
        $sql = "
        SELECT
            `kapasitas` - (
                SELECT
                    COUNT(*) AS jumlah_aksi
                FROM
                    `monitoring_parkiran_mall`.`transaksi`
                JOIN `gerbang_parkir` ON (`gerbang_parkir`.`id` = `transaksi`.`id_gerbang`)
                WHERE id_mall = ".$id_mall." AND `peruntukan` = 'M'
                GROUP BY id_mall
            ) + (
                SELECT
                    COUNT(*) AS jumlah_aksi
                FROM
                    `monitoring_parkiran_mall`.`transaksi`
                JOIN `gerbang_parkir` ON (`gerbang_parkir`.`id` = `transaksi`.`id_gerbang`)
                WHERE id_mall = ".$id_mall." AND `peruntukan` = 'K'
                GROUP BY id_mall
            ) AS parkir_tersedia
        FROM
            `mall`
        WHERE id = ".$id_mall."
        ";
        return $this->db->query($sql);
    }

    public function get_jumlah_pengunjung_group_by_date($id_mall,$gerbang){
        $sql = "
        SELECT
            `mall`.`id`,
            `mall`.`nama`,
            `mall`.`no_telp`,
            `mall`.`fax`,
            `mall`.`tahun_berdiri`,
            `mall`.`id_lokasi`,
            `mall`.`id_user`,
            `mall`.`kapasitas`,
            `transaksi`.`id_gerbang`,
            DATE_FORMAT(`transaksi`.`tanggal_waktu`, '%d %M %Y') AS tanggal_transaksi,
            `gerbang_parkir`.`nama` AS nama_gerbang,
            `gerbang_parkir`.`peruntukan`,
            COUNT(*) AS jumlah_aksi
        FROM
            `monitoring_parkiran_mall`.`transaksi`
        JOIN `gerbang_parkir` ON (`gerbang_parkir`.`id` = `transaksi`.`id_gerbang`)
        JOIN `mall` ON (`mall`.`id` = `gerbang_parkir`.`id_mall`)
        WHERE `mall`.`id` = ".$id_mall." AND `gerbang_parkir`.`peruntukan` = '".$gerbang."'
        GROUP BY DATE(`transaksi`.`tanggal_waktu`)
        ";
        return $this->db->query($sql);
    }
}
