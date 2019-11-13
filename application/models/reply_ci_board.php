<?php
class reply_ci_board extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	public function reply_board($board_reply_array){
		return $this -> db -> insert('ci_reply_board',$board_reply_array);
	}
	
	public function get_all_board_count($reply_id_board_array) {
		$this -> db -> like('board_id',$reply_id_board_array['board_id']);
		$this -> db -> from('ci_reply_board');
		return $this->db->count_all_results();
	}
	
	public function get_list($reply_id_board_array){
		$this -> db -> get('ci_reply_board');	
		$this -> db -> order_by("reply_parent_id", "asc");
		$this -> db -> order_by("step", "asc");
		$reply_board_id_array = array('board_id' => $reply_id_board_array['board_id']);
		return $this -> db -> get_where('ci_reply_board', $reply_board_id_array) -> result();
	}
	
	public function select_id_list($reply_id_board_array){
		$this -> db -> get('ci_reply_board');	
		$reply_board_id_array = array('reply_id' => $reply_id_board_array['reply_id']);
		return $this -> db -> get_where('ci_reply_board', $reply_board_id_array) -> row_array();
	}
	
	public function update_reply_board($board_reply_id_array){
		$this -> db -> get('ci_reply_board');
		$reply_board_update_array = array('reply_contents' => $board_reply_id_array['reply_contents']);
		$this -> db -> where('reply_id',(string)$board_reply_id_array['reply_id']);
		return $this -> db -> update('ci_reply_board', $reply_board_update_array);
	}
	
	public function delete_reply_board($board_reply_id_array){
		$this -> db -> where('reply_id',(string)$board_reply_id_array['reply_id']);
		return $this -> db -> delete('ci_reply_board', $board_reply_id_array);
	}

	public function reply_again_board($board_reply_array){
		$board_mi = $board_reply_array['step']-(int)1;
		$board_mx = $board_reply_array['step']+(int)1;

		//if($board_reply_array['reply_id_top']==$board_reply_array['reply_id']){}
			echo $board_mi;
			echo "       ";
			$get_array_db = array('reply_parent_id' => $board_reply_array['reply_parent_id'],'step >=' => $board_reply_array['step']);
			$step_ok=$this -> db -> get_where('ci_reply_board', $get_array_db) -> row_array();
			var_dump($step_ok);
			// $step_array= array();
			// var_dump($step_array);
// 			
			// $step_ok = $this -> db -> get_where('ci_reply_board',$step_array) -> row_array();
			// var_dump($step_ok);
			$update_array = array('step' =>$step_ok['step']+(int)1);
			$this -> db -> where('step', $step_ok['step']);
			$this -> db -> update('ci_reply_board',$update_array);
			
			
		$board_reply = array('board_id' => $board_reply_array['board_id'],
						     'user_name' => $board_reply_array['user_name'],
						     'reply_contents' => $board_reply_array['reply_contents'],
						     'depth' => $board_reply_array['depth'],
						     'step' => $board_reply_array['step'],
					         'reply_parent_id' => $board_reply_array['reply_parent_id'],
					         'reply_id_top' => $board_reply_array['reply_id_top']
						     );
		
		return $this -> db -> insert('ci_reply_board',$board_reply);
	}
	
	public function update_parents_id_board($board_reply_array){
		$data_user_id = $this -> db -> get_where('ci_reply_board',$board_reply_array) -> row_array();
		$update_reply_parents_update = array('reply_parent_id' => $data_user_id['reply_id'],
											 'reply_id_top' => $data_user_id['reply_id']
											 );
		$this -> db -> where('reply_id',(string)$data_user_id['reply_id']);
		return $this -> db -> update('ci_reply_board',$update_reply_parents_update);
	}
	
}
?>