<?php
	$attributes = array(
		'method'	=> 'GET'
	);
	echo form_open('salles', $attributes);

	// Nom de la salle
	$critere = 'nom';
	if (isset($old_data[$critere])) {
		$contenuCritere = $old_data[$critere];
	}
	echo form_label('Nom', $critere);
	$attributes = array(
		'id'		=> $critere,
		'name'		=> $critere,
		'maxlength' => '60'
	);
	echo form_input($attributes);
	
	
	// Date de concert
	$critere = 'date';
	if (isset($old_data[$critere])) {
		$contenuCritere = $old_data[$critere];
	}
	echo form_label('Date', $critere);
	$attributes = array(
		'id'		=> $critere,
		'name'		=> $critere
	);
	echo form_input($attributes);
	
	
	// Créneau horaire
	$critere = 'creneau';
	if (isset($old_data[$critere])) {
		$contenuCritere = $old_data[$critere];
	}
	echo form_label('Créneau horaire', $critere);
	$attributes = array(
		'id'		=> $critere,
		'name'		=> $critere,
	);
	echo form_input($attributes);
	
	
	// Capacité
	$critere = 'capacite';
	if (isset($old_data[$critere])) {
		$contenuCritere = $old_data[$critere];
	}
	echo form_label('Capacité', $critere);
	$attributes = array(
		'id'		=> $critere,
		'name'		=> $critere,
	);
	echo form_input($attributes);
	
	
	// Accessibilité
	$critere = 'accessibilite';
	if (isset($old_data[$critere])) {
		$contenuCritere = $old_data[$critere];
	}
	echo form_label('Accessibilité', $critere);
	$attributes = array(
		'id'		=> $critere,
		'name'		=> $critere,
		'value'		=> 'true',
		'checked'	=> FALSE
	);
	echo form_checkbox($attributes);
	
	
	// Bouton de recherche
	echo form_submit('submit', 'Rechercher');
	
	echo form_close();
