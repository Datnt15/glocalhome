<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Front_base {


    public function __construct(){
        parent::__construct();
        $this->lang->load('home', $this->language);
        $this->lang->load('room', $this->language);
    }

    
	public function index(){
        $post = $this->input->post();
        if (!isset($post['accessToken'])) {
            echo json_encode(['type' => 'error', 'msg' => lang('accessToken-missing'), 'title' => lang('error-title')]);
            die();
        }
        if ($post['accessToken'] != $this->ci_nonce) {
            echo json_encode(['type' => 'error', 'msg' => lang('accessToken-invalid'), 'title' => lang('error-title')]);
            die();
        }
        if (isset($post['username']) && isset($post['password'])) {
            $this->load->library('form_validation');
    		// Đặt các luật kiểm tra các trường của form
            $this->form_validation->set_rules('username', lang('home-input-username'), 'required|trim|is_unique[glocal_94_user.username]|alpha_dash|min_length[5]|max_length[32]');
            $this->form_validation->set_rules("password", lang('home-input-password'), "required|trim|min_length[5]");
            $this->form_validation->set_rules('email', lang('home-input-mail'), 'trim|required|valid_email|is_unique[glocal_94_user.email]');
            $user_content = [
                'username'  => $post['username'],
                'password'  => password_hash($post['password'], PASSWORD_BCRYPT, array('cost' => 12)),
                'email'     => $post['email'],
                'type'      => 1
            ];
            $this->form_validation->set_data($user_content);
            if (!$this->form_validation->run()){
                echo json_encode(['type' => 'error', 'msg' => $this->form_validation->error_string(), 'title' => lang('error-title')]);
                die();
            }else{ 
                $uid = $this->user->add_user($user_content);
                if ($uid) {
                    // Cài đặt thông báo
                    $this->session->set_flashdata('type', 'success');
                    $this->session->set_flashdata('title', lang('register-success-title'));
                    $this->session->set_flashdata('msg', lang('register-success-msg'));
                    $url = !is_null($this->session->room_no) ? 'book/'.$this->session->room_no : '';
                    echo json_encode(['type' => 'success', 'url' => $url]);
                }

            }
        }

	}
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */