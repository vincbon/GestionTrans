<?php
require_once('Main_Controller.php');

class Salles extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Salle_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index() {
		global $data;
		$data['title'] = 'Rechercher une salle';
		
		$this->load->view('header', $data);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('form/rechercheSalles', $data);
			//$this->display_reservations();
		} else {
			$this->load->view('form/rechercheSalles', $data);
			$this->display_reservations();
		}
		
		$this->load->view('footer', $data);
	}
	
	public function display_reservations() {
		$data['title'] = 'Réservations';
		
		// Critère de tri
		if (isset($_GET['o'])) {
			$o = $_GET['o'];
		} else {
			$o = 'id';
		}

		// Récupération des données
		$data['array_data'] = $this->Salle_model->get($o, $data['champsEqual'], $data['champsLike'])->result_array();
		$data['fields_metadata'] = $this->Salle_model->getFieldsMetaData();
		$data['array_headings'] = $this->Salle_model->getFields();

		//$this->perso->set_data_for_display('pilote', $data['array_data']);
		
		$data['btnReserver'] = true;
		$data['object'] = 'salle';

		$this->load->view('table', $data);
	}
}
