<?php
require_once('Main_Controller.php');

class Reservations extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Reservation_model');
	}
	
	public function index() {
		global $data;

		$data['title'] = 'Réservations en attente';
		$this->load->view('header', $data);
		
		// Récupération des données
		$data['array_data'] = $this->Reservation_model->get(array('statut' => 'en cours'));
		$data['fields_metadata'] = $this->Reservation_model->getFieldsMetaData();
		$data['array_headings'] = $this->Reservation_model->getFields();

		//$this->perso->set_data_for_display('pilote', $data['array_data']);
		
		$data['btnValider'] = true;
		$data['btnRefuser'] = true;
		$data['object'] = 'reservation';

		$this->load->view('table', $data);
		
		$this->load->view('footer', $data);
	}
}
