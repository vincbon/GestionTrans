<?php
class Main_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$login = $this->session->userdata('login');
		$data['user_connected'] =  ($login != NULL);
		$data['atm_connected'] = ($login == 'atm');
	}
}
