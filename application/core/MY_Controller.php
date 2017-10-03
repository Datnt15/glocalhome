<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $ci_nonce;
    protected $user_data;
    protected $language;
    protected $exchange;
	public function __construct(){
		parent::__construct();
        self::load_lang();
		// Nếu chưa khởi tạo access token\
        if (is_null( $this->session->ci_nonce) ) {
            $this->session->set_userdata("ci_nonce", substr(md5(microtime()),0,15));
        }
        $this->ci_nonce = $this->session->ci_nonce;
        $this->load->model('user');
        $this->exchange = $this->getExchangeRate();
        $this->user_data = [];
        $is_remember = $this->input->cookie('remember_me');
        $uid_cookie = $this->encrypt->decode($this->input->cookie('uid'));
        $user_type_cookie = $this->encrypt->decode($this->input->cookie('password'));
        $is_logged_in = $this->session->userdata("is_logged_in");
        $uid_session = $this->session->uid;
        $user_type_session = $this->session->user_type;
        
        // Tồn tại cả cookie và session
        if(!is_null($is_remember) && !is_null($is_logged_in) ){
            if ($uid_cookie == $uid_session && $user_type_cookie == $user_type_session) {
                $this->user_data = $this->user->get_user(['uid' => $uid_session, 'type' => $user_type_session])[0];
            }else{
                // Cài đặt thông báo
                $this->session->set_flashdata('type', 'warning');
                $this->session->set_flashdata('msg', 'It seems like you had change your cookie data. Please login again and do not change theme.');
                $this->session->set_flashdata('title', 'Something goes wrong!');
                redirect('logout');
            }
        }

        // Chỉ tồn tại session mà không có cookie
        elseif(is_null($is_remember) && !is_null($is_logged_in) ){
            $this->user_data = $this->user->get_user(['uid' => $uid_session, 'type' => $user_type_session])[0];
        }

        // Chỉ tồn tại cookie mà không có session
        elseif(!is_null($is_remember) && is_null($is_logged_in) ){
            $this->user_data = $this->user->get_user(['uid' => $uid_cookie, 'type' => $user_type_cookie])[0];
        }

        // Không tồn tại cả cookie và session
        elseif(is_null($is_remember) && is_null($is_logged_in) ){
            // Cài đặt thông báo
            redirect(base_url());
        }

	}

    protected function cleanString($text) {
        $text = str_replace('/', '-', $text);
        $text = str_replace('"', '', $text);
        $utf8 = array(
            '/[áàâãªäăạảắẳẵằặấầẩẫậ]/u'      =>   'a',
            '/[ÁÀÂÃÄĂẠẢẴẮẲẶẰẦẤẬẨ]/u'        =>   'a',
            '/[ÍÌÎÏỊĨỈ]/u'                  =>   'i',
            '/[íìîïịĩỉ]/u'                  =>   'i',
            '/[éèêëẹẽếềễệẻể]/u'             =>   'e',
            '/[ÉÈÊËẸẼẺẾỀỂỄỆ]/u'             =>   'e',
            '/[óòôõºöọỏơờởớợỡồổốộ]/u'       =>   'o',
            '/[ÓÒÔÕÖỎỌƠỞỢỚỜỠỒỔỐỖỘ]/u'       =>   'o',
            '/[úùûüũụủưứừửữự]/u'            =>   'u',
            '/[ÚÙÛÜŨỤỦƯỨỪỬỮỰ]/u'            =>   'u',
            '/[Đđ]/u'                       =>   'd',
            '/ç/'                           =>   'c',
            '/Ç/'                           =>   'c',
            '/ñ/'                           =>   'n',
            '/Ñ/'                           =>   'n',
            '/–/'                           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'                    =>   '', // Literally a single quote
            '/[“”«»„]/u'                    =>   '', // Double quote
            '/ /'                           =>   '-', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }

    private function load_lang(){
        if ($this->uri->segment(1) == 'en' || $this->uri->segment(1) == 'vi') {
            $this->session->set_userdata('language', $this->uri->segment(1));
        }
        
        switch ($this->session->userdata('language')) {
            case 'en':
                $this->config->set_item('language', 'english');
                $this->session->set_userdata('language', 'en');
                $this->language = 'english';
                break;
            case 'vi':
                $this->config->set_item('language', 'vietnam');
                $this->session->set_userdata('language', 'vi');
                $this->language = 'vietnam';
                break;
            default:
                $this->config->set_item('language', 'english');
                $this->session->set_userdata('language', 'en');
                $this->language = 'english';
                break;
        }
    }

    private function getExchangeRate($from_Currency = 'USD',$to_Currency = 'VND',$amount =1) {
        return 22300;
        // try {
        //     $url  = "https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
        //     $data = file_get_contents($url);
        //     preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
        //     $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
        //     return round($converted, 3);
            
        // } catch (Exception $e) {
        //     return 22300;
        // }
    }

}

class Front_base extends CI_Controller {

    protected $ci_nonce;
    protected $user_data;
    protected $language;
    protected $exchange;
    public function __construct(){
        parent::__construct();
        self::load_lang();
        // Nếu chưa khởi tạo access token\
        if (is_null( $this->session->ci_nonce) ) {
            $this->session->set_userdata("ci_nonce", substr(md5(microtime()),0,30));
        }
        $this->ci_nonce = $this->session->ci_nonce;
        $this->exchange = $this->getExchangeRate();
        $this->load->model('user');
        $this->user_data = [];
        if(!is_null($this->input->cookie('remember_me')) ){
            $uid = $this->encrypt->decode($this->input->cookie('uid'));
            $user_type = $this->encrypt->decode($this->input->cookie('password'));
            $user = $this->user->get_user(['uid' => $uid, 'type' => $user_type]);
            if ( count($user) ) {
                $this->user_data = $user[0];
            }
        }
        if ($this->session->userdata("is_logged_in")) {
            $this->user_data = $this->user->get_user(['uid' => $this->session->uid, 'type' => $this->session->user_type])[0];
        }
    }

    private function load_lang(){
        if ($this->uri->segment(1) == 'en' || $this->uri->segment(1) == 'vi') {
            $this->session->set_userdata('language', $this->uri->segment(1));
        }
        
        switch ($this->session->userdata('language')) {
            case 'en':
                $this->config->set_item('language', 'english');
                $this->session->set_userdata('language', 'en');
                $this->language = 'english';
                break;
            case 'vi':
                $this->config->set_item('language', 'vietnam');
                $this->session->set_userdata('language', 'vi');
                $this->language = 'vietnam';
                break;
            default:
                $this->config->set_item('language', 'english');
                $this->session->set_userdata('language', 'en');
                $this->language = 'english';
                break;
        }
    }

    private function getExchangeRate($from_Currency = 'USD',$to_Currency = 'VND',$amount =1) {
        return 22300;
        // try {
        //     $url  = "https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
        //     $data = file_get_contents($url);
        //     preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
        //     $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
        //     return round($converted, 3);
            
        // } catch (Exception $e) {
        //     return 22300;
        // }
    }

}