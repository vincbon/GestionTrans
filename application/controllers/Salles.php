<?php
class Salles extends CI_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Salle_model');
		$this->load->helper('form');
	}
	
	public function index() {
		$data['title'] = 'Rechercher une salle';
		
		$this->load->view('header', $data);
		
		$this->load->view('form/rechercheSalles', $data);
		
		$this->load->view('footer', $data);
	}
}
