<?php
	$tailleLabel = 4;
?>

<div class="container col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-star"></span> Étape 3 : Réserver !</span>
		</div>
		<div class="panel-body">
			<div class="col-md-10 col-md-offset-1">
				<?php echo form_open("salles/reserverSalle/$salle"); ?>

				<!-- Nom de la salle -->
				<?php 
					$critere = 'salle';
				?>
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
								'value'		=> $salle,
								'readonly' 	=> TRUE
							);
							echo form_input($attributes);
						?>
					</div>
				</div>

				<!-- Date de concert -->
				<?php $critere = 'date_concert'; ?>
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
								'value'		=> set_value($critere)
							);
							echo form_input($attributes);
						?>
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
					<span class="col-md-7 col-md-offset-<?php echo $tailleLabel ?>"><?php echo form_error($critere); ?></span>
				</div>

				<!-- Créneau horaire -->
				<?php $critere = 'heure_debut'; ?>
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
							echo form_dropdown($critere, $options, set_value($critere), $attributes);
						?>
					</div>
					<span class="col-md-7 col-md-offset-<?php echo $tailleLabel ?>"><?php echo form_error($critere); ?></span>
				</div>

				<!-- Bouton de validation -->
				<div class="form-group">
					<div class="col-md-<?php echo $tailleLabel ?>"></div>
					<div class="submit-container">
						<?php 
							$attributes = array(
								'id'		=> 'submitBooking',
								'class'		=> 'btn btn-primary',
								'value'		=> 'Réserver'
							);
							echo form_submit($attributes);
						?>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
