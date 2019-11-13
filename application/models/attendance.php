<?php
class Attendance extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	function get_attendance($year, $month){
		$this -> db -> select('date,data');
		$this -> db -> like('date',$year.'-'.$month);
		return $this -> db -> get('attendance') -> result();
	}
	
}
?>