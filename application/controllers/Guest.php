<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->lang->load('home', $this->language);
        $this->lang->load('room', $this->language);
        $this->load->model('room_model');
        $this->load->model('book_model');
        if (!count($this->user_data)) {
        	redirect(base_url(),'refresh');
        }
        if ($this->user_data['type'] != USER_TYPE) {
        	redirect(base_url(),'refresh');
        }
	}
	
	public function index()
	{
		$this->profile();
	}

	public function profile()
	{
		$data = array( 
			'title' 	=> 'Profile',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'profile',
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('guest/header', $data);
		$this->load->view('guest/sidebar');
		$this->load->view('guest/profile');
		$this->load->view('guest/footer');
	}

	public function book()
	{
		$data = array( 
			'title' 	=> 'All booking request',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'book',
			'books' 	=> $this->book_model->get_precifix_book(['uid' => $this->user_data['uid']]),
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('guest/header', $data);
		$this->load->view('guest/sidebar');
		$this->load->view('guest/book');
		$this->load->view('guest/footer');
	}

	public function update_user_data(){
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['field'])) {
			$this->user->update_user_data([$post['field'] => $post['value']], ['uid' => $this->user_data['uid']]);
		}
	}

}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */