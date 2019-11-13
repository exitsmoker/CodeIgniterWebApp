<?php
class Tutor_tuti extends CI_Model {
    function __construct(){       
        parent::__construct();
    }//__construct()

    public function tuti_registration($registration_array){
		return $this -> db -> insert('tuti_application', $registration_array);
    }
	
	public function tutor_registration($registration_array){
		return $this -> db -> insert('tutor_application', $registration_array);
    }
	
	public function tuti_list(){
		$this -> db -> order_by("reg_date", "asc");
		return $this -> db -> get('tuti_application') -> result();
	}
	
	public function tutor_list(){
		$this -> db -> order_by("reg_date", "asc");
		return $this -> db -> get('tutor_application') -> result();
	}
	
	public function tutor_list_row(){
		return $this -> db -> get('tuti_application') -> row_array();
	}
	
	public function get_subject_list(){
		return $this -> db -> get('subject') -> result();
	}
	
	public function select_list(){
		return $this -> db -> get('subject') -> result();
	}
	
	public function select_list_sub(){
		return $this -> db -> get('subject_sub') -> result();
	}
	
	public function select_id_tuti($user_number){
		$this -> db -> where('user_number',$user_number);
		return $this -> db -> get('tutor_application') -> row();
	}
	
	public function select_id_tutor($user_number){
		$this -> db -> where('user_number',$user_number);
		return $this -> db -> get('tutor_application') -> row();
	}
	
	public function update_user_application($update_application){
		$update_appliation_subject=array('user_application_subject' => $update_application['user_application_subject']);
		$this -> db -> where('user_number', $update_application['user_number']);
		return $this -> db -> update('member', $update_appliation_subject);
	}
	
}
?>