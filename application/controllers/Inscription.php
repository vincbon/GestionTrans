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
		
		$this->form_validation->set_rules('nom', 'Nom', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('mail', 'E-mail', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('origine', 'Origine', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('date_debut', 'Date de formation', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('formation', 'Formation', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('genre', 'Genre', '', 
			array()
		);
		$this->form_validation->set_rules('elements_principaux', 'Eléments principaux', '', 
			array()
		);
		$this->form_validation->set_rules('elements_ponctuels', 'Eléments ponctuels', '', 
			array()
		);
		$this->form_validation->set_rules('parentes', 'Parentés', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('site_web', 'Site web', 'required', 
			array('required'	=>	$this->lang->line('error_field_required'))
		);
		$this->form_validation->set_rules('discographie', 'Discographie', '', 
			array()
		);
		$this->form_validation->set_rules('photos', 'Photos', '', 
			array()
		);
		$this->form_validation->set_rules('videos', 'Vidéos', '', 
			array()
		);
		
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/inscription', $data);
		} else {
			if ($_POST['nom'] == 'atm') {
				$data['username_taken'] = true;
				$this->load->view('form/inscription', $data);
			} else if ($this->Utilisateur_model->exist($_POST['login'])) {
				$this->load->view('message/user_already_exist', $data);
				$this->load->view('form/inscription', $data);
			} else {
				$this->Utilisateur_model->add(array('nom' => $_POST['login'], 'pass' => $_POST['password'], 'login' => $_POST['login']));
			}
		}
		
		$this->load->view('footer', $data);
	}
}
