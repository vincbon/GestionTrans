<?php
	$tailleLabel = 5;
?>

<div class="container col-md-10 col-md-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-search"></span> <?php echo $this->lang->line('rechercheSalle_step_1') ?></span>
		</div>
		<div class="panel-body">
			<?php
				$attributes = array(
					'method'	=> 'GET'
				);
				echo form_open('salles', $attributes);
			?>
			<div class="form-group col-md-5 col-md-offset-1">
				<!-- Nom de la salle -->
				<?php $critere = 'nom'; ?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel",
						);
						echo form_label($this->lang->line('rechercheSalle_label_'.$critere), $critere, $attributes);
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
						echo form_label($this->lang->line('rechercheSalle_label_'.$critere), $critere, $attributes);
					?>
					<div class="input-group <?php echo $user_language ?> date col-md-7">
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
						echo form_label($this->lang->line('rechercheSalle_label_'.$critere), $critere, $attributes);
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
							echo form_dropdown($critere, $options, '-1', $attributes);
						?>
					</div>
				</div>
			</div>

			<div class="form-group col-md-5">
				<!-- Capacité -->
				<?php
					$critere = 'capacite';
				?>
				<div class="form-group">
					<?php
						$attributes = array(
							'class'		=> "control-label col-md-$tailleLabel"
						);
						echo form_label($this->lang->line('rechercheSalle_label_'.$critere), $critere, $attributes);
					?>
					<div class="input-group col-md-7">
						<?php
							$attributes = 'class="form-control"';
							$options = array(
								'toutes'	=> $this->lang->line('rechercheSalle_capacite_1'),
								'0_100'		=> $this->lang->line('rechercheSalle_capacite_2'),
								'100_500'	=> $this->lang->line('rechercheSalle_capacite_3'),
								'500_1000'	=> $this->lang->line('rechercheSalle_capacite_4'),
								'1000+'		=> $this->lang->line('rechercheSalle_capacite_5')
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
						echo form_label($this->lang->line('rechercheSalle_label_'.$critere), $critere, $attributes);
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
					<div class="submit-container">
						<?php 
							$attributes = array(
								'class'		=> 'btn btn-primary',
								'value'		=> $this->lang->line('rechercheSalle_label_submit')
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
