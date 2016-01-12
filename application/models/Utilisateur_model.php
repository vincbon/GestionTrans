<?php
class Utilisateur_model extends CI_Model {

	// Constructeur
	public function __construct() {
		$this->load->database();
	}
	
	
	// Renvoie les métadata de l'objet
	public function getFieldsMetaData() {
		foreach($this->db->field_data('utilisateur') as $num_field => $field) {
			$metadata[$num_field]['name'] = $field->name;
			$metadata[$num_field]['type'] = $field->type;
			$metadata[$num_field]['max_length'] = $field->max_length;
		}
		return $metadata;
	}
	
	
	// Renvoie un tableau comportant les données des utilisateurs répondant aux critères spécifiés.
	public function get($data_equal = null, $data_like = null, $orderby = 'login asc') {
		if ($data_equal != null) {
			$this->db->where($data_equal);
		}
		if ($data_like != null) {
			$this->db->like($data_like);
		}
		$this->db->order_by($orderby);
		return $this->db->get('utilisateur')->result_array();
	}


	// Renvoie vrai si le couple login/password existe, faux sinon
	// Peut aussi rechercher si un login seulement existe
	public function exist($login, $password = null) {
		if ($password != null) {
			$array['pass'] = $password;
		}
		$array['login'] = $login;
		$this->db->where($array);
		$this->db->from('utilisateur');
		return ($this->db->count_all_results() == 1);
	}
	
	
	// Ajoute un utilisateur avec les informations contenues dans $data.
	public function add($data) {
		$this->db->insert('utilisateur', $data);
	}


	// Met à jour les informations de l'utilisateur de login $login avec les nouvelles informations contenues dans $data.
	public function update($login, $data) {
		$this->db->update('utilisateur', $data, array('login' => $login));
	}


	// Supprime l'utilisateur de login $login
	public function delete($login) {
		$this->db->delete('utilisateur', array('login' => $login));
	}


	// Renvoie le nombre d'utilisateurs enregistrés
	public function count() {
		return $this->db->count_all('utilisateur');
	}

}

