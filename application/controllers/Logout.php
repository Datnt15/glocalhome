<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index(){
		$this->session->unset_userdata("is_logged_in");
		$this->session->unset_userdata("uid");
		$this->session->unset_userdata("user_type");
		$this->session->sess_destroy();
		delete_cookie('remember_me');
		delete_cookie('uid');
		delete_cookie('password');
		$this->session->keep_flashdata(array('type', 'msg', 'title'));
		redirect(base_url());
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */