<div id="connexion_container" class="container col-md-offset-4 col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title">Bienvenue !</span>
		</div>
		<div class="panel-body">
			<?php 
			$attributes = array(
				'id'	=>	'connexion_form',
			);
			echo form_open('connexion', $attributes); 
			?>
			
			<div class="form-group">
				<?php
				$input_name = 'login';
				
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	set_value($input_name),
					'placeholder' => 'Pseudo',
				);
				echo form_input($attributes);
				echo form_error($input_name);
				?>
			</div>
			
			<div class="form-group">
				<?php
				$input_name = 'password';
				
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'placeholder' => 'Mot de passe',
				);
				echo form_password($attributes);
				echo form_error($input_name);
				?>
			</div>
			
			<?php if (isset($user_unknown)) : ?>
				<div class="message-error"><?php echo $this->lang->line('error_user_unknown'); ?></div>
			<?php endif; ?>

			<div class="form-group">
				<?php
				$attributes = array(
					'id'	=>	'submit_connexion',
					'class'	=>	'btn btn-primary',
					'value'	=>	'Connexion',
				);
				echo form_submit($attributes);
				?>
			</div>
			
			<?php echo form_close(); ?>
		</div>
		<div class="panel-footer">
			<p class="help-block"><em>Pas encore inscrit ? <a href="<?php echo site_url("inscription"); ?>" >S'inscrire</a></em></p>
			<p class="help-block"><em>Mot de passe oublié ? <a href="<?php echo site_url(); ?>" >Cliquez-ici</a></em></p>
		</div>
	</div>
</div>
