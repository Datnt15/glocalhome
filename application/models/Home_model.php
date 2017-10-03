<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}	

	public function get_all_glocalhomes(){
		return $this->db->get(GLOCALHOME_TABLE)->result_array();
	}

	public function get_glocalhome_gallery($home_id){
		$metas = $this->db->where(['meta_key' => 'gallery', 'home_id' => $home_id])->get(GLOCALHOME_META_TABLE)->result_array();
		$result = [];
		if (count($metas)) {
			foreach ($metas as $item) {
				$result[] = $item['meta_value'];
			}
		}
		return $result;
	}

	public function get_glocalhome_meta_gallery($home_id){
		return $this->db->where(['meta_key' => 'gallery', 'home_id' => $home_id])->get(GLOCALHOME_META_TABLE)->result_array();
	}

	public function get_precifix_glocalhome($where){
		return $this->db->where($where)->get(GLOCALHOME_TABLE)->result_array();
	}

	public function update_glocalhome_data( $data, $where ){
		return $this->db->where($where)->update(GLOCALHOME_TABLE, $data);
	}

	public function add_glocalhome_meta_data($data){
		return $this->db->insert(GLOCALHOME_META_TABLE, $data) ? $this->db->insert_id() : 0;
	}

	public function add_glocalhome($data){
		return $this->db->insert(GLOCALHOME_TABLE, $data) ? $this->db->insert_id() : 0;
	}

	public function delete_glocalhome_meta_data($where){
		return $this->db->where($where)->delete(GLOCALHOME_META_TABLE);
	}

	public function delete_glocalhome($where){
		return $this->db->where($where)->delete(GLOCALHOME_TABLE);
	}

}

/* End of file glocalhome_model.php */
/* Location: ./application/models/glocalhome_model.php */
