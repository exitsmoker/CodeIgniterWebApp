<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
		}
		
	public function _remap(){
		$login_data = $this->session->userdata('login_data');
		if(isset($login_data))
			 $data['login_data'] = $login_data;
		
		$this->load->model('ci_board');
		$notice_list = $this->ci_board->get_list_title5();
		$data['notice_list5'] = $notice_list;
		
		$this->load->view('header', $data);
		$this->load->view('main', $data);
		$this->load->view('footer');
	}
}