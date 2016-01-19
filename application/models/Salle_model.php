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
	public function get($data_equal = null, $data_like = null, $order_by = 'id') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		$this->db->order_by($orderby, 'ASC');
		return $this->db->get('salle');
	}
	
	// Renvoie le nombre de salles enregistrées
	public function count() {
		return $this->db->count_all('salle');
	}
}
