<?php
	$taille_label = 5
?>

<div class="container col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large">Rechercher une salle</span>
		</div>
		<div class="panel-body">
			<?php
				$attributes = array(
					'method'	=> 'GET'
				);
				echo form_open('salles', $attributes);
			?>
			<div class="form-group col-md-6">
				<!-- Nom de la salle -->
				<?php 
					$critere = 'nom'; 
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> 'control-label col-md-'.$taille_label,
						);
						echo form_label('Nom', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = array(
								'id'		=> $critere,
								'name'		=> $critere,
								'class'		=> 'form-control',
								'maxlength' => '60',
								'autofocus' => TRUE
							);
							echo form_input($attributes);
						?>
					</div>
				</div>


				<!-- Date de concert -->
				<?php
					$critere = 'date';
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> 'control-label col-md-'.$taille_label
						);
						echo form_label('Date', $critere, $attributes);
					?>
					<div class="input-group date col-md-7">
						<?php
							$attributes = array(
								'id'		=> $critere,
								'name'		=> $critere,
								'class'		=> 'form-control',
							);
							echo form_input($attributes);
						?>
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>

				
				<!-- Créneau horaire -->
				<?php
					$critere = 'creneau';
				?>
				<div class="form-goup">
					<?php
						$attributes = array(
							'class'		=> 'control-label col-md-'.$taille_label
						);
						echo form_label('Créneau horaire', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = array(
								'id'		=> $critere.'-debut',
								'name'		=> $critere.'-debut',
								'class'		=> 'form-control'
							);
							echo form_input($attributes);
							echo form_error($attributes['name']);
						?>
						<span class="input-group-addon"> - </span>
						<?php
							$attributes = array(
								'id'		=> $critere.'-fin',
								'name'		=> $critere.'-fin',
								'class'		=> 'form-control'
							);
							echo form_input($attributes);
						?>
					</div>
					<p class="help-block">ex: 19h - 23h</p>
				</div>
			</div>

			<div class="form-group col-md-6">
				<!-- Capacité -->
				<?php
					$critere = 'capacite';
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> 'control-label col-md-'.$taille_label
						);
						echo form_label('Capacité', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = 'class="form-control"';
							$options = array(
								'0'		=> 'Toutes',
								'1'		=> 'Moins de 100 places',
								'2'		=> 'Entre 100 et 500 places',
								'3'		=> 'Entre 500 et 1000 places',
								'4'		=> 'Plus de 1000 places'
							);
							echo form_dropdown($critere, $options, '0', $attributes);
						?>
					</div>
				</div>
					

				<!-- Accessibilité -->
				<?php
					$critere = 'acces_handicap';
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> 'control-label col-md-'.$taille_label
						);
						echo form_label('Accès handicap', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = array(
								'id'		=> $critere,
								'name'		=> $critere,
								'value'		=> 'true',
								'checked'	=> FALSE
							);
							echo form_checkbox($attributes);
						?>
					</div>
				</div>

				<!-- Bouton de validation -->
				<div class="form-group">
					<div class="col-md-<?php echo $taille_label ?>"></div>
					<div class="col-md-7 submit-container">
						<?php 
							$attributes = array(
								'name'		=> 'submit',
								'class'		=> 'btn btn-primary',
								'value'		=> 'Rechercher'
							);
							echo form_submit($attributes);
						?>
					</div>
				</div>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>
