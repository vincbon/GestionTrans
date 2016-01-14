<?php
	$attributes = array(
		'method'	=> 'GET'
	);
	echo form_open('salles', $attributes);
?>
<div class="form-group col-md-4">
	<!-- Nom de la salle -->
	<?php
		$critere = 'nom';
		if (isset($old_data[$critere])) {
			$contenuCritere = $old_data[$critere];
		}
	?>
	<div class="form-group">
		<?php
			$attributes = array(
				'class'		=> 'col-md-4 control-label',
			);
			echo form_label('Nom', $critere, $attributes);
		?>
		<div class="col-md-4 input-group">
			<?php
				$attributes = array(
					'id'		=> $critere,
					'name'		=> $critere,
					'class'		=> 'form-control',
					'maxlength' => '60',
					'autofocus' => TRUE
				);
				echo form_input($attributes);
				echo form_error($attributes['name']);
			?>
		</div>
	</div>


	<!-- Date de concert -->
	<?php
		$critere = 'date';
		if (isset($old_data[$critere])) {
			$contenuCritere = $old_data[$critere];
		}
	?>
	<div class="form-group">
		<?php
			$attributes = array(
				'class'		=> 'col-md-4 control-label'
			);
			echo form_label('Date', $critere, $attributes);
		?>
		<div class="col-md-4 input-group">
			<?php
				$attributes = array(
					'id'		=> $critere,
					'name'		=> $critere,
					'class'		=> 'form-control'
				);
				echo form_input($attributes);
				echo form_error($attributes['name']);
			?>
			<div class="input-group-btn">
				<?php
					$attributes = array(
						'id'		=> $critere.'-btn',
						'name'		=> $critere.'-btn',
						'class'		=> 'btn btn-default',
						'content'	=> 'Date'
					);
					echo form_button($attributes);
				?>
			</div>
		</div>
	</div>

	
	<!-- Créneau horaire -->
	<?php
		$critere = 'creneau';
		if (isset($old_data[$critere])) {
			$contenuCritere = $old_data[$critere];
		}
	?>
	<div class="form-goup">
		<?php
			$attributes = array(
				'class'		=> 'col-md-4 control-label'
			);
			echo form_label('Créneau horaire', $critere, $attributes);
		?>	
		<div class="col-md-4 input-group">
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
				echo form_error($attributes['name']);
			?>
		</div>
		<p class="help-block">ex: 19h - 23h</p>
	</div>
</div>

<div class="form-group col-md-4">
	<!-- Capacité -->
	<?php
		$critere = 'capacite';
		if (isset($old_data[$critere])) {
			$contenuCritere = $old_data[$critere];
		}
	?>
	<div class="form-group">
		<?php
			$attributes = array(
				'class'		=> 'col-md-4 control-label'
			);
			echo form_label('Capacité', $critere, $attributes);
		?>
		<div class="col-md-4 input-group">
			<?php
				$attributes = array(
					'id'		=> $critere,
					'name'		=> $critere,
					'class'		=> 'form-control'
				);
				echo form_input($attributes);
				echo form_error($attributes['name']);
			?>
		</div>
	</div>
		

	<!-- Accessibilité -->
	<?php
		$critere = 'accessibilite';
		if (isset($old_data[$critere])) {
			$contenuCritere = $old_data[$critere];
		}
	?>
	<div class="form-group">
		<?php
			$attributes = array(
				'class'		=> 'col-md-4 control-label'
			);
			echo form_label('Accessibilité', $critere, $attributes);
		?>
		<div class="col-md-4 input-group">
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
		<div class="col-md-4"></div>
		<div class="col-md-4">
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
