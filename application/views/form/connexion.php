<?php 
	$attributes = array(
		'id'	=>	'form_connexion',
	);
	echo form_open('connexion', $attributes); 
?>

<form-group>
<?php
	$attributes = array(
		'id'	=>	'login',
		'name'	=>	'login',
		'value'	=>	set_value('login'),
		'placeholder' => 'Pseudo'
	);
	echo form_input($attributes);
	echo form_error('login');
?>
</form-group>

<form-group>
<?php
	$attributes = array(
		'id'	=>	'password',
		'name'	=>	'password',
		'value'	=>	set_value('password'),
		'placeholder' => 'Mot de passe'
	);
	echo form_password($attributes);
	echo form_error('password');
?>
</form-group>

<?php
echo form_submit('submit_connexion', 'Se connecter');
echo form_close();
