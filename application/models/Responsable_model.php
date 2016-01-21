<?php
class Responsable_model extends CI_Model {
	
	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	// Renvoie un array contenant les noms des champs
	public function getFields() {
		return $this->db->list_fields('responsable');
	}
	
	// Renvoie un array contenant des informations supplémentaires sur les champs
	public function getFieldsMetaData() {
		foreach ($this->db->field_data('responsable') as $num_field => $field) {
			$metadata[$num_field]['name'] = $field->name;
			$metadata[$num_field]['type'] = $field->type;
		}
		return $metadata;
	}
	
	// Renvoie un array contenant les données des salles répondant aux critères spécifiés
	public function get($data_equal = null, $data_like = null, $order_by = 'nom') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		$this->db->order_by($order_by, 'ASC');
		return $this->db->get('responsable')->result_array();
	}
	
	// Renvoie le nombre de responsables enregistrés
	public function count() {
		return $this->db->count_all('responsable');
	}
}
