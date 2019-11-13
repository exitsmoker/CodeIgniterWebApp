<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class ExcelWriter {
	/**
	 07.
	 * includes the directory application\my_classes\Classes in your includes directory
	 08.
	 *
	 09.
	 */
	function index() {
		//includes the directory application\my_classes\Classes\
		ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . BASEPATH . '/application/excelwriter/Classes/');
	}

}
?>