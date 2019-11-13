<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends CI_Controller {
	
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
		$data['menu_title'] = "administration";
		$view_name = '/administration/' . $title;
		$data['view_name'] = $view_name;
		
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	public function tutee($view_name, $data){
		$this -> load -> model('tutor_tutee');
		$get_subject_list = $this -> tutor_tutee -> get_subject_list();
		$data['get_subject_list'] = $get_subject_list;
		$get_list = $this -> tutor_tutee -> tutee_list();
		$data['get_list'] = $get_list;
		$this -> load -> view($view_name, $data);
	}
	
	public function tutor($view_name, $data){
		$this -> load -> model('tutor_tutee');
		$get_subject_list = $this -> tutor_tutee -> get_subject_list();
		$data['get_subject_list'] = $get_subject_list;
		$get_list = $this -> tutor_tutee -> tutor_list();
		$data['get_list'] = $get_list;
		$this -> load -> view($view_name, $data);
	}
	public function tutor_grade_up($view_name, $data){
		$this -> load -> model('tutor_tutee');
		alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);
	}
}