<?php
class Beranda extends CI_Controller{

	function __construct()	{
		parent::__construct();
		$this->load->model('biodata_customer_model','customer');
		$this->load->model('data_mall_model','mall');
		$this->is_user_login();
	}

    function index(){
    	$id_user=$_SESSION['id_user'];
    	$customer['customer'] = $this->customer->get_user_data($id_user)->row();
    	$data['mall']=$this->mall->mall_terdekat($id_user)->result();
    	$this->load->view('beranda/header',$customer);
        $this->load->view('beranda/index',$data);
    	$this->load->view('beranda/footer');
    }

    function detail_mall($id){
    	$id_user=$_SESSION['id_user'];
    	$data['customer'] = $this->customer->get_user_data($id_user)->row();
    	$data['mall'] = $this->mall->get_data_mall_by_id($id)->row();
    	$this->load->view('beranda/header',$data);
        $this->load->view('beranda/detail_mall',$data);
    	$this->load->view('beranda/footer');
	}
	
    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
