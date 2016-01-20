<?php
require_once('Main_Controller.php');

class Inscription extends Main_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Utilisateur_model');
		$this->load->model('Inscription_model');
		$this->load->model('Artiste_model');
	}
	
	public function index() {
		global $data;
		
		if ($data['user_connected']) redirect();

		$data['title'] = 'Inscription';
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('mail', 'E-mail', 'required');
		$this->form_validation->set_rules('site_web', 'Site web', 'required');
		$this->form_validation->set_rules('origine', 'Origine', 'required');
		$this->form_validation->set_rules('date_debut', 'Date de formation', 'required');
		$this->form_validation->set_rules('formation', 'Formation', 'required');
		$this->form_validation->set_rules('genre', 'Genre', 'required');
		$this->form_validation->set_rules('parentes', 'Parentés', 'required');

		$this->form_validation->set_message('required', $this->lang->line('error_field_required'));
		
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/inscription', $data);
		} else if ($this->Inscription_model->exist($_POST['nom'])) {
			$data['username_taken'] = true;
			$this->load->view('form/inscription', $data);
		} else {
			$this->Inscription_model->add($_POST);
			$login = $this->Utilisateur_model->add();
			$this->Artiste_model->add(array('login' => $login, 'nom' => $_POST['nom']));
			$data['user'] = $this->Utilisateur_model->get(array('login' => $login))[0];
			$this->load->view('tmp_identifiants', $data);
		}
		
		$this->load->view('footer', $data);
	}
}
