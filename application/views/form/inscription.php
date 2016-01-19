<div id="inscription_container" class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title">Inscription artiste/groupe</span>
		</div>
		<div class="panel-body">
			<?php 
			$attributes = array(
				'id'	=>	'inscription_form',
				'class' =>	'col-md-offset-2 col-md-5',
			);
			echo form_open('inscription', $attributes); 
			?>
			
			<fieldset>
				<legend>Contact</legend>
				<div class="form-group">
					<?php
					$input_name = 'nom';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Nom', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'mail';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Adresse mail', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'site_web';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Site web', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Historique</legend>
				<div class="form-group">
					<?php
					$input_name = 'origine';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Pays d\'origine', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'date_debut';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Date de formation', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'discographie';
					
					$attributes = array(
						'class'	=>	'control-label',
					);
					echo form_label('Discographie', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Détails</legend>
				<div class="form-group">
					<?php
					$input_name = 'formation';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Formation', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'genre';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Genre', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'elements_principaux';
					
					$attributes = array(
						'class'	=>	'control-label',
					);
					echo form_label('Eléments principaux', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'elements_ponctuels';
					
					$attributes = array(
						'class'	=>	'control-label',
					);
					echo form_label('Eléments ponctuels', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'parentes';
					
					$attributes = array(
						'class'	=>	'control-label label-required',
					);
					echo form_label('Parentés', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Médias</legend>
				<div class="form-group">
					<?php
					$input_name = 'photos';
					
					$attributes = array(
						'class'	=>	'control-label',
					);
					echo form_label('Photos', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
				
				<div class="form-group">
					<?php
					$input_name = 'videos';
					
					$attributes = array(
						'class'	=>	'control-label',
					);
					echo form_label('Vidéos', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					echo form_error($input_name);
					?>
				</div>
			</fieldset>

			<div class="form-group">
				<?php
				$attributes = array(
					'id'	=>	'submit_connexion',
					'class'	=>	'btn btn-primary',
					'value'	=>	'Inscription',
				);
				echo form_submit($attributes);
				?>
			</div>
			
			<?php echo form_close(); ?>
		</div>
		<div class="panel-footer">
			<p class="help-block"><em>(*) : champs obligatoire</em></p>
		</div>
	</div>
</div>
