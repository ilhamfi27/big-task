<?php 
class User extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
		$this->is_user_login();
	}

	public function profile($value=''){
		$this->load->view('user/profile');

	}
    
    private function is_user_login(){
        if (empty($_SESSION['username'])) {
            redirect('auth/index');
        }
    }
}
?>