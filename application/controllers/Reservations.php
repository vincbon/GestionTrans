<?php
require_once('Main_Controller.php');

class Reservations extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Reservation_model');
		$this->load->model('Inscription_model');
	}
	
	public function index() {
		global $data;

		$data['title'] = 'Réservations en attente';
		$this->load->view('header', $data);
		
		// Récupération des données
		$data['tableData'] = $this->Reservation_model->get(array('statut' => 'en attente'));
		
		// Suppression statut et mise en forme du créneau
		$tableData = $data['tableData'];
		foreach ($tableData as $key => $value) {
			unset($tableData[$key]['statut']);
			if ($tableData[$key]['heure_debut'] == 23)
				$tableData[$key]['heure_debut'] = $tableData[$key]['heure_debut']."h - 0h";
			else
				$tableData[$key]['heure_debut'] = $tableData[$key]['heure_debut']."h - ".($tableData[$key]['heure_debut'] + 1)."h";
		}
		$data['tableData'] = $tableData;
		
		// Ajout du pays de l'artiste
		foreach ($tableData as $key => $value) {
			array_splice($data['tableData'][$key], 1, 0, $this->Inscription_model->get(array('nom' => $data['tableData'][$key]['artiste']))[0]['origine']);
		}

		$data['fieldsMetadata'] = $this->Reservation_model->getFieldsMetaData();
		
		// Temporaire
		foreach ($data['tableData'][0] as $key => $value) {
			$data['headings'][] = $key;
		}

		$this->load->view('tables/confReservations', $data);
		
		$this->load->view('footer', $data);
	}

	public function valider($artiste, $salle) {
		$artiste = urldecode($artiste);
		$salle = urldecode($salle);
		$this->Reservation_model->update(array('artiste' => $artiste, 'salle' => $salle), array('statut' => 'acceptée'));
		redirect();
	}

	public function refuser() {
		redirect();
	}
}
