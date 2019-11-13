<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('ci_board');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title, $name){
		
		$req_id = $this -> input -> get('req_id');
		$title_name = implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if (isset($login_data))
			$data['login_data'] = $login_data;

			$data['req_id'] = $req_id;

		$data['name'] = $title_name;
		$data['category_title'] = $title;
		$data['menu_title'] = "lesson";
		$view_name = '/lesson/' . $title;
		$data['view_name'] = $view_name;
		
		/*
		 * 만약 $title이 존재한다면
		 * $title에 맞는 함수를 호출하여 준다.
		 */
		if (method_exists($this, $title)) {
			if($title == "get_user_by_divide"){
				$this -> {"{$title}"}($view_name, $data);
			}else{
			$this -> load -> view('header', $data);
			$this -> load -> view('sidebar', $data);
			$this -> {"{$title}"}($view_name, $data);
			$this -> load -> view('footer');
			}
		}
		
	}

	private function my_attendance($view_name, $data ,$year = null, $month = null) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$conf = array(
					'show_next_prev' => "true",
					'next_prev_url' => '/index.php/lesson/my_attendance'
				);	
		
		$conf['template'] = '
		{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}


		{heading_row_start}<tr>{/heading_row_start}

   		{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   		{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   		{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   		{heading_row_end}</tr>{/heading_row_end}

   		{week_row_start}<tr>{/week_row_start}
   		{week_day_cell}<td>{week_day}</td>{/week_day_cell}
   		{week_row_end}</tr>{/week_row_end}

   		{cal_row_start}<tr class="days">{/cal_row_start}
   		{cal_cell_start}<td>{/cal_cell_start}

   		{cal_cell_content}
   		<div class="day_num">{day}</div>
   		<div class="content">{content}</div>
   		{/cal_cell_content}
   		{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   		{cal_cell_no_content}{day}{/cal_cell_no_content}
   		{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   		{/cal_cell_no_content_today}
	
   		{cal_cell_blank}&nbsp;{/cal_cell_blank}

   		{cal_cell_end}</td>{/cal_cell_end}
   		{cal_row_end}</tr>{/cal_row_end}

   		{table_close}</table>{/table_close}
   		';
		
		$this -> load -> library('calendar',$conf);
		
		
		
		$calendar_data = $this -> get_calendar($year, $month);
		$data['calendar'] = $this -> calendar -> generate($year,$month,$calendar_data); 
		$this -> load -> view($view_name, $data);
	}
	
	private function get_calendar($year, $month){
		$calendar_data=array();
			
		$this -> load -> model('attendance');
		$calen_data = $this -> attendance -> get_attendance($year, $month);
			
		foreach ($calen_data as $cal_data){
			$day = (int)substr(($cal_data -> date),8,2);
			$calendar_data[(int)$day] = $cal_data -> data;
		} 
		
		return $calendar_data;
	}

	private function get_user_by_divide($view_name,$data){
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject = $_POST['subject'];
		
		$divide_array = array('user_divide'=> $_POST['subject']);
		$this -> load -> model('member');
		$data['divide']=$this -> member -> select_divide($divide_array);
		$this -> load -> view($view_name, $data);
	}
	
	private function register(){
		$year = $this -> input -> post('year');
		$month = $this -> input -> post('month');
		$day = $this -> input -> post('day');
		$url = "/index.php/lesson/attendance_record"+$year+"/"+$month+"/"+$day;
		alert('저장되었습니다.', $url);
	}
	
	private function daily_journal_admin($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal($view_name, $data){
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
	private function attendance_record_admin($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function attendance_record($view_name, $data) {
		$this -> load -> model('tutor_tutee');
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$this -> load -> view($view_name, $data);
	}
	private function select_divide(){
		$divide_array = array('user_divide' => $this -> input -> post('user_divide')
						   );
		$this -> load -> model('tutee_application');
		$this -> member -> select_list($divide_array);
	}
	private function attendance_record_admin_status($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}

	private function enrichment_study($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function enrichment_study_admin($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function tutor_report($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function my_question($view_name, $data) {
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
