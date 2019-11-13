<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mypage extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title) {
		$login_data = $this->session->userdata('login_data');
		if(isset($login_data))
			 $data['login_data'] = $login_data;
		
		
		$data['category_title'] = $title;
		$data['menu_title'] = "mypage";
		$view_name = '/mypage/' . $title;
		$data['view_name'] = $view_name;
		
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	
	public function modify($view_name, $data){
		$this -> load -> model('tutor_tutee');
		$user_number = $data['login_data']['user_number'];
		if($data['login_data']['user_application_subject']=="tutee"){
			$data['tutee_data'] = $this -> tutor_tutee -> select_id_tutee($user_number);
			var_dump($data['tutee_data']);
			$this -> load -> view($view_name, $data);
		}else if($data['login_data']['user_application_subject']=="tutor"){
			$data['tutor_data'] = $this -> tutor_tutee -> select_id_tutor($user_number);
			$this -> load -> view($view_name, $data);
		}else{
			$this -> load -> view($view_name, $data);
		}	
	}

	public function delete($view_name, $data){
		$delete_id_array = array('user_id' => $this -> input -> post('user_id'));
		$this -> load -> model('member');
		$this -> member -> delete($delete_id_array);
	}
}