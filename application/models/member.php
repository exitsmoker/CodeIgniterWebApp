<?php
class Member extends CI_Model {
    function __construct(){       
        parent::__construct();
    }//__construct()

    public function joining($join_array){
		return $this -> db -> insert('member', $join_array);
    }
	
	 public function update($update_user_array){
	 	var_dump($update_user_array['user_id']);
		return $this -> db -> update('member', $update_user_array,array('user_id' => $update_user_array['user_id']));
    }
	 
	public function logincheck($form_id_pw_array){
		$form_array = array('form_id' => $form_id_pw_array['form_id'],
							'form_pw' => $form_id_pw_array['form_pw']);
		$db_data = $this->db->get_where('member',array('user_id'=>$form_array['form_id'],'user_pw'=>$form_array['form_pw']))->row();
		if(($db_data != null)){
			$this -> db -> get_where('member',array('user_id'=>$form_array['form_id']));
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function select_where($form_id_pw_array){
		$form_array = array('form_id' => $form_id_pw_array['form_id']);
		return $this -> db -> get_where('member',array('user_id'=>$form_array['form_id'])) -> row_array();
	}
	
	public function id_search($name_number_email_array){
		$form_array = array('user_name' => $name_number_email_array['form_name'],
				'user_number' => $name_number_email_array['form_number'],
				'user_email1' => $name_number_email_array['form_email1'],
				'user_email2' => $name_number_email_array['form_email2']);
				return $this -> db -> get_where('member', $form_array) -> result();
	}
	
	public function pw_search($id_name_email_array){
		$form_array = array('user_id' => $id_name_email_array['form_id'],
				'user_name' => $id_name_email_array['form_name'],
				'user_email1' => $id_name_email_array['form_email1'],
				'user_email2' => $id_name_email_array['form_email2']);
				return $this -> db -> get_where('member', $form_array) -> result();
	}
	public function id_compare($id_array){
		$form_array = array('user_id' => $id_array['user_id']);
		return $this -> db -> get_where('member', $form_array) -> result();
	}

	public function number_compare($number_array){
		$form_array = array('user_number' => $number_array['user_number']);
		return $this -> db -> get_where('member', $form_array) -> result();
	}

	public function update_application_on(){
		$data = array('user_application' => "O");
		return $this -> db -> update('member',$data);
	}

	public function update_application_off(){
		$data = array('user_application' => "X");
		return $this -> db -> update('member',$data);
	}
	
	public function delete($delete_id_array){
		return $this -> db -> delete('member',$delete_id_array); 
	}
	
	public function select_list($divide_array){
		return $this -> db -> get_where('member',$divide_array);
	}

	public function select_divide($divide_array){
		return $this -> db -> get_where('tutee_application',$divide_array) -> result();
	}
}
?>