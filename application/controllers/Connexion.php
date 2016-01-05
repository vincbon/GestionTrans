<?php
class Connexion extends CI_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');
	}
	
	public function index() {
		$data['title'] = 'Connexion';
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('username', 'Pseudo', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
			
		$this->form_validation->set_message('required', 'Champs requis');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/connection', $data);
		} else {
			if (!$this->User_model->exist($_POST['username'], $_POST['password'])) {
				$this->load->view('message/unknown_user');
				$this->load->view('form/connection', $data);
			} else {
				$this->login($_POST['username']);
			}
		}
		
		$this->load->view('footer', $data);
	}
	
	public function login($username) {
		$this->session->set_userdata('username', $username);
		redirect('todo_list');
	}
	
	public function logout() {
		session_destroy();
		redirect();
	}
}
