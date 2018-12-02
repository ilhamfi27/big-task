<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->model('biodata_customer_model','biodata_customer');
		$this->load->model('lokasi_model','lokasi');
		$this->load->model('data_mall_model','mall');
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
		$data['provinsi'] = $this->lokasi->all_provinsi()->result();
        $this->load->view('registrasi/regis_data_customer',$data);
	}
	
	public function regis_data_mall(){
		$data['provinsi'] = $this->lokasi->all_provinsi()->result();
        $this->load->view('registrasi/regis_data_mall', $data);
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

	public function tambah_data_customer(){
		$no_ktp 		= $_POST['no_ktp'];
		$nama 			= $_POST['nama'];
		$tanggal_lahir 	= $_POST['tanggal_lahir'];
		$jenis_kelamin 	= $_POST['jenis_kelamin'];
		$alamat 		= $_POST['alamat'];
		$kode_pos		= $_POST['kode_pos'];
		$nomor_telepon 	= $_POST['nomor_telepon'];
		$username 		= $_POST['username'];
		$status 		= $_POST['status'];
		$id_kelurahan	= $_POST['id_kelurahan'];

		$data_lokasi = array(
			'id_kelurahan' => $id_kelurahan,
			'alamat' => $alamat,
			'kode_pos' => $kode_pos
		);

		$success = $this->lokasi->create($data_lokasi);

		$where_lokasi = array(
			'id_kelurahan' => $id_kelurahan,
			'alamat' => $alamat,
			'kode_pos' => $kode_pos
		);

		$id_lokasi = $this->lokasi->get_lokasi($where_lokasi)
					->row()
					->id;

		$where_user = array(
			'username' => $username, 
			'status' => $status
		);

		$id_user = $this->user->get_user_id($where_user)
					->row()
					->id;

		$data_biodata = array(
			'no_ktp' => $no_ktp,
			'nama' => $nama,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
			'nomor_telepon' => $nomor_telepon,
			'id_user' => $id_user,
			'id_lokasi' => $id_lokasi
		);
		
		$success = $this->biodata_customer->create($data_biodata);
		if ($success > 0) {
			$this->session->unset_userdata(array('session_username', 'session_status'));
			redirect('auth/index');	
		} else {
			$this->load->view('registrasi/regis_data_customer');
		}
	}

	public function tambah_data_mall(){
		$nama			= $_POST['nama'];
		$id_kelurahan	= $_POST['id_kelurahan'];
		$alamat			= $_POST['alamat'];
		$kode_pos		= $_POST['kode_pos'];
		$tahun_berdiri	= $_POST['tahun_berdiri'];
		$no_telp		= $_POST['no_telp'];
		$fax			= $_POST['fax'];
		$username		= $_POST['username'];
		$status			= $_POST['status'];

		$data_lokasi = array(
			'id_kelurahan' => $id_kelurahan,
			'alamat' => $alamat,
			'kode_pos' => $kode_pos
		);

		$success = $this->lokasi->create($data_lokasi);

		$where_lokasi = array(
			'id_kelurahan' => $id_kelurahan,
			'alamat' => $alamat,
			'kode_pos' => $kode_pos
		);

		$id_lokasi = $this->lokasi->get_lokasi($where_lokasi)
					->row()
					->id;

		$where_user = array(
			'username' => $username, 
			'status' => $status
		);

		$id_user = $this->user->get_user_id($where_user)
					->row()
					->id;

		$data_mall = array(
			'nama' => $nama,
			'tahun_berdiri' => $tahun_berdiri,
			'no_telp' => $no_telp,
			'fax' => $fax,
			'id_lokasi' => $id_lokasi,
			'id_user' => $id_user
		);
		$success = $this->mall->create($data_mall);
		if ($success > 0) {
			redirect('auth/index');
		}
	}
}
