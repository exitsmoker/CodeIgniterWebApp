<?php
class Ci_board extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	public function select_list($board_type_array) {
		$this -> db -> get('ci_board');
		$board_type_array = array('board_type' => $board_type_array['board_type']);
		return $this -> db -> get_where('ci_board', $board_type_array) -> result();

	}
	public function select_id_list($board_type_array) {
		$this -> db -> get('ci_board');
		$board_type_array = array('board_type' => $board_type_array['board_type'],'board_id' => $board_type_array['board_id']);
		return $this -> db -> get_where('ci_board', $board_type_array) -> row_array();

	}
	//리스트 5개 끌어오기
	public function get_list_title5() {
		$this->db->select('board_id,subject');
		$this->db->order_by("board_id", "desc");
    	$list = $this->db->get_where('ci_board',array('board_type' => 'whole_notice'),5,0)->result();
		return $list;
	}
	
	public function get_all_board_count($board_type_array) {
		$this -> db -> like('board_type',$board_type_array['board_type']);
		$this -> db -> from('ci_board');
		return $this->db->count_all_results();
	}
	
	public function get_board_all($board_type_array,$table='ci_board',$type='',$offset='',$limit='') {
		$board_type_array = array('board_type' => $board_type_array['board_type']);
		$this -> db -> order_by("board_id", "DESC");
		$this -> db -> limit($limit,$offset);
		$board_list = $this -> db -> get_where('ci_board', $board_type_array);
		
		if( $type == 'count'){
			$this -> db -> like('board_type',$board_type_array['board_type']);
			$this -> db -> from('ci_board');
			$result = $this->db->count_all_results();
		
		}else{
			$result = $board_list -> result();
		}
		return $result;
	}
	
	public function update_hit($board_id_type_array) {
		$this -> db -> get('ci_board');
		$board_type_array = array('board_type' => $board_id_type_array['board_type'],'board_id' => $board_id_type_array['board_id']);
		$get_array = $this -> db -> get_where('ci_board', $board_type_array) -> row_array();
		$data = array('hits' => $get_array['hits'] + (int)1);
		$this -> db -> where('board_id',(string)$board_id_type_array['board_id']);
		$this -> db -> update('ci_board', $data);
		return $get_array;
	}
	
	public function insert_board($board_sign_up_array){
		return $this -> db -> insert('ci_board',$board_sign_up_array);
	}
	
	public function update_board($board_id_type_array){
		$this -> db -> get('ci_board');
		$board_update_array = array('subject' => $board_id_type_array['subject'],'contents' => $board_id_type_array['contents']);
		$this -> db -> where('board_id',(string)$board_id_type_array['board_id']);
		return $this -> db -> update('ci_board', $board_update_array);
	}
	
	public function delete_board($board_id_type_array){
		$this -> db -> where('board_id',(string)$board_id_type_array['board_id']);
		return $this -> db -> delete('ci_board', $board_id_type_array);
	}

}
?>