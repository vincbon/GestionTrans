<?php
	$tailleLabel = 5
?>

<div class="container col-md-8 col-md-offset-2">
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
				<?php $critere = 'nom'; ?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel",
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
				<?php $critere = 'date'; ?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel"
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
				<?php $critere = 'creneau'; ?>
				<div class="form-goup">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel"
						);
						echo form_label('Créneau horaire', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = 'class="form-control"';
							$options = array(
								'-1'	=> 'Tous',
								'12'	=> '12h - 13h',
								'13'	=> '13h - 14h',
								'14'	=> '14h - 15h',
								'15'	=> '15h - 16h',
								'16'	=> '16h - 17h',
								'17'	=> '17h - 18h',
								'18'	=> '18h - 19h',
								'19'	=> '19h - 20h',
								'20'	=> '20h - 21h',
								'21'	=> '21h - 22h',
								'22'	=> '22h - 23h',
								'23'	=> '23h - 00h',
								'0'		=> '00h - 01h',
								'1'		=> '01h - 02h',
								'2'		=> '02h - 03h',
								'3'		=> '03h - 04h',
								'4'		=> '04h - 05h',
								'5'		=> '05h - 06h',
								'6'		=> '06h - 07h',
								'7'		=> '07h - 08h',
								'8'		=> '08h - 09h',
								'9'		=> '09h - 10h',
								'10'	=> '10h - 11h',
								'11'	=> '11h - 12h',
							);
							echo form_dropdown($critere, $options, '-1', $attributes);
						?>
					</div>
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
							'class'		=> "control-label col-md-$tailleLabel"
						);
						echo form_label('Capacité', $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = 'class="form-control"';
							$options = array(
								'toutes'	=> 'Toutes',
								'0_100'		=> 'Moins de 100 places',
								'100_500'	=> 'Entre 100 et 500 places',
								'500_1000'	=> 'Entre 500 et 1000 places',
								'1000+'		=> 'Plus de 1000 places'
							);
							echo form_dropdown($critere, $options, 'toutes', $attributes);
						?>
					</div>
				</div>

				<!-- Accès handicap -->
				<?php
					$critere = 'acces_handicap';
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel"
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
					<div class="col-md-<?php echo $tailleLabel ?>"></div>
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
