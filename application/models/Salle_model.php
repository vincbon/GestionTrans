<?php
class Salle_model extends CI_Model {
	
	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	// Renvoie un array contenant les noms des champs de la vue Salle
	public function getFields() {
		return $this->db->list_fields('salle');
	}
	
	// Renvoie un array contenant des informations supplémentaires sur les champs
	public function getFieldsMetaData() {
		foreach ($this->db->field_data('salle') as $num_field => $field) {
			$metadata[$num_field]['name'] = $field->name;
			$metadata[$num_field]['type'] = $field->type;
		}
		return $metadata;
	}
	
	// Renvoie un array contenant les données des salles répondant aux critères spécifiés
	public function get($data_equal = null, $data_like = null, $select = null, $order_by = 'nom') {
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
		return $this->db->get('salle')->result_array();
	}

	// Renvoie un array contenant les données des salles répondant aux critères spécifiés
	public function getTemp($salles, $capaciteMin, $capaciteMax) {
		$newSalles = array();

		foreach ($salles as $salle) {
			$this->db->where(array('nom' => $salle['nom'], 'capacite >' => $capaciteMin));
			if ($capaciteMax != null) {
				$this->db->where('capacite <', $capaciteMax);
			}
			$this->db->from('salle');
			if ($this->db->count_all_results() == 1) {
				$newSalles[] = $salle;
			}
		}

		return $newSalles;
	}

	// Renvoie les coordonnées de la salle.
	public function getCoordonnees($nomSalle) {
		$this->db->where('nom', $nomSalle);
		$this->db->select('adresse, ville, code_postal');
		return $this->db->get('salle')->row_array();
	}

	// Renvoie les informations du responsable de la salle.
	public function getResponsable($nomSalle) {
		$this->db->where('nom', $nomSalle);
		$this->db->select('id_resp');
		$idResp = $this->db->get('salle')->row_array();

		$this->db->where('id_resp', $idResp['id_resp']);
		return $this->db->get('responsable')->row_array();
	}
	
	// Renvoie le nombre de salles enregistrées
	public function count() {
		return $this->db->count_all('salle');
	}
}
