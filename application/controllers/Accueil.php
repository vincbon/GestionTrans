<?php
require_once('Main_Controller.php');

class Accueil extends Main_controller {
	
	public function index() {
		global $data;
		
		if ($data['user_connected']) {
			if ($data['atm_connected']) {
				redirect('reservations');
			} else {
				redirect('salles');
			}
		} else {
			redirect('connexion');
		}
		
	}
}
