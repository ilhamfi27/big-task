<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
	}

	public function index(){
		$this->load->view('user_auth/login');
	}

	public function registrasi(){
		$this->load->view('user_auth/registrasi');
	}

	public function tambah_user(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		
		$validasi = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[3]|max_length[25]',
				'errors' => array(
					'required' => "Kolom ini harus diisi",
					'min_length' => "Panjang Minimal Username Harus 3 Karakter",
					'max_length' => "Panjang Maksimal Username Harus 25 Karakter"
				)
			),
			array(
				'field' => 'password',
				'label'	=> 'Password',
				'rules' => 'required|min_length[6]',
				'errors' => array(
					'required' => "Kolom Ini Harus Diisi",
					'min_length' => "Panjang Password Minimal 6 Karakter"
				)
			),
			array(
				'field' => 'password_confirm',
				'label'	=> 'Konfirmasi Password',
				'rules' => 'required|min_length[6]|matches[password]',
				'errors' => array(
					'required' => "Kolom Ini Harus Diisi",
					'min_length' => "Panjang Konfirmasi Password Minimal 6 Karakter",
					'matches' => "Konfirmasi Password Tidak Sama Dengan Password"
				)
			)
		);

		$this->form_validation->set_rules($validasi);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user_auth/registrasi');
		} else {
			$data = array(
				'username' => $username,
				'password' => md5($password)
			);
			$this->user_model->create_user($data);
			redirect('auth/login');
		}

	}

	public function user_login(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$user_data = array(
			'username' => $username,
			'password' => md5($password)
		);
		$result = $this->user_model->cek_login($user_data);
		$user_exist = $result->num_rows();
		if($user_exist > 0) {
			echo "ada";
		} else {
			echo md5($password);
		}
	}
}
