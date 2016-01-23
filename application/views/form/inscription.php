<div id="inscription_container" class="container col-md-offset-1 col-md-10">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title">Inscription artiste/groupe</span>
		</div>
		<div class="panel-body">
			<?php 
			$attributes = array(
				'id'	=>	'inscription_form',
				'class' =>	'col-md-offset-2 col-md-8',
			);
			echo form_open('inscription', $attributes);

			$label_size = 'col-md-5';
			$label_offset = 'col-md-offset-5'; 
			?>
			
			<fieldset>
				<legend>Contact</legend>
				<div class="row form-group">
					<?php
					$input_name = 'nom';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Nom', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>

					<div class="<?php echo $label_offset ?>">
						<?php if (isset($username_taken)) : ?>
							<div class="message-error">
								<?php echo $this->lang->line('error_username_taken'); ?>
							</div>
						<?php else : ?>
							<?php echo form_error($input_name); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="row form-group">
					<?php
					$input_name = 'mail';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Adresse mail', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
						'type'	=>	'email',
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
				
				<div class="row form-group">
					<?php
					$input_name = 'site_web';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Site web', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
						'type'	=>	'url',
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Historique</legend>
				<div class="row form-group">
					<?php
					$input_name = 'origine';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Pays d\'origine', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
				
				<div class="row form-group">
					<?php
					$input_name = 'date_debut';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Date de début', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Détails</legend>
				<div class="row form-group">
					<?php
					$input_name = 'formation';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Formation', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
				
				<div class="row form-group">
					<?php
					$input_name = 'genre';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Genre', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
				
				<div class="row form-group">
					<?php
					$input_name = 'parentes';
					
					$attributes = array(
						'class'	=>	'control-label label-required '.$label_size,
					);
					echo form_label('Parentés', $input_name, $attributes);
					$attributes = array(
						'id'	=>	$input_name,
						'name'	=>	$input_name,
						'value'	=>	set_value($input_name),
					);
					echo form_input($attributes);
					?>
					<div class="<?php echo $label_offset ?>">
						<?php echo form_error($input_name); ?>
					</div>
				</div>
			</fieldset>

			<div class="row form-group">
				<?php
				$attributes = array(
					'id'	=>	'submit_connexion',
					'class'	=>	'btn btn-primary '.$label_offset,
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
