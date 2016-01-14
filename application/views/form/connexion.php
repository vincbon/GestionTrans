<div class="container col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large">Connexion</span>
		</div>
		<div class="panel-body">
			<?php 
			$attributes = array(
				'id'	=>	'form_connexion',
			);
			echo form_open('connexion', $attributes); 
			?>
			
			<div class="form-group">
				<?php
				$attributes = array(
					'id'	=>	'login',
					'name'	=>	'login',
					'value'	=>	set_value('login'),
					'placeholder' => 'Pseudo',
				);
				echo form_input($attributes);
				echo form_error('login');
				?>
			</div>
			
			<div class="form-group">
				<?php
				$attributes = array(
					'id'	=>	'password',
					'name'	=>	'password',
					'value'	=>	set_value('password'),
					'placeholder' => 'Mot de passe',
				);
				echo form_password($attributes);
				echo form_error('password');
				?>
			</div>
			
			<div class="form-group">
				<?php
				$attributes = array(
					'id'	=>	'submit_connexion',
					'class'	=>	'btn btn-primary',
					'value'	=>	'Se connecter',
				);
				echo form_submit($attributes);
				?>
			</div>
			
			<?php echo form_close(); ?>
		</div>
		<div class="panel-footer">
			<p class="help-block"><em>Pas encore inscrit ? <a href="<?php echo site_url("inscription"); ?>" >S'inscrire</a></em></p>
		</div>
	</div>
</div>
