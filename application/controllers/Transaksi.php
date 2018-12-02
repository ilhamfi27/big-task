<?php 
class Transaksi extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('transaksi_model','transaksi');
		$this->is_user_login();
    }
    
    public function kendaraan_lewat(){
        $id_mall = $_POST['id_mall'];
        $id_gerbang = $_POST['id_gerbang'];

        $data = array(
            'id_mall' => $id_mall,
            'id_gerbang' => $id_gerbang
        );

        $success = $this->transaksi->create($data);
        redirect('beranda_mall/gerbang_kendaraan');
    }
    
    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
?>