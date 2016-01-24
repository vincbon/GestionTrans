<?php
	$tailleLabel = 4;
?>

<div class="container col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-star"></span> <?php echo $this->lang->line('reservationSalle_step_3') ?></span>
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
						echo form_label($this->lang->line('reservationSalle_label_'.$critere), $critere, $attributes);
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
						echo form_label($this->lang->line('reservationSalle_label_'.$critere), $critere, $attributes);
					?>
					<div class="input-group <?php echo $user_language ?> date col-md-7">
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
						echo form_label($this->lang->line('reservationSalle_label_'.$critere), $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = 'class="form-control"';
							$options = array(
								'-1'	=> $this->lang->line('time_slot_all'),
								'12'	=> $this->lang->line('time_slot_12'),
								'13'	=> $this->lang->line('time_slot_13'),
								'14'	=> $this->lang->line('time_slot_14'),
								'15'	=> $this->lang->line('time_slot_15'),
								'16'	=> $this->lang->line('time_slot_16'),
								'17'	=> $this->lang->line('time_slot_17'),
								'18'	=> $this->lang->line('time_slot_18'),
								'19'	=> $this->lang->line('time_slot_19'),
								'20'	=> $this->lang->line('time_slot_20'),
								'21'	=> $this->lang->line('time_slot_21'),
								'22'	=> $this->lang->line('time_slot_22'),
								'23'	=> $this->lang->line('time_slot_23'),
								'0'		=> $this->lang->line('time_slot_0'),
								'1'		=> $this->lang->line('time_slot_1'),
								'2'		=> $this->lang->line('time_slot_2'),
								'3'		=> $this->lang->line('time_slot_3'),
								'4'		=> $this->lang->line('time_slot_4'),
								'5'		=> $this->lang->line('time_slot_5'),
								'6'		=> $this->lang->line('time_slot_6'),
								'7'		=> $this->lang->line('time_slot_7'),
								'8'		=> $this->lang->line('time_slot_8'),
								'9'		=> $this->lang->line('time_slot_9'),
								'10'	=> $this->lang->line('time_slot_10'),
								'11'	=> $this->lang->line('time_slot_11'),
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
								'value'		=> $this->lang->line('reservationSalle_label_submit')
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
