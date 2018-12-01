<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->helper(array('url'));
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
				'id' => $data->id,
				'username' => $data->username
			);
			$this->session->set_userdata($data_session);
			redirect('beranda/index');
		} else {
			redirect('auth/index');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth/index');
	}
}
