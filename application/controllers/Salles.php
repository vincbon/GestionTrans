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
		
		$this->form_validation->run();
		$this->load->view('form/rechercheSalles', $data);
		$this->display_salles();
		
		$this->load->view('footer', $data);
	}
	
	public function display_salles() {
		$data['title'] = 'Salles';
		
		// Récupếration des données sur les champs
		$data['array_headings'] = $this->Salle_model->getFields();
		$data['fields_metadata'] = $this->Salle_model->getFieldsMetaData();
		
		// Récupération des critères sur les salles à afficher
		$data['champsLike'] = null;
		$data['champsEqual'] = null;
		foreach ($data['array_headings'] as $champ) {
			if (isset($_GET[$champ])) {
				if (($_GET[$champ] == 'true' OR $_GET[$champ] == 'false')
				OR strtotime(str_replace('/', '-', $_GET[$champ]))) {
					$data['champsEqual'][$champ] = $_GET[$champ];
				} else {
					$data['champsLike'][$champ] = $_GET[$champ];
				}
			}
		}

		// Récupération des données principales
		$data['array_data'] = $this->Salle_model->get($data['champsEqual'], $data['champsLike']);

		//$this->perso->set_data_for_display('pilote', $data['array_data']);
		
		$data['btnReserver'] = true;
		$data['object'] = 'salle';

		$this->load->view('table', $data);
	}
}
