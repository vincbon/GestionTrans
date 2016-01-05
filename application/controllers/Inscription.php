<?php
class Inscription extends CI_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');
	}
	
	public function index() {
		$data['title'] = 'Inscription';
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('username', 'Pseudo', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
		$this->form_validation->set_rules('passconf', 'Confirmation du mot de passe', 'required|matches[password]');
			
		$this->form_validation->set_message('required', 'Champs requis');
		$this->form_validation->set_message('matches', 'La confirmation du mot de passe a échoué');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/inscription', $data);
		} else {
			if ($this->User_model->exist($_POST['username'])) {
				$data['username'] = $_POST['username'];
				$this->load->view('message/user_already_exist', $data);
				$this->load->view('form/inscription', $data);
			} else {
				$this->User_model->add(array('login' => $_POST['username'], 'pass' => $_POST['password'], 'username' => $_POST['username']));
				redirect('connexion/login/'.$_POST['username']);
			}
		}
		
		$this->load->view('footer', $data);
	}
}
