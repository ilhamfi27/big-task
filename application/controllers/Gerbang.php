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

    public function update(){
        $id_gerbang = $_POST['id_gerbang'];
        $id_user    = $_POST['id_user'];
        $nama       = $_POST['nama'];
        $peruntukan = $_POST['peruntukan'];
        $username   = $_POST['username'];

        $data_gerbang = array(
            'nama' => $nama,
            'peruntukan' => $peruntukan
        );

        $this->gerbang->update_gerbang($data_gerbang,$id_gerbang);

        $data_user = array(
            'username' => $username,
            'password' => md5($username)
        );

        $this->user->update_user($data_user,$id_user);
        redirect('beranda_mall/edit_gerbang/'.$id_gerbang);
    }

    public function delete($id){
        $id_user = $this->gerbang->get_detail_gerbang($id)->row()->id_user;
        $this->gerbang->hapus_gerbang($id);
        $this->user->hapus_user($id_user);
        redirect('beranda_mall/gerbang_mall');
    }
    
    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
?>