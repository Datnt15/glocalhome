<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_base {

	public function __construct(){
		parent::__construct();
		$this->lang->load('home', $this->language);
		$this->lang->load('room', $this->language);
		$this->load->model('room_model');
	}

	public function index(){
		$data = [
			'title' 		=> lang('home-sub-title'),
			'accessToken' 	=> $this->ci_nonce,
			'current_lang' 	=> $this->language,
			'user' 			=> $this->user_data
		];
		$this->load->view('front-end/home', $data, FALSE);
	}

	private function calc_exchange($rooms){
		foreach ($rooms as &$room) {
			$room['room_daily_tax'] = $this->exchange * $room['room_daily_tax'];
			$room['room_weekly_tax'] = $this->exchange * $room['room_weekly_tax'];
			$room['room_monthly_tax'] = $this->exchange * $room['room_monthly_tax'];
		}
		return $rooms;
	}

	public function get_nav_desktop(){
		echo $this->load->view('front-end/desktop-nav', ['user' => $this->user_data, 'language' => $this->language], TRUE);
	}

	public function get_nav_mobile(){
		echo $this->load->view('front-end/mobile-nav', ['user' => $this->user_data, 'language' => $this->language], TRUE);
	}

	public function get_base64_img($floor){
		$path = base_url('assets/img/glocalhome/floor-plan-' . $floor . '.jpg');
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$imagedata = file_get_contents($path);
		echo 'data:image/' . $type . ';base64,' . base64_encode($imagedata);
	}

	public function get_room_template($room_no){
		$this->session->set_userdata('room_no', $room_no);
		$data = [
			'room' => $this->language == 'vietnam' ? self::calc_exchange($this->room_model->get_precifix_room(['room_no' => $room_no]))[0] : $this->room_model->get_precifix_room(['room_no' => $room_no])[0],
			'currency' => $this->language == 'vietnam' ? 'Đồng' : 'USD',
			'login_form' => $this->load->view('front-end/login-form', ['accessToken' => $this->ci_nonce], TRUE),
			'register_form' => $this->load->view('front-end/register-form', ['accessToken' => $this->ci_nonce], TRUE)
		];
		$data['gallery'] = $this->room_model->get_room_gallery($data['room']['id']);
		if (count($this->user_data)) {
			echo $this->load->view('front-end/modal-room-booking-logged-in', $data, TRUE);
		}else{
			$data['accessToken'] = $this->ci_nonce;
			echo $this->load->view('front-end/modal-room-booking', $data, TRUE);
		}
	}

	public function get_login_template(){
		$data = [
			'login_form' => $this->load->view('front-end/login-form', ['accessToken' => $this->ci_nonce], TRUE),
			'register_form' => $this->load->view('front-end/register-form', ['accessToken' => $this->ci_nonce], TRUE)
		];

		echo $this->load->view('front-end/modal-login', $data, TRUE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */