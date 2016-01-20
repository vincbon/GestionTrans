<?php
class Artiste_model extends CI_Model {

	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	
	// Renvoie les métadata de l'objet
	public function getFieldsMetaData() {
		foreach($this->db->field_data('artiste') as $num_field => $field) {
			$metadata[$num_field]['name'] = $field->name;
			$metadata[$num_field]['type'] = $field->type;
			$metadata[$num_field]['max_length'] = $field->max_length;
		}
		return $metadata;
	}
	
	
	// Renvoie un tableau comportant les données des artistes répondant aux critères spécifiés.
	public function get($data_equal = null, $data_like = null, $orderby = 'login asc') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		$this->db->order_by($orderby);
		return $this->db->get('artiste')->result_array();
	}


	// Renvoie vrai si le couple login/nom existe, faux sinon
	// Peut aussi rechercher si un login ou un nom seulement existe
	public function exist($login, $nom = null) {
		if ($nom != null) $array['nom'] = $nom;
		if ($login != null) $array['login'] = $login;
		$this->db->where($array);
		$this->db->from('artiste');
		return ($this->db->count_all_results() >= 1);
	}
	
	
	// Ajoute un artiste avec les informations contenues dans $data.
	public function add($data) {
		$this->db->insert('artiste', $data);
	}


	// Met à jour les informations de l'artiste de login $login avec les nouvelles informations contenues dans $data.
	public function update($login, $data) {
		$this->db->update('artiste', $data, array('login' => $login));
	}


	// Supprime l'artiste de login $login
	public function delete($login) {
		$this->db->delete('artiste', array('login' => $login));
	}


	// Renvoie le nombre d'artistes enregistrés
	public function count() {
		return $this->db->count_all('artiste');
	}

}