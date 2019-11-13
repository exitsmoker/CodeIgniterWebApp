<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_process extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('form_validation');
	}

	public function _remap($title) {
		$login_data = $this -> session -> userdata('login_data');
		if (isset($login_data))
			$data['login_data'] = $login_data;
		
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}();
		}
		$data['category_title'] = $title;
		$data['menu_title'] = "login_process";
		$view_name = '/login_process/' . $title;
		$data['view_name'] = $view_name;
		
		$this -> load -> view('header',$data);
		$this -> load -> view('sidebar', $data);
		
		$this -> load -> view($view_name,$data);
		$this -> load -> view('footer');
	}

	//회원가입
	public function sign_up() {
		$this -> form_validation -> set_rules('user_id', '아이디', 'required|callback_user_id_check');
		$this -> form_validation -> set_rules('user_pw', '비밀번호', 'required|min2_length[6]|max_length[16]|matches[user_pw_check]');
		$this -> form_validation -> set_rules('user_pw_check', '비밀번호 확인', 'required');
		$this -> form_validation -> set_rules('user_name', '이름', 'required');
		$this -> form_validation -> set_rules('user_number', '학번', 'required|numeric|exact_length[10]|callback_user_number_check');
		$this -> form_validation -> set_rules('user_phonenumber2', '핸드폰 번호', 'required');
		$this -> form_validation -> set_rules('user_phonenumber3', '핸드폰 번호', 'required');
		$this -> form_validation -> set_rules('user_phonenumber', '핸드폰 번호', 'required|min_length[17]');
		$this -> form_validation -> set_rules('user_email', '이메일', 'required|valid_email');
		
		if ($this -> form_validation -> run() == FALSE) {
		} else {
			$join_array = array('user_id' => $this -> input -> post('user_id'), 
			'user_pw' => $this -> input -> post('user_pw'), 
			'user_name' => $this -> input -> post('user_name'), 
			'user_year' => $this -> input -> post('user_year'),
			'user_number' => $this -> input -> post('user_number'),
			'user_department' => $this -> input -> post('user_department'),
			'user_phonenumber' => $this -> input -> post('user_phonenumber'),
			'user_email' => $this -> input -> post('user_email'));
			$this -> load -> model('member');
			$data = $this -> member -> joining($join_array);
			alert('회원가입이 완료되었습니다.', '/index.php/');
		}
	}
	
	public function update(){
			$update_user_array = array('user_id' => $this -> input -> post('user_id'),
			'user_pw' => $this -> input -> post('user_pw'), 
			'user_name' => $this -> input -> post('user_name'), 
			'user_year' => $this -> input -> post('user_year'),
			'user_number' => $this -> input -> post('user_number'),
			'user_department' => $this -> input -> post('user_department'),
			'user_phonenumber' => $this -> input -> post('user_phonenumber'),
			'user_email' => $this -> input -> post('user_email'));
			$this -> load -> model('member');
			$data = $this -> member -> update($update_user_array);
			alert('회원수정이 완료되었습니다.', '/index.php/');
	}
	
	public function login_id_pw_check() {
			$form_id_pw_array = array('form_id' => $this -> input -> post('form_id'), 'form_pw' => $this -> input -> post('form_pw'));
			$this -> load -> model('member');
			$login_ok = $this -> member -> logincheck($form_id_pw_array);
			if ($login_ok == TRUE) {
			$login_data = $this -> member -> select_where($form_id_pw_array);
			$login_array = array('user_id' => $login_data['user_id'],
			 'user_pw' => $login_data['user_pw'], 
			 'user_name' => $login_data['user_name'], 
			 'user_year' => $login_data['user_year'],
			 'user_number' => $login_data['user_number'],
			 'user_department' => $login_data['user_department'],
			 'user_phonenumber' => $login_data['user_phonenumber'],
			 'user_email' => $login_data['user_email'],
			 'user_application' => $login_data['user_application'],
			 'user_check_admin' => $login_data['user_check_admin'],
			 'user_application_subject' => $login_data['user_application_subject'],
			 'grade' => $login_data['grade']);
			$this -> session -> set_userdata(array('login_data' => $login_array));
			$this -> session -> all_userdata();
			alert('로그인이 되었습니다.', '/index.php/main');
		} else {
			alert('아이디나 비밀번호가 일치하지 않습니다.', '/index.php/login_process/login');
		}
	}

	public function logout() {
		$this -> session -> unset_userdata('session_data');
		$this -> session -> sess_destroy();
		alert('로그아웃 되었습니다.', '/index.php/main');
	}

	//이름, 전화번호, 이메일로 ID 찾기
	public function id_search() {
		if ($this -> input -> post('form_name') == null) {
			alert('이름을 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_number') == null) {
			alert('학번을 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_email1') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_email2') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		}
		$find_id_array = array('form_name' => $this -> input -> post('form_name'), 'form_number' => $this -> input -> post('form_number'), 'form_email1' => $this -> input -> post('form_email1'),'form_email2' => $this -> input -> post('form_email2'));
		$this -> load -> model('member');
		$data = $this -> member -> id_search($find_id_array);
		if ($data != null) {
			alert_parameter('당신의 아이디는', '입니다.', $data[0] -> user_id, '/index.php/login_process/login');
		} else {
			alert('입력하신 정보에 해당하는 아이디가 없습니다.', '/index.php/login_process/search_id_pwd');
		}
	}

	//아이디, 이름, 이메일로 PW 찾기
	public function pw_search() {
		if ($this -> input -> post('form_id') == null) {
			alert('아이디를 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_name') == null) {
			alert('이름을 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_email1') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_email2') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		}
		$pw_search_array = array('form_id' => $this -> input -> post('form_id'), 'form_name' => $this -> input -> post('form_name'), 'form_email1' => $this -> input -> post('form_email1'),'form_email2' => $this -> input -> post('form_email2'));
		$this -> load -> model('member');
		$data = $this -> member -> pw_search($pw_search_array);
		if ($data != null) {
			alert_parameter('해당 아이디의 암호는', '입니다.', $data[0] -> user_pw, '/index.php/login_process/login');
		} else {
			alert('입력하신 정보가 올바르지 않습니다.', '/index.php/login_process/search_id_pwd');
		}
	}
	
	
	public function user_id_check() {
		$id_array = array('user_id' => $this -> input -> post('user_id'));
		$this -> load -> model('member');
		$data = $this -> member -> id_compare($id_array);
		if ($data != null) {
			$this -> form_validation -> set_message('user_id_check', $id_array['user_id'] . '은(는) 중복된 아이디입니다.');
			return FALSE;
			//alert('중복된 아이디 입니다.');
		} else {
			$this -> form_validation -> set_message('user_id_check', $id_array['user_id'] . '은(는) 사용하실수 있는 아이디입니다.');
			return TRUE;
			//alert('중복되지않은 아이디 입니다.');
		}
	}
	
	public function user_number_check() {
		$number_array = array('user_number' => $this -> input -> post('user_number'));
		$this -> load -> model('member');
		$data = $this -> member -> number_compare($number_array);
		if ($data != null) {
			$this -> form_validation -> set_message('user_number_check', $number_array['user_number'] . '학번이 존재합니다. 학번을 다시 확인해주세요');
			return FALSE;
		} else {
			$this -> form_validation -> set_message('user_number_check', $number_array['user_number'] . '은(는) 사용하실수 있는 학번입니다.');
			return TRUE;
		}
	}
	
	public function dfewf(){
		
	}

}
