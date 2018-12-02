<?php
class Transaksi_model extends CI_Model{

    public function __construct() {
        parent::__construct();
    }

    public function create($data){
        $sql = "
        INSERT INTO `monitoring_parkiran_mall`.`transaksi` (
            `id_mall`,
            `id_gerbang`
        )
        VALUES
        (
            '".$data['id_mall']."',
            '".$data['id_gerbang']."'
        );
        ";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
}
