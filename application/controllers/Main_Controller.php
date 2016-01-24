<?php
class Main_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Artiste_model');

		global $data;
		$login = $this->session->userdata('login');
		$data['user_connected'] =  ($login != null);
		$data['atm_connected'] = ($login == 'atm');
		$data['user_login'] = $login;

		$lang_files = array(
			'common', 
			'error', 
			'menu', 
			'connexion', 
			'inscription', 
			'reservAttentes',
			'reservRefus',
			'rechercheSalle',
			'reservationSalle',
			'reservationEnregistree',
			'time_slot',
		);
		$language = $this->session->userdata('lang');
		if ($language == null) $language = 'fr';
		$this->lang->load($lang_files, $language);
		$data['user_language'] = $language;
	}
}
