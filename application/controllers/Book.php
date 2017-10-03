<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends Front_base {

	public function __construct(){
		parent::__construct();
		$this->lang->load('home', $this->language);
        $this->lang->load('room', $this->language);
        $this->load->model('room_model');
        $this->load->model('book_model');
        if (!count($this->user_data)) {
        	redirect(base_url(),'refresh');
        }
	}

	private function create_book_handle($room_no){
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['accessToken']) && $this->ci_nonce != $post['accessToken']) {
			$this->session->set_userdata("ci_nonce", substr(md5(microtime()),0,15));
			// Cài đặt thông báo
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('msg', lang('accessToken-invalid'));
            $this->session->set_flashdata('title', lang('error-title'));
            header("Refresh:0");
		}
		if (isset($post['customer_name'])) {
			$book_data = [
				'book_no' 			=> substr(md5(microtime()),0,7),
				'room_no' 			=> $room_no,
				'customer_name' 	=> $post['customer_name'],
				'customer_email' 	=> $post['customer_email'],
				'customer_phone' 	=> $post['customer_phone'],
				'uid' 				=> $this->user_data['uid'],
				'date_range' 		=> $post['book_date_range'],
				'location' 			=> 1,
				'status' 			=> FILLED_INFO,
				'total_fee' 		=> $this->session->total_fee . ' ' . $this->session->currency
			];
			$array = array(
				'total_fee' => '',
				'currency' => ''
			);
			$this->session->set_userdata( $array );
			if (isset($post['wanna_check_in_late']) || isset($post['wanna_check_in_soon']) || isset($post['register_airport_pickup'])) {
				$other_request = [];
				if (isset($post['wanna_check_in_late'])) {
					$other_request['wanna_check_in_late'] = $post['new_check_in_time'];
				}
				if (isset($post['wanna_check_in_soon'])) {
					$other_request['wanna_check_in_soon'] = $post['new_check_in_time'];
				}
				if (isset($post['register_airport_pickup'])) {
					$other_request['register_airport_pickup'] = $post['flight-info'];
				}
				$book_data['other_request'] = json_encode($other_request);
			}
			$book_id = $this->book_model->add_book_request($book_data);
			// Cài đặt thông báo
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('title', lang('book-filled-info-title'));
            $this->session->set_flashdata('msg', lang('book-filled-info-msg'));
			if ($book_id) {
				redirect(base_url('book/payment/'.$book_data['book_no']),'refresh');
			}
		}
	}

	public function index($room_no){
		// Xử lý yêu cầu đặt phòng
		self::create_book_handle($room_no);

		$room = $this->room_model->get_precifix_room(['room_no' => $room_no]);
		if (!count($room)) {
			$this->load->view('errors/html/error_404', [
				'heading' => '404 Page Not Found', 
				'message' => 'The page you requested was not found.'
			]);
			die();
		}
		$data = [
			'room' 		=> $this->language == 'vietnam' ? self::calc_exchange($room)[0]:$room[0],
			'currency' 	=> $this->language == 'vietnam' ? 'Đồng' : 'USD',
			'language' 	=> $this->language,
			'gallery' 	=> $this->room_model->get_room_gallery($room[0]['id']),
			'accessToken' => $this->ci_nonce,
			'user' 		=> $this->user_data,
			'invalidDates' => $this->book_model->get_booked_dates($room_no),
			'step' 		=> 1
		];
		$data['room_template'] = $this->load->view('book/room-template', $data, TRUE);
		$this->load->view('book/header', $data, FALSE);
		$this->load->view('book/fill-content');
		$this->load->view('book/footer');
	}

	private function calc_exchange($rooms){
		foreach ($rooms as &$room) {
			$room['room_daily_tax'] = $this->exchange * $room['room_daily_tax'];
			$room['room_weekly_tax'] = $this->exchange * $room['room_weekly_tax'];
			$room['room_monthly_tax'] = $this->exchange * $room['room_monthly_tax'];
		}
		return $rooms;
	}

	public function get_total_fee_template(){
		$post = $this->input->post();
		if (!isset($post['accessToken'])) {
			die('missing accessToken');
		}
		if ($this->ci_nonce != $post['accessToken'] ) {
			die('accessToken not match');
		}
		$room = $this->language == 'vietnam' ? self::calc_exchange($this->room_model->get_precifix_room(['room_no' => $post['room_no']])) : $this->room_model->get_precifix_room(['room_no' => $post['room_no']]);
		if (!count($room)) {
			echo json_encode(['type' => 'error', 'msg' => 'You are changing room no']);
			die();
		}
		$room = $room[0];
		$currency = $this->language == 'vietnam' ? 'Đồng' : 'USD';
		$months_fee = $post['months']*$room['room_monthly_tax'];
		$weeks_fee = $post['weeks']*$room['room_weekly_tax'];
		$days_fee = $post['days']*$room['room_daily_tax'];
		$html = "<table class='table table-striped'><tr><td><span class='text-muted'>".lang('book-monthly-price') ."</span></td><td></td></tr><tr><td>".number_format($room['room_monthly_tax'], 0, '.', ' ') ."<sup>".$currency ."</sup> x ".$post['months']." ".lang('book-month') ."</td><td>".$months_fee." <sup>".$currency ."</sup></td></tr><tr><td><span class='text-muted'>".lang('book-weekly-price') ."</span></td><td></td></tr><tr><td>".number_format($room['room_weekly_tax'], 0, '.', ' ') ."<sup>".$currency ."</sup> x ".$post['weeks']." ".lang('book-week') ."</td><td>".$weeks_fee." <sup>".$currency ."</sup></td></tr><tr><td><span class='text-muted'>".lang('book-daily-price') ."</span></td><td></td></tr><tr><td>".number_format($room['room_daily_tax'], 0, '.', ' ') ."<sup>".$currency ."</sup> x ".$post['days']." ".lang('book-day') ."</td><td>".$days_fee." <sup>".$currency ."</sup></td></tr><tr><td><b>".lang('book-total-rent') ."</b></td><td>".($days_fee + $weeks_fee + $months_fee)." <sup>".$currency ."</sup></td></tr></table>";

		// Đặt session data khi tạo yêu cầu thuê phòng
		$this->session->set_userdata('total_fee', $days_fee + $weeks_fee + $months_fee);
		$this->session->set_userdata('currency', $currency);
		echo json_encode(['type' => 'success', 'html_content' => $html, 'total_fee' => $days_fee + $weeks_fee + $months_fee]);
	}

	public function payment($book_no){
		$book = $this->book_model->get_precifix_book(['book_no' => $book_no]);
		if (!count($book)) {
			$this->load->view('errors/html/error_404', [
				'heading' => '404 Page Not Found', 
				'message' => 'The page you requested was not found.'
			]);
			die();
		}
		$book = $book[0];

		// Xử lý payment method
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['stripeToken'])) {
			$total_fee = explode(" ",$book['total_fee']);
			require_once 'vendor/autoload.php';
			\Stripe\Stripe::setApiKey("sk_test_6EXNH7gMr2obIrHyOXx6oRCB");
			$token = $post['stripeToken'];

			$customer = \Stripe\Customer::create(array(
		    	'email' => $post['customer_email'],
			    'source'  => $token
		  	));

		  	$charge = \Stripe\Charge::create(array(
		      	'customer' => $customer->id,
		      	'amount'   => $total_fee[1] == 'USD' ? $total_fee[0]*100: $total_fee[0],
		      	'currency' => $total_fee[1] == 'USD'? 'usd' : 'vnd',
		      	"description" => "Pay for booking room ".$book['room_no']
		  	));
		  	$this->book_model->update_book_request_data([
	  			'status' => PAID
	  		],[
	  			'book_no' => $book_no
	  		]);
		  	redirect(base_url('book/done/'.$book_no),'refresh');
		}

		self::check_auth($book);
		if (PAID == $book['status']) {
			redirect(base_url('book/done/'.$book_no),'refresh');
		}
		$data = [
			'book' => $book,
			'room' => $this->language == 'vietnam' ? self::calc_exchange($this->room_model->get_precifix_room(['room_no' => $book['room_no']]))[0] : $this->room_model->get_precifix_room(['room_no' => $book['room_no']])[0],
			'currency' 	=> $this->language == 'vietnam' ? 'Đồng' : 'USD',
			'language' 	=> $this->language,
			'accessToken' => $this->ci_nonce,
			'user' 		=> $this->user_data,
			'step' 		=> 2
		];
		$data['gallery'] = $this->room_model->get_room_gallery($data['room']['id']);
		$data['room_template'] = $this->load->view('book/room-template', $data, TRUE);
		$this->load->view('book/header', $data, FALSE);
		$this->load->view('book/payment');
		$this->load->view('book/footer');
	}

	public function done($book_no){
		$book = $this->book_model->get_precifix_book(['book_no' => $book_no]);
		if (!count($book)) {
			$this->load->view('errors/html/error_404', [
				'heading' => '404 Page Not Found', 
				'message' => 'The page you requested was not found.'
			]);
			die();
		}
		$book = $book[0]; 
		if (PAID != $book['status']) {
			redirect(base_url(),'refresh');
		}
		self::check_auth($book);
		$data = [
			'book' => $book,
			'room' => $this->language == 'vietnam' ? self::calc_exchange($this->room_model->get_precifix_room(['room_no' => $book['room_no']]))[0] : $this->room_model->get_precifix_room(['room_no' => $book['room_no']])[0],
			'currency' 	=> $this->language == 'vietnam' ? 'Đồng' : 'USD',
			'language' 	=> $this->language,
			'accessToken' => $this->ci_nonce,
			'user' 		=> $this->user_data,
			'step' 		=> 3
		];
		$data['gallery'] = $this->room_model->get_room_gallery($data['room']['id']);
		$data['room_template'] = $this->load->view('book/room-template', $data, TRUE);
		$this->load->view('book/header', $data, FALSE);
		$this->load->view('book/done');
		$this->load->view('book/footer');
	}

	private function check_auth($book){
		if ($this->user_data['uid'] != $book['uid']) {
			// Cài đặt thông báo
	        $this->session->set_flashdata('type', 'error');
	        $this->session->set_flashdata('msg', lang('error-403'));
	        $this->session->set_flashdata('title', lang('error-title'));
			redirect(base_url(),'refresh');
		}
	}

}

/* End of file Book.php */
/* Location: ./application/controllers/Book.php */