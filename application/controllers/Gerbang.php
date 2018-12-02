<?php 
class Gerbang extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('gerbang_model','gerbang');
        $this->load->model('user_model','user');
        $this->is_user_login();
    }
    
    public function tambah_gerbang(){
        $id_mall        = $_POST['id_mall'];
        $nama           = $_POST['nama'];
        $peruntukan     = $_POST['peruntukan'];
        $username       = $_POST['username'];

        $data_user = array(
            'username'  => $username,
            'password'  => md5($username),
            'status'    => 'G',
            'join_date' => date("Y-m-d")
        );

        $id_user = $this->user->create_and_get_id($data_user);

        $data = array(
            'nama' => $nama,
            'peruntukan' => $peruntukan,
            'id_mall' => $id_mall,
            'id_user' => $id_user,
        );

        $this->gerbang->create($data);
        redirect('beranda_mall/gerbang_mall');
    }
    
    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
?>