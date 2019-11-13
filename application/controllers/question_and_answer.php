<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_and_answer extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('ci_board');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title, $name) {
		$req_id = $this -> input -> get('req_id');
		$title_name = implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if (isset($login_data))
			$data['login_data'] = $login_data;

			$data['req_id'] = $req_id;

		$data['name'] = $title_name;
		$data['category_title'] = $title;
		$data['menu_title'] = "question_and_answer";
		$view_name = '/question_and_answer/' . $title;
		$data['view_name'] = $view_name;

		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		/*
		 * 만약 $title이 존재한다면
		 * $title에 맞는 함수를 호출하여 준다.
		 */
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	
	private function questioning($view_name,$data){
		$this -> load -> view($view_name, $data);
	}
	private function answering($view_name,$data){
		if($data['req_id']!=NULL){
			if($data['name']=="update_board"){
				$board_id_type_array = array('board_type'=> $data['category_title'],'board_id' => $data['req_id']);
				$data['list']= $this -> ci_board -> select_id_list($board_id_type_array);
				$this -> load -> view('notice/update_board',$data);
				
			}else if($data['name']=="update_ok"){
				$board_id_type_array = array('board_type'=> $data['category_title'],
											 'board_id' => $data['req_id'],
											 'subject' => $this -> input -> post('subject'),
											 'contents' => $this -> input -> post('contents'));
				$data['list']= $this -> ci_board -> update_board($board_id_type_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);
				
			}else if($data['name']=="delete_board"){
				$board_id_type_array = array('board_type'=> $data['category_title'],'board_id' => $data['req_id']);
				$this -> ci_board -> delete_board($board_id_type_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);
				
			}else{
			$board_id_type_array = array('board_type'=> $data['category_title'],'board_id' => $data['req_id']);
			$data['list']=$this -> ci_board -> update_hit($board_id_type_array);
			$this -> load -> view('notice/view_board',$data);
			}
			
		}else if($data['name']=="write_board"){
			$this -> load -> view('notice/write_board',$data);
			
		}else if($data['name']=="write_ok"){
			$board_sign_up_array = array('board_type'=> $data['category_title'],
										 'subject' => $this -> input -> post('subject'),
										 'contents' => $this -> input -> post('contents'),
									 	 'user_id' => $this -> input -> post('user_id'),
										 'user_name' => $this -> input -> post('user_name'));
			$this -> ci_board -> insert_board($board_sign_up_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);
		
		}else{
			$board_type_array = array('board_type'=> $data['category_title']);
			$get_list = $this -> ci_board -> get_board_all($board_type_array);
			$get_list_count = $this -> ci_board -> get_all_board_count($board_type_array);
			$data['get_list'] = $get_list;
			$data['get_list_count'] = $get_list_count;
			$this -> load -> view($view_name, $data);
		}
	}
}