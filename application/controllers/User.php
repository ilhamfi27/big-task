<?php 

/**
 * 
 */
class User extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
	}
	public function profile($value=''){
		$this->load->view('user/profile');

	}
}
?>