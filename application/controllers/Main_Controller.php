<?php
class Main_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		global $data;
		$login = $this->session->userdata('login');
		$data['user_connected'] =  ($login != null);
		$data['atm_connected'] = ($login == 'atm');
		$data['user_login'] = $login;

		$lang_files = array('error');
		$language = $this->session->userdata('lang');
		if ($language == null) $language = 'fr';
		$this->lang->load($lang_files, $language);
	}
}
