<?php
require_once('Main_Controller.php');

class Inscription extends Main_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Utilisateur_model');
	}
	
	public function index() {
		global $data;
		
		if ($data['user_connected']) redirect();

		$data['title'] = 'Inscription';
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('login', 'Pseudo', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
		$this->form_validation->set_rules('passconf', 'Confirmation du mot de passe', 'required|matches[password]');
			
		$this->form_validation->set_message('required', 'Champs requis');
		$this->form_validation->set_message('matches', 'La confirmation du mot de passe a échoué');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/inscription', $data);
		} else {
			$data['login'] = $_POST['login'];
			if ($_POST['login'] == 'atm') {
				$this->load->view('message/login_forbidden');
				$this->load->view('form/inscription', $data);
			} else if ($this->Utilisateur_model->exist($_POST['login'])) {
				$this->load->view('message/user_already_exist', $data);
				$this->load->view('form/inscription', $data);
			} else {
				$this->Utilisateur_model->add(array('login' => $_POST['login'], 'pass' => $_POST['password'], 'login' => $_POST['login']));
				redirect('connexion/login/'.$_POST['login']);
			}
		}
		
		$this->load->view('footer', $data);
	}
}
