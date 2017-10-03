<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->lang->load('home', $this->language);
        $this->lang->load('room', $this->language);
        $this->load->model('room_model');
        $this->load->model('book_model');
        if (!count($this->user_data)) {
        	redirect(base_url(),'refresh');
        }
        if ($this->user_data['type'] != ADMIN_TYPE) {
        	redirect(base_url(),'refresh');
        }
	}
	
	public function index(){
		$data = array( 
			'title' => 'Admin area',
			'user' => $this->user_data,
			'language' => $this->language,
			'method' => 'dashboard',
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/footer');
	}

	public function profile(){
		$data = array( 
			'title' 	=> 'Profile',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'profile',
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/profile');
		$this->load->view('back-end/footer');
	}

	public function book(){
		$data = array( 
			'title' 	=> 'All book',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'book',
			'books' 	=> $this->book_model->get_precifix_book('location=1'),
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/book');
		$this->load->view('back-end/footer');
	}


	public function user(){
		$data = array( 
			'title' 	=> 'All users',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'user',
			'users' 	=> $this->user->get_user(['uid <>' => $this->user_data['uid']]),
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/users');
		$this->load->view('back-end/footer');
	}

	public function room(){
		$rooms = $this->room_model->get_all_rooms();
		$data = array( 
			'title' 	=> 'All Room',
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'room',
			'currency' 	=> $this->language == 'vietnam' ? 'Đồng' : 'USD',
			'rooms' 	=> $this->language == 'vietnam' ? self::calc_exchange($rooms):$rooms,
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/rooms');
		$this->load->view('back-end/footer');
	}


	public function edit_room($room_no){
		self::update_room_data($room_no);
		$room = $this->room_model->get_precifix_room(['room_no' => $room_no, 'location' => '1']);
		if (!count($room)) {
			$this->load->view('errors/html/error_404', [
				'heading' => '404 Page Not Found', 
				'message' => 'The page you requested was not found.'
			]);
			die();
		}
		$room = $room[0];

		$data = array( 
			'title' 	=> lang('edit-room-title') . ' - ' . $room['room_no'],
			'user' 		=> $this->user_data,
			'language' 	=> $this->language,
			'method' 	=> 'room',
			'room' 		=> $room,
			'gallery' 	=> $this->room_model->get_room_meta_gallery($room['id']),
			'accessToken' => $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/edit-room');
		$this->load->view('back-end/footer');
	}

	public function add_new_room(){
		self::check_room_adding_data();
		$data = array( 
			'title' 		=> lang('add-room-title') ,
			'user' 			=> $this->user_data,
			'language' 		=> $this->language,
			'method' 		=> 'room',
			'accessToken' 	=> $this->ci_nonce
		);
		$this->load->view('back-end/header', $data);
		$this->load->view('back-end/sidebar');
		$this->load->view('back-end/add-new-room');
		$this->load->view('back-end/footer');
	}

	protected function check_room_adding_data(){
		$post = $this->input->post(NULL, TRUE);
		if (!isset($post['add-new-room-accessToken']) ){
			return;
		}elseif($post['add-new-room-accessToken'] != $this->ci_nonce) {
			$this->session->set_flashdata('type', 'error');
			$this->session->set_flashdata('msg', 'It seem like you are trying to change the HTML data!!!');
			$this->session->set_flashdata('title', 'Oops!');
			return;
		}
		if(count($this->room_model->get_precifix_room(['room_no' => $post['room']['room_no']]))){
			// Cài đặt thông báo
            $this->session->set_flashdata('type', 'error');
            $this->session->set_flashdata('title', lang('error-title'));
            $this->session->set_flashdata('msg', lang('error-duplicate-room-no'));
            return;
		}
		if (isset($post['room'])) {
			$post['room']['room_type'] = 2;
			$post['room']['location'] = 1;
			$room_id = $this->room_model->add_room($post['room']);
			
			$images = self::reArrayFiles( $_FILES['files'] );
			if (!count($images)) {
				return;
			}
			$target_dir = "uploads/";
			// Config to resize image
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 1224;
			$msg = 'Room Created!!! <br/>';
			
			foreach ($images as $image) {
				$target_file = $target_dir . $this->cleanString($image['name']);
				$uploadOk = 1;
				$imageFileType = pathinfo($image['name'],PATHINFO_EXTENSION);

				// Check if image file is a actual image or fake image
			    $check = @getimagesize($image["tmp_name"]);
			    if($check !== false) {
			        $uploadOk = 1;
			    } else {
			    	
			    	$msg .= "The file ". basename( $image["name"]). " is not an image.<br/>";
			        $uploadOk = 0;
			    }
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    $msg .= "Sorry, the file ". basename( $image["name"]). " was not uploaded.<br/>";
				// if everything is ok, try to upload file
				} else {

				    // Upload image
				    if (move_uploaded_file($image["tmp_name"], $target_file)) {
				    	list($width_origin, $height_origin) = getimagesize(base_url() . $target_file);
				    	if ($width_origin > $config['width']) {
					    	$config['source_image'] = $target_file;
					    	$this->load->library('image_lib');
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							$this->image_lib->clear(); 
				    	}
						list($width, $height) = getimagesize(base_url() . $target_file);
						if ( ($height > $width * 0.9) && ($width >= $height)) {
							$this->room_model->update_room_data(['room_thumbnail' => $target_file],['id' => $room_id]);
						}
				    	$this->room_model->add_room_meta_data([
							'meta_key' 	=> 'gallery',
							'meta_value'=> $target_file,
							'room_id' 	=> $room_id
						]);
				    }
				}
			}

			$this->session->set_flashdata('type', 'info');
			$this->session->set_flashdata('title', lang('update-room-success-title'));
			$this->session->set_flashdata('msg', $msg);
			redirect(base_url('admin/edit-room/'.$post['room']['room_no']),'refresh');
		}
	}


	private function update_room_data($room_no){
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['accessToken'])) {
			if ($this->ci_nonce != $post['accessToken'] ) {
				die('accessToken not match');
			}
			if($post['room']['room_no'] != $room_no && 
				count($this->room_model->get_precifix_room(['room_no' => $post['room']['room_no']]))
			){
				// Cài đặt thông báo
	            $this->session->set_flashdata('type', 'error');
	            $this->session->set_flashdata('title', lang('error-title'));
	            $this->session->set_flashdata('msg', lang('error-duplicate-room-no'));
	            redirect(base_url('admin/edit-room/'.$room_no),'refresh');
			}
			if($this->room_model->update_room_data($post['room'], ['room_no' => $room_no])){
				// Cài đặt thông báo
	            $this->session->set_flashdata('type', 'success');
	            $this->session->set_flashdata('title', lang('update-room-success-title'));
	            $this->session->set_flashdata('msg', lang('update-room-success-msg'));
	            if ($post['room']['room_no'] != $room_no) {
	            	redirect(base_url('admin/edit-room/'.$post['room']['room_no']),'refresh');
	            }
	            redirect(base_url('admin/edit-room/'.$room_no),'refresh');
			}
		}
	}

	private function calc_exchange($rooms){
		foreach ($rooms as &$room) {
			$room['room_daily_tax'] = $this->exchange * $room['room_daily_tax'];
			$room['room_weekly_tax'] = $this->exchange * $room['room_weekly_tax'];
			$room['room_monthly_tax'] = $this->exchange * $room['room_monthly_tax'];
		}
		return $rooms;
	}

	public function upload_room_image(){
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['action']) && $post['action'] == 'upload_image') {
			if ($post['accessToken'] != $this->ci_nonce) {
				echo json_encode([
					'type' => 'error',
					'msg' => 'It seem like you are trying to change the HTML data!!!',
					'title' => 'Oops!',
					'html' => ''
				]);
				die();
			}
			$room_id = $post['room'];
			$images = self::reArrayFiles( $_FILES['images'] );
			if (!count($images)) {
				echo json_encode([
					'type' => 'error',
					'msg' => 'There is no image file chosen!!!',
					'title' => 'Oops!',
					'html' => ''
				]);
				die();
			}
			$target_dir = "uploads/";
			// Config to resize image
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 1024;
			$msg = 'Your Images are added!';
			$html = '';
			
			foreach ($images as $image) {
				$target_file = $target_dir . $this->cleanString($image['name']);
				$uploadOk = 1;
				$imageFileType = pathinfo($image['name'],PATHINFO_EXTENSION);

				// Check if image file is a actual image or fake image
			    $check = @getimagesize($image["tmp_name"]);
			    if($check !== false) {
			        $uploadOk = 1;
			    } else {
			    	
			    	$msg .= "The file ". basename( $image["name"]). " is not an image.<br/>";
			        $uploadOk = 0;
			    }
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    $msg .= "Sorry, the file ". basename( $image["name"]). " was not uploaded.<br/>";
				// if everything is ok, try to upload file
				} else {

					// Upload image
				    if (move_uploaded_file($image["tmp_name"], $target_file)) {
				    	list($width_origin, $height_origin) = getimagesize(base_url() . $target_file);
				    	if ($width_origin > $config['width']) {
					    	$config['source_image'] = $target_file;
					    	$this->load->library('image_lib');
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							$this->image_lib->clear(); 
				    	}
						list($width, $height) = getimagesize(base_url() . $target_file);
					
				    	$meta_id = $this->room_model->add_room_meta_data([
							'meta_key' 	=> 'gallery',
							'meta_value'=> $target_file,
							'room_id' 	=> $room_id
						]);
						$html .= self::render_image_template($meta_id, $room_id, $target_file);
				    }
				}
			}
			echo json_encode([
				'type' 	=> 'success',
				'msg' 	=> $msg,
				'title' => 'Files Uploaded!',
				'html' 	=> $html
			]);
		}
		die();
	}

	private function render_image_template($meta_id, $room_id, $target_file){
		return '<div class="mt-element-overlay">
            <div class="mt-overlay-3 mt-overlay-3-icons" style="width: auto; height: 200px; margin: 5px">
                <img src="'. $target_file .'" style="width: auto; height: 200px">
                <div class="mt-overlay no-background">
                    <ul class="mt-info">
                        <li>
                            <a href="javascript:;" data-id="'.$meta_id.'" data-room="'.$room_id.'" data-value="'.$target_file.'" class="btn default btn-outline tooltips set_thumbnail" data-original-title="Set as thumbnail">
                                <i class="fa fa-image"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-id="'.$meta_id.'" data-room="'.$room_id.'" data-value="'.$target_file.'" class="btn default btn-outline tooltips delete_image" data-original-title="Remove this Image">
                                <i class="fa fa-trash"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>';
	}

	public function update_room_meta_data(){
		$post = $this->input->post(NULL, TRUE);
		if (!isset($post['field'])) die;
		if ($post['accessToken'] == $this->ci_nonce) {
			if (
				$post['field'] == 'delete_room' && 
				$this->room_model->delete_room_meta_data(['room_id' => $post['room']]) && 
				$this->room_model->delete_room(['id' => $post['room']])
			){
				echo json_encode([
					'type' => 'success',
					'msg' => 'Room data is deleted!!!',
					'title' => 'Whooo!'
				]);
			}
			elseif(
				$post['field'] != 'delete_room' && 
				$this->room_model->update_room_data(
					[$post['field'] => $post['value']],
					['id' => $post['id']]
				)
			){

				echo json_encode([
					'type' => 'success',
					'msg' => 'Room data is saved!!!',
					'title' => 'Whooo!'
				]);
			}
			else{

				echo json_encode([
					'type' => 'warning',
					'msg' => 'Something is going wrong! May be your connection was broke! Check that out!',
					'title' => 'Oops!'
				]);
			}
		}else{
			echo json_encode([
				'type' => 'error',
				'msg' => 'It seem like you are trying to change the HTML data!!!',
				'title' => 'Oops!'
			]);
		}
	}


	public function delete_image(){
		$post = $this->input->post();
		if (!isset($post['room'])) die;
		if ($post['accessToken'] == $this->ci_nonce) {
			if(
				count($this->room_model->get_precifix_room(
					['id' => $post['room'], 
					'room_thumbnail' => $post['value']]
				))
			){

				echo json_encode([
					'type' => 'warning',
					'msg' => 'This image is room thumbnail! Please select other image to delete!',
					'title' => 'Oops!'
				]);
			}
			else{
				if ($this->room_model->delete_room_meta_data([
					'id' 			=> $post['id'],
					'meta_value' 	=> $post['value'],
					'room_id' 		=> $post['room'] 
				])) {
					unlink($post['value']);
					echo json_encode([
						'type' => 'success',
						'msg' => 'This image has been remove!!!',
						'title' => 'Whooo!'
					]);
				}else{
					echo json_encode([
						'type' => 'warning',
						'msg' => 'Something is going wrong! May be your connection was broke! Check that out!',
						'title' => 'Oops!'
					]);
				}
			}
		}else{
			echo json_encode([
				'type' => 'error',
				'msg' => 'It seem like you are trying to change the HTML data!!!',
				'title' => 'Oops!'
			]);
		}
	}


	public function update_user_data(){
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['field'])) {
			$this->user->update_user_data([$post['field'] => $post['value']], ['uid' => $this->user_data['uid']]);
		}
	}

	private function reArrayFiles(&$file_post) {
	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = @array_keys($file_post);
	    for ($i=0; $i<$file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }
	    return $file_ary;
	}

}

/* End of file Guest.php */
/* Location: ./application/controllers/Guest.php */