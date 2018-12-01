<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->model('biodata_customer_model','biodata_customer');
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
    }

    public function index(){
        $this->load->view('registrasi/index');
    }
    
    public function registrasi_mall(){
        $this->load->view('registrasi/regis_mall');
    }
    
    public function registrasi_customer(){
        $this->load->view('registrasi/regis_customer');
	}
	
	public function regis_data_customer(){
        $this->load->view('registrasi/regis_data_customer');
	}
	
	public function regis_data_mall(){
        $this->load->view('registrasi/regis_data_mall');
	}

	public function tambah_user(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		$status = $_POST['status'];
		
		$validasi = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[3]|max_length[25]|is_unique[user.username]',
				'errors' => array(
					'required' => "Kolom ini harus diisi",
					'min_length' => "Panjang Minimal Username Harus 3 Karakter",
					'max_length' => "Panjang Maksimal Username Harus 25 Karakter",
					'is_unique' => "Username Sudah Terpakai"
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
			if ($status == "C") {
				$this->load->view('registrasi/regis_customer');
			} elseif ($status == "M") {
				$this->load->view('registrasi/regis_mall');
			}
		} else {
			$data = array(
				'username' => $username,
                'password' => md5($password),
                'status' => $status
			);
            $success = $this->user->create($data);
            if ($success>0) {
                $session_data = array(
                    'session_username' => $username,
                    'session_status' => $status
                );
                $this->session->set_userdata($session_data);
                if ($status == "C") {
                    redirect('registrasi/regis_data_customer');
                } elseif ($status == "M") {
                    redirect('registrasi/regis_data_mall');
                }
            } else {
				if ($status == "C") {
					$this->load->view('registrasi/regis_customer');
				} elseif ($status == "M") {
					$this->load->view('registrasi/regis_mall');
				}
            }
		}
	}
}
