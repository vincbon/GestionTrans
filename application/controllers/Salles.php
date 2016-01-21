<?php
require_once('Main_Controller.php');

class Salles extends Main_Controller {
	
	// Constructeur
	public function __construct() {
		parent::__construct();
		$this->load->model('Salle_model');
		$this->load->model('Reservation_model');
		$this->load->model('Responsable_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index() {
		global $data;
		$data['title'] = 'Rechercher une salle';
		
		$this->load->view('header', $data);
		
		$this->form_validation->run();
		$this->load->view('form/rechercheSalles', $data);
		if (!empty($_GET)) {
			$this->display_salles();
		}
		
		$this->load->view('footer', $data);
	}
	
	public function display_salles() {
		$data['headings'] = array('Nom', 'Adresse', 'Ville', 'Code postal', 'Coordonnées du responsable');
		$data['tableData'] = $this->getTableData($data);

		$this->load->view('tableRechercheSalle', $data);
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
		$salles = $this->Salle_model->getTemp($salles, $capaciteMin, $capaciteMax);

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
