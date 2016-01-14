<?php
	$attributes = array(
		'id'	=>	'form_inscription',
	);
	echo form_open('inscription', $attributes);
?>

<form-group>
<?php
	$attributes = array(
		'id'	=>	'login',
		'name'	=>	'login',
		'value'	=>	set_value('login'),
		'placeholder' => 'Pseudo'
	);
	echo form_input($formdata);
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
	echo form_password($formdata);
	echo form_error('password'); 
?>
</form-group>
	
<form-group>
<?php
	$attributes = array(
		'id'	=>	'passconf',
		'name'	=>	'passconf',
		'value'	=>	set_value('passconf'),
		'placeholder' => 'Confirmation du mot de passe'
	);
	echo form_password($formdata);
	echo form_error('passconf'); 
?>
</form-group>

<?php 
echo form_submit('submit_inscription', 'S\'inscrire');
echo form_close();
