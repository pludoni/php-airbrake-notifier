<?php
class Services_Airbrake_CodeIgniter extends Services_Airbrake {
	var $ci;

	function setup() {
		$this->ci =& get_instance();
	}

	function action() {
		return $this->ci->router->method;
	}

	function component() {
		return $this->ci->router->class;
	}

	function project_path() {
		return APPPATH;
	}
}
