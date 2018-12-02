<?php
class Beranda_mall extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Data_mall_model','mall');
    }

    function index(){
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/index');
        $this->load->view('resources/beranda_mall_footer');
    }

    public function gerbang_mall(){
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/gerbang');
        $this->load->view('resources/beranda_mall_footer');
    }

    public function kendaraan_pernah_singgah(){
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/kendaraan_pernah_singgah');
        $this->load->view('resources/beranda_mall_footer');
    }

    public function profil(){
        $this->load->view('resources/beranda_mall_top_nav_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/profil');
        $this->load->view('resources/beranda_mall_footer');
    }

    private function data_detail_mall(){
        $id_user = $_SESSION['id_user'];
        $data['mall'] = $this->mall->get_data_mall_by_id_user($id_user)->row();
        return $data;
    }
}
