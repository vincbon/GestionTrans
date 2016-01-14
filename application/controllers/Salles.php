<?php
class Salles extends CI_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Salle_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index() {
		$data['title'] = 'Rechercher une salle';
		
		$this->load->view('header', $data);
		
		$this->form_validation->set_rules('capacite', 'Capacité', 'is_natural_no_zero');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/rechercheSalles', $data);
		} else {
			
		}
		
		$this->load->view('footer', $data);
	}
}
