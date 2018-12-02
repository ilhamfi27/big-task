<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->library(array('form_validation'));
	}

	public function index(){
		$this->load->view('user_auth/login');
	}

	public function user_login(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$user_data = array(
			'username' => $username,
			'password' => md5($password)
		);
		$result = $this->user->cek_login($user_data);
		$user_exist = $result->num_rows();
		if($user_exist > 0) {
			$data = $result->row();
			$data_session = array(
				'id_user' 	=> $data->id,
				'username' 	=> $data->username,
				'status'	=> $data->status
			);
			$this->session->set_userdata($data_session);
			if ($data->status == "C") {
				redirect('beranda/index');
			} else if ($data->status == "M") {
				redirect('beranda_mall/index');
			} else if ($data->status == "G") {
				redirect('beranda_mall/gerbang_kendaraan');
			}
		} else {
			redirect('auth/index');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}
}
