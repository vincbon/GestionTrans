<?php
require_once('Main_Controller.php');

class Reservations extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Reservation_model');
		$this->load->model('Inscription_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	
	public function index() {
		global $data;

		$data['title'] = $this->lang->line('reservAttentes_title');
		$this->load->view('header', $data);
		
		// Récupération des données
		$data['tableData'] = $this->Reservation_model->get(array('statut' => 'en attente'));
		
		// Suppression statut et mise en forme du créneau
		$tableData = $data['tableData'];
		foreach ($tableData as $key => $value) {
			unset($tableData[$key]['statut']);
			$tableData[$key]['heure_debut'] = $this->lang->line('time_slot_'.$tableData[$key]['heure_debut']);
		}
		$data['tableData'] = $tableData;
		
		// Ajout du pays de l'artiste
		foreach ($tableData as $key => $value) {
			array_splice($data['tableData'][$key], 1, 0, $this->Inscription_model->get(array('nom' => $data['tableData'][$key]['artiste']))[0]['origine']);
		}

		$data['fieldsMetadata'] = $this->Reservation_model->getFieldsMetaData();

		$this->load->view('tables/confReservations', $data);
		
		$this->load->view('footer', $data);
	}

	public function valider($artiste, $salle) {
		$artiste = urldecode($artiste);
		$salle = urldecode($salle);
		$this->Reservation_model->update(array('artiste' => $artiste, 'salle' => $salle), array('statut' => 'acceptée'));
		redirect();
	}

	public function refuser($artiste, $salle) {
		global $data;
		$artiste = urldecode($artiste);
		$salle = urldecode($salle);

		$data['title'] = $this->lang->line('reservRefus_title');
		$data['artiste'] = $artiste;
		$data['salle'] = $salle;

		$this->load->view('header', $data);

		$this->form_validation->set_rules('justificatif', 'Justificatif', 'required');

		$this->form_validation->set_message('required', $this->lang->line('error_field_required'));

		if ($this->form_validation->run() == false) {
			$this->load->view('form/refusReservation', $data);
		} else {
			$this->Reservation_model->update(array('artiste' => $artiste, 'salle' => $salle), array('statut' => 'refusée'));
			redirect();
		}

		$this->load->view('footer', $data);
	}
}
