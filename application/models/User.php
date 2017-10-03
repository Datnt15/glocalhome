<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	// function __construct
	public function __construct()
	{
		parent::__construct();
	}	
	
	// 
	public function get_user($data){
		return $this->db->select()->from(USER_TABLE)->where($data)->get()->result_array();
	}

	public function get_all_user(){
		return $this->db->get(USER_TABLE)->result_array();
	}


	/**
	 * Thêm đối tượng người dùng
	 * @param [array] $data [chứa thông tin cơ bản của người dùng]
	 * EX: $data = [
	 * 		'username' 	=> 'some_user_name_123', 
	 * 		'password' 	=> 'cds6fg434h3jvg2v2v43hrdhewvgv44', // Đã đc mã hóa
	 * 		'email' 	=> 'example@gmail.com',
	 * 		'type' 		=> USER_TYPE //Hằng số đc lưu trong file config/constants.php
	 * 	]
	 */
	public function add_user($data){
		return $this->db->insert(USER_TABLE, $data) ? $this->db->insert_id() : 0;
	}

	/**
	 * Sửa đổi thông tin chính của người dùng
	 * @param [array] $data [chứa thông tin cơ bản của người dùng]
	 * EX: $data = [
	 * 		'username' 		=> 'Nguyễn Tiên Đạt', 
	 * 		'user_type' 	=> ADMIN_TYPE
	 * 	]
	 * 	@param [array|string] $where [Điều kiệu để sửa]
	 * 	@return Boolean
	 */
	public function update_user_data( $data, $where ){
		return $this->db->where($where)->update(USER_TABLE, $data);
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */