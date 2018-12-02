<?php
class Lokasi extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('lokasi_model','lokasi');
    }

    public function ajax_get_kab_kota(){
        $id_prov = $_POST['id_prov'];
        $data = $this->lokasi->get_kab_kota($id_prov)->result();
        echo json_encode($data);
    }

    public function ajax_get_kecamatan(){
        $id_kab_kota = $_POST['id_kab_kota'];
        $data = $this->lokasi->get_kecamatan($id_kab_kota)->result();
        echo json_encode($data);
    }

    public function ajax_get_kelurahan(){
        $id_kecamatan = $_POST['id_kecamatan'];
        $data = $this->lokasi->get_kelurahan($id_kecamatan)->result();
        echo json_encode($data);
    }
}
