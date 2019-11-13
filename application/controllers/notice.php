<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> model('ci_board');
		$this -> load -> model('reply_ci_board');
		$this -> load -> helper('alert');
		$this -> load -> library('pagination');		
	}

	public function _remap($title,$name) {
		$req_id= $this->input->get('req_id');
		$title_name= implode(",", $name);
		$login_data = $this->session->userdata('login_data');
		
		if(isset($login_data))
			$data['login_data'] = $login_data;
			$data['req_id']=$req_id;
			$data['name']=$title_name;
			$data['category_title'] = $title;
			$data['menu_title'] = "notice";	
			$view_name = '/notice/' . $title;
			
			$data['view_name']=$view_name;
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		/*
		 * 만약 $title이 존재한다면
		 * $title에 맞는 함수를 호출하여 준다.
		 */ 
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name,$data);
		}
		$this -> load -> view('footer');
	}
	
	/*
	 Board Type가 board_notic인 모든 글을 가져온다.
	 */
	private function whole_notice($view_name,$data){
		/*
		 view에서 req_id 값을 받아와서 검사를 한다.
		 */
		if($data['req_id']!=NULL){
			/*
			 * 만약 $data['name']가 update_board일때,
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 갖고 controller로 다시와서 view에 뿌려준다.
			 * 
			 * 만약 $data['name']가 update_ok일때,
			 * name값이 update_board라면 
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 찾고 폼에 입력한 것과 데이터베이스에 있는 것을 업데이트 하고 countroller로 돌아와 alert창과 함께 게시판페이지로 리턴한다.
			 */
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
			
			/*
			 * 만약 $data['name']가 delete_board일때,
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 찾아서 삭제하고 countroller로 돌아와 alert창과 함께 게시판페이지로 리턴한다.
			 */	
			}else if($data['name']=="delete_board"){
				$board_id_type_array = array('board_type'=> $data['category_title'],'board_id' => $data['req_id']);
				$this -> ci_board -> delete_board($board_id_type_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);
			
			/*
			 * Board Type과 board_id에 맞는 게시물을 보여주며 hit를 1을 올려준다.
		 	 */	
			}else{
			$board_id_type_array = array('board_type'=> $data['category_title'],'board_id' => $data['req_id']);
			$data['get_list']=$this -> reply_ci_board -> get_list($board_id_type_array);
			$data['get_all_board_count']= $this -> reply_ci_board -> get_all_board_count($board_id_type_array);;
			$data['list']=$this -> ci_board -> update_hit($board_id_type_array);
			$this -> load -> view('notice/view_board',$data);
			
			}
			/*
			 * 만약 $data['name']가 write_board일때,
			 * 게시판 글쓰기 페이지로  이동한다.
			 * 
			 * 만약 $data['name']가 write_ok일때,
			 * board_type, subject, contents, user_id, user_name 값을 가지고 model로 가서 글을 insert를 해준다.
  		 	 */
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
		
			/*
			 * 게시판 번호, 제목, 작성자, 작성일, 조회수를 list형식으로 뿌려준다.
			 */ 
		}else{
			
			$board_type_array = array('board_type'=> $data['category_title']);
			//페이징 처리
			$config['base_url']= 'http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice/';
			$config['total_rows'] = $this -> ci_board -> get_board_all($board_type_array,$this -> uri -> segment(3), 'count');
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			
			$this -> pagination -> initialize($config); 
			
			$page = $this -> uri -> segment(3,1);
			if( $page > 1){
				$start = (($page/$config['per_page'])) * $config['per_page'];
			}else{
				$start = ($page-1) * $config['per_page'];
			}
			$limit = $config['per_page'];
			
			$data['page'] = $page;
			$data['list'] = $this -> ci_board -> get_board_all($board_type_array,$this -> uri -> segment(3),'',$start,$limit);
			$data['get_list_count'] = $config['total_rows'];
			$this -> load -> view($view_name, $data);
		}
	}
	
	/*
	 Board Type가 class_notice 모든 글을 가져온다.
	 */
	private function class_notice($view_name,$data){
		
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