<?php
class Reservation_model extends CI_Model {

	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	// Renvoie un array contenant les noms des champs de Reservation
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
	
	// Renvoie un array contenant les données des réservations répondant aux critères spécifiés
	public function get($data_equal = null, $data_like = null, $select, $order_by = 'date_reservation') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		if ($select != null) {
			$this->db->select($select);
		}
		$this->db->order_by($order_by, 'ASC');
		return $this->db->get('reservation')->result_array();
	}

	// Retourne les salles libres à la date et horaire fournies.
	public function getFree($salles, $date, $heureDebut) {
		$sallesLibres = array();

		foreach ($salles as $salle) {
			$this->db->where(array('salle' => $salle['nom'], 'date_concert' => $date, 'heure_debut' => $heureDebut));
			$this->db->from('reservation');
			if ($this->db->count_all_results() == 0) {
				$sallesLibres[] = $salle;
			}
		}

		return $sallesLibres;
	}
	
	// Ajoute une réservation dans la base de données avec les informations contenues dans $data.
	public function add($data) {
		$this->db->insert('reservation', $data);
	}
}
