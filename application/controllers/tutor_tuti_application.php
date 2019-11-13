<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Tutor_tuti_application extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> helper('alert');
	}

	public function _remap($title) {

		$login_data = $this -> session -> userdata('login_data');
		if (isset($login_data))
			$data['login_data'] = $login_data;
		
		$data['category_title'] = $title;
		$data['menu_title'] = "tutor_tuti_application";
		$view_name = '/tutor_tuti_application/' . $title;
		$data['view_name'] = $view_name;
		$this -> load -> view('header', $data);
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}

		$this -> load -> view('footer');
	}

	private function tuti($view_name, $data){
		$this -> load -> model('tutor_tuti');
		$get_list = $this -> tutor_tuti -> select_list();
		$get_sub_list = $this -> tutor_tuti -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$this -> load -> view($view_name, $data);
	}

	private function tutor($view_name, $data){
		$this -> load -> model('tutor_tuti');
		$get_list = $this -> tutor_tuti -> select_list();
		$data['get_list'] = $get_list;
		$this -> load -> view($view_name, $data);
	}
	
	private function tuti_insert(){
		$registration_array = array('user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'user_subject' => $this -> input -> post('user_subject'),
									'user_divide' => $this -> input -> post('user_divide'),
									'user_level' => $this -> input -> post('user_level'),
									'user_hs_division' => $this -> input -> post('user_hs_division'),
									'user_hs_application' => $this -> input -> post('user_hs_application'),
									'user_time' => $this -> input -> post('user_time'),
									'user_content_application' => $this -> input -> post('user_content_application'),
									);
		$this -> load -> model('tutor_tuti');
		$this -> tutor_tuti ->tuti_registration($registration_array);
		$update_application= array( 'user_number' => $this -> input -> post('user_number'),
									'user_application_subject' => $this -> input -> post('user_application_subject')
									);
		$this -> tutor_tuti ->update_user_application($update_application);
		alert('글이 등록되었습니다.', '/index.php/');
	} 

	private function tutor_insert(){
		$registration_array = array('user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'user_grade1' => $this -> input -> post('user_grade1'),
									'user_grade2' => $this -> input -> post('user_grade2'),
									'user_grade3' => $this -> input -> post('user_grade3'),
									'user_grade4' => $this -> input -> post('user_grade4'),
									'user_grade5' => $this -> input -> post('user_grade5'),
									'user_subject' => $this -> input -> post('user_subject'),
									'user_time' => $this -> input -> post('user_time'),
									'user_career' => $this -> input -> post('user_career'),
									'user_content_application' => $this -> input -> post('user_content_application'),
									);
		$this -> load -> model('tutor_tuti');
		$this -> tutor_tuti ->tutor_registration($registration_array);
		$update_application= array( 'user_number' => $this -> input -> post('user_number'),
									'user_application_subject' => $this -> input -> post('user_application_subject')
									);
		$this -> tutor_tuti ->update_user_application($update_application);
		alert('글이 등록되었습니다.', '/index.php/');
	}

	private function change_application_on(){
		$this -> load -> model('member');
		$data = $this -> member ->update_application_on(); 
		alert('튜터,튜티 지원기능이 활성화되었습니다..', '/index.php/');
	}

	private function change_application_off(){
		$this -> load -> model('member');
		$data = $this -> member ->update_application_off(); 
		alert('튜터,튜티 지원기능이 비활성화되었습니다..', '/index.php/');
	}
	
}
