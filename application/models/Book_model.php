<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}	

	public function get_all_books(){
		return $this->db->get(BOOK_TABLE)->result_array();
	}


	public function get_precifix_book($where){
		return $this->db->where($where)->get(BOOK_TABLE)->result_array();
	}

	public function add_book_request($data){
		return $this->db->insert(BOOK_TABLE, $data) ? $this->db->insert_id() : 0;
	}

	public function update_book_request_data( $data, $where ){
		return $this->db->where($where)->update(BOOK_TABLE, $data);
	}

	public function get_booked_dates($room_no){
		return $this->db->select('date_range')->where(['room_no' => $room_no, 'status' => 2])->get(BOOK_TABLE)->result_array();
	}

}

/* End of file Room_model.php */
/* Location: ./application/models/Room_model.php */
