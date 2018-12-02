<?php 
class Transaksi extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('gerbang_model','gerbang');
		$this->load->model('transaksi_model','transaksi');
		$this->is_user_login();
    }
    
    public function kendaraan_lewat(){
        $id_user = $_POST['id_user'];

        $id_gerbang = $this->gerbang->get_data_gerbang_by_id_user($id_user)->row()->id_gerbang;

        $data = array(
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