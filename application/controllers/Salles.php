<?php
require_once('Main_Controller.php');

class Salles extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Salle_model');
		$this->load->model('Reservation_model');
		$this->load->model('Responsable_model');
		$this->load->model('Artiste_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index() {
		global $data;
		$data['title'] = 'Rechercher une salle';
		
		$this->load->view('header', $data);
		
		$this->load->view('form/rechercheSalles', $data);
		if (!empty($_GET)) {
			$this->display_salles();
		}
		
		$this->load->view('footer', $data);
	}
	
	public function display_salles() {
		$data['headings'] = array('Nom', 'Adresse', 'Ville', 'Code postal', 'Coordonnées du responsable');
		$data['tableData'] = $this->getTableData($data);

		$this->load->view('tables/sallesDisponibles', $data);
	}

	public function reserverSalle($salle) {
		global $data;
		$data['title'] = 'Réserver une salle';
		$data['salle'] = str_replace("_", " ", urldecode($salle));

		$this->load->view('header', $data);

		$this->form_validation->set_rules('date_concert', 'Date', 'required');
		$this->form_validation->set_rules('heure_debut', 'Créneau horaire', 'greater_than_equal_to[0]');

		$this->form_validation->set_message('required', $this->lang->line('error_field_required'));
		$this->form_validation->set_message('greater_than_equal_to', $this->lang->line('error_creneau_valid'));

		if ($this->form_validation->run() == false) {
			$this->load->view('form/reservationSalle', $data);
		} else {
			$artiste = $this->Artiste_model->getName($data['user_login']);
			$salleDejaUtilisee = $this->Reservation_model->bookingExists(array('artiste' => $artiste, 'salle' => $_POST['salle']));
			if ($salleDejaUtilisee) {
				$this->load->view('form/reservationSalle', $data);
				$data['errorText'] = $this->lang->line('error_salle_deja_utilisee');
				$this->load->view('errors/reservationSalleImpossible', $data);
			} else {
				$artisteDejaPris = $this->Reservation_model->bookingExists(array('artiste' => $artiste, 'date_concert' => $_POST['date_concert'], 'heure_debut' => $_POST['heure_debut']));
				if ($artisteDejaPris) {
					$this->load->view('form/reservationSalle', $data);
					$data['errorText'] = $this->lang->line('error_artiste_deja_pris');
					$this->load->view('errors/reservationSalleImpossible', $data);
				} else {
					$salleDejaPrise = $this->Reservation_model->bookingExists(array('salle' => $_POST['salle'], 'date_concert' => $_POST['date_concert'], 'heure_debut' => $_POST['heure_debut']));;
					if ($salleDejaPrise) {
						$this->load->view('form/reservationSalle', $data);
						$data['errorText'] = $this->lang->line('error_salle_deja_prise');
						$this->load->view('errors/reservationSalleImpossible', $data);
					} else {
						$this->Reservation_model->add($_POST, $artiste);
						$this->load->view('reservationSalleEnregistree');
					}
				}
			}
		}

		$this->load->view('footer', $data);
	}

	private function getTableData($data) {
		// Récupération des salles correspondantes aux critères 'nom' et 'acces_handicap'
		$champsLike = null;
		$champsEqual = null;
		if (!empty($_GET['nom'])) {
			$champsLike['nom'] = $_GET['nom'];
		}
		if (!empty($_GET['acces_handicap'])) {
			$champsEqual['acces_handicap'] = $_GET['acces_handicap'];
		}
		$salles = $this->Salle_model->get($champsEqual, $champsLike, array('nom'));
		
		// Filtrage des salles trouvées avec la capacité spécifiée
		switch ($_GET['capacite']) {
			case '0_100':
				$capaciteMin = 0;
				$capaciteMax = 100;
				break;
			case '100_500':
				$capaciteMin = 100;
				$capaciteMax = 500;
				break;
			case '500_1000':
				$capaciteMin = 500;
				$capaciteMax = 1000;
				break;
			case '1000+':
				$capaciteMin = 1000;
				$capaciteMax = null;
				break;
			default:
				$capaciteMin = 0;
				$capaciteMax = null;
				break;
		}
		$salles = $this->Salle_model->filterCapacite($salles, $capaciteMin, $capaciteMax);

		// Filtrage des salles trouvées avec la date et l'heure spécifiées pour la réservation
		$date = null;
		$creneau = null;
		if (!empty($_GET['date'])) {
			$date = $_GET['date'];
		}
		if (!empty($_GET['creneau'])) {
			$creneau = $_GET['creneau'];
		}
		$salles = $this->Reservation_model->getFree($salles, $date, $creneau);
		
		// Réduction du nombre de salles libres à afficher à 3
		$salles = array_slice($salles, 0, 3);

		// Récupération des informations à afficher pour les salles libres.
		$tableData = array();
		$index = 0;
		foreach ($salles as $salle) {
			$tableData[$index]['nom'] = $salle['nom'];
			$salleCoordonnees = $this->Salle_model->getCoordonnees($salle['nom']);
			$tableData[$index]['adresse'] = $salleCoordonnees['adresse'];
			$tableData[$index]['ville'] = $salleCoordonnees['ville'];
			$tableData[$index]['code_postal'] = $salleCoordonnees['code_postal'];
			$tableData[$index]['responsable'] = $this->Salle_model->getResponsable($salle['nom']);
			$tableData[$index]['responsable'] = $tableData[$index]['responsable']['prenom'].' '.
					  	  						$tableData[$index]['responsable']['nom'].', '.
					  	  						$tableData[$index]['responsable']['mail'].', '.
					  	  						$tableData[$index]['responsable']['tel'];
			$index = $index + 1;
		}

		return $tableData;
	}
}
