<?php
class Beranda_mall extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Data_mall_model','mall');
        $this->load->model('gerbang_model','gerbang');
        $this->load->model('transaksi_model','transaksi');
        $this->is_user_login();
    }

    function index(){
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/index');
        $this->load->view('resources/beranda_mall_footer');
    }

    public function gerbang_mall(){
        $id_user            = $_SESSION['id_user'];
        $id_mall            = $this->mall->get_data_mall_by_id_user($id_user)->row()->id;
        $data['gerbang']    = $this->gerbang->get_all_gerbang_by_mall($id_mall)->result();
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/gerbang',$data);
        $this->load->view('resources/beranda_mall_footer');
    }

    public function edit_gerbang($id){
        $data['gerbang'] = $this->gerbang->get_detail_gerbang($id)->row();
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/edit_gerbang',$data);
        $this->load->view('resources/beranda_mall_footer');
    }

    public function gerbang_kendaraan(){
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/gerbang_kendaraan');
        $this->load->view('resources/beranda_mall_footer');
    }

    public function profil(){
        $id_user = $_SESSION['id_user'];
        $data['mall'] = $this->mall->get_data_mall_by_id_user($id_user)->row();
        $this->load->view('resources/beranda_mall_top_nav_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/profil', $data);
        $this->load->view('resources/beranda_mall_footer');
    }
    
    public function report(){
        $id_user        = $_SESSION['id_user'];
        $id_mall = $this->mall->get_data_mall_by_id_user($id_user)->row()->id;
        $data['report_pengunjung'] = $this->transaksi->get_jumlah_pengunjung_group_by_date($id_mall,"M")->result();
        $this->load->view('resources/beranda_mall_header',$this->data_detail_mall());
        $this->load->view('beranda_mall/report',$data);
        $this->load->view('resources/beranda_mall_footer');
    }

    private function data_detail_mall(){
        $id_user        = $_SESSION['id_user'];
        $status_user    = $_SESSION['status'];
        if ($status_user == "M") {
            $data['mall'] = $this->mall->get_data_mall_by_id_user($id_user)->row();
        } elseif ($status_user == "G") {
            $data['mall'] = $this->gerbang->get_data_gerbang_by_id_user($id_user)->row();
        }
        return $data;
    }

    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
