<?php
class Inscription_model extends CI_Model {

	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	// Renvoie un array
	public function get() {
		
	}
	
	// Ajoute une inscription dans la base de données avec les informations contenues dans $data.
	public function add($data) {
		$this->db->insert('inscription', $data);
	}
	
	// Met à jour les informations de l'inscription de nom $nom avec les nouvelles informations contenues dans $data.
	public function update($nom, $data) {
		$this->db->update('inscription', $data, array('nom' => $nom));
	}
	
	// Supprime l'inscription de nom $nom de la base de données
	public function remove($nom) {
		$this->db->delete('inscription', array('nom' => $nom));
	}

}
