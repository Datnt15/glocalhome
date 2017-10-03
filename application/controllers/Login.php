<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Front_base {

    public function __construct(){
        parent::__construct();
        $this->lang->load('home', $this->language);
        $this->lang->load('room', $this->language);
    }

    public function check_login(){
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
            $user = $this->user->get_user(['username' => $post['username']]);
            if(count($user) && password_verify($post['password'], $user[0]['password'])){
                // Cài đặt thông báo
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', str_replace('$1', $user[0]['fullname']==''?$user[0]['username']: $user[0]['fullname'], lang('login-success-msg')));
                $this->session->set_flashdata('title', lang('login-success-title'));
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('uid', $user[0]['uid']);
                $this->session->set_userdata('user_type', intval($user[0]['type']));
                
                if (isset($post['remember'])) {
                    $this->input->set_cookie(array(
                        'name'   => 'remember_me',
                        'value'  => true,                            
                        'expire' => 2592000,
                        'secure' => TRUE
                    ));
                    $this->input->set_cookie(array(
                        'name'   => 'uid',
                        'value'  => $this->encrypt->encode(intval($user[0]['uid'])),                            
                        'expire' => 2592000,
                        'secure' => TRUE
                    ));
                    $this->input->set_cookie(array(
                        'name'   => 'password',
                        'value'  => $this->encrypt->encode(intval($user[0]['type'])),                            
                        'expire' => 2592000,
                        'secure' => TRUE
                    ));
                }
                $url = !is_null($this->session->room_no) ? 'book/'.$this->session->room_no : '';
                echo json_encode(['type' => 'success', 'url' => $url]);
            }else{
                // Cài đặt thông báo
                echo json_encode(['type' => 'error', 'msg' => lang('invalid-username-or-password'), 'title' => lang('error-title')]);
            }
        }
    }

    public function set_room(){
        $post = $this->input->post();
        $this->session->set_userdata('room_no', $post['room_no']);
    }
    
    public function login_with_social(){
        $post = $this->input->post();
        if (isset($post['avatar'])) {
            $email = $post['email'];
            $user = $this->user->get_user(['email' => $email]);
            if (count($user)) {
                // Cài đặt thông báo
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', str_replace('$1', $user[0]['fullname']==''?$user[0]['username']: $user[0]['fullname'], lang('login-success-msg')));
                $this->session->set_flashdata('title', lang('login-success-title'));
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('uid', $user[0]['uid']);
                $this->session->set_userdata('user_type', $user[0]['type']);
            }else{
                
                // Đăng ký user mới
                $new_uid = $this->user->add_user([
                    'username'  => $post['username'],
                    'password'  => $post['password'],
                    'email'     => $post['email'],
                    'avatar'    => $post['avatar'],
                    'type'      => 1
                ]);
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('msg', str_replace('$1', $post['username'], lang('login-success-msg')));
                $this->session->set_flashdata('title', lang('login-success-title'));
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('uid', $new_uid);
                $this->session->set_userdata('user_type', 1);
            }
            $url = !is_null($this->session->room_no) ? base_url('book/'.$this->session->room_no) : base_url();
            echo json_encode(['type' => 'success', 'url' => $url]);
        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */