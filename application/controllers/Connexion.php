<?php
require_once('Main_Controller.php');

class Connexion extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Utilisateur_model');
	}
	
	public function index() {
		global $data;
		$data['title'] = 'Connexion';
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('login', 'Pseudo', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
			
		$this->form_validation->set_message('required', 'Champs requis');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/connexion', $data);
		} else {
			if (!$this->Utilisateur_model->exist($_POST['login'], $_POST['password'])) {
				$this->load->view('message/unknown_user');
				$this->load->view('form/connexion', $data);
			} else {
				$this->login($_POST['login']);
			}
		}
		
		$this->load->view('footer', $data);
	}
	
	public function login($login) {
		$this->session->set_userdata('login', $login);
		redirect();
	}
	
	public function logout() {
		session_destroy();
		redirect();
	}
}
