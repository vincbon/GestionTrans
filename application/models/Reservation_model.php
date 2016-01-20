<?php
class Reservation_model extends CI_Model {

	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	// Renvoie un array contenant les noms des champs de Inscription
	public function getFields() {
		return $this->db->list_fields('reservation');
	}
	
	// Renvoie un array contenant des informations supplémentaires sur les champs
	public function getFieldsMetaData() {
		foreach ($this->db->field_data('reservation') as $num_field => $field) {
			$metadata[$num_field]['name'] = $field->name;
			$metadata[$num_field]['type'] = $field->type;
			$metadata[$num_field]['max_length'] = $field->max_length;
		}
		return $metadata;
	}
	
	// Renvoie un array contenant les données des inscriptions répondant aux critères spécifiés
	public function get($data_equal = null, $data_like = null, $order_by = 'date_reservation') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		$this->db->order_by($orderby, 'ASC');
		return $this->db->get('reservation')->result_array();
	}
	
	// Ajoute une inscription dans la base de données avec les informations contenues dans $data.
	public function add($data) {
		$this->db->insert('reservation', $data);
	}
	
	// Met à jour les informations de l'inscription de nom $nom avec les nouvelles informations contenues dans $data.
	public function update($art_sal, $data) {
		$this->db->update('reservation', $data, $art_sal);
	}
	
	// Supprime l'inscription de nom $nom de la base de données
	public function remove($art_sal) {
		$this->db->delete('reservation', $art_sal);
	}

	// Renvoie vrai si le couple login/password existe, faux sinon
	// Peut aussi rechercher si un login seulement existe
	public function exist($nom) {
		$array['nom'] = $nom;
		$this->db->where($array);
		$this->db->from('reservation');
		return ($this->db->count_all_results() >= 1);
	}

}
