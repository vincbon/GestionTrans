<?php
// Récupération des infos supplémentaires
$reservation = $this->Reservation_model->get(array('artiste' => $artiste, 'salle' => $salle))[0];
$date = $reservation['date_concert'];
if ($user_language == 'en') {
	$dateFormat = 'm/d/Y';
} else {
	$dateFormat = 'd/m/Y';
}
$date = date($dateFormat, strtotime($date));

if ($reservation['heure_debut'] == 23) {
	$creneau = $reservation['heure_debut']."h - 0h";
} else {
	$creneau = $reservation['heure_debut']."h - ".($reservation['heure_debut'] + 1)."h";
}

?>
<div id="refusReservation_container" class="container col-md-offset-2 col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= $this->lang->line('reservRefus_panel_title') ?></span>
		</div>
		<div class="panel-body">
			<?php 
			$attributes = array(
				'id'	=>	'refusReservation_form',
			);
			echo form_open(uri_string(), $attributes);

			$label_size = 'col-md-5';
			$label_offset = 'col-md-offset-5'; 
			?>

			<div class="row form-group">
				<?php
				$input_name = 'artiste';
				
				$attributes = array(
					'class'	=>	'control-label '.$label_size,
				);
				echo form_label($this->lang->line('reservRefus_label_'.$input_name), $input_name, $attributes);
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	$artiste,
					'disabled' => true,
				);
				echo form_input($attributes);
				?>
			</div>
			
			<div class="row form-group">
				<?php
				$input_name = 'salle';
				
				$attributes = array(
					'class'	=>	'control-label '.$label_size,
				);
				echo form_label($this->lang->line('reservRefus_label_'.$input_name), $input_name, $attributes);
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	$salle,
					'disabled' => true,
				);
				echo form_input($attributes);
				?>
			</div>

			<div class="row form-group">
				<?php
				$input_name = 'date';
				
				$attributes = array(
					'class'	=>	'control-label '.$label_size,
				);
				echo form_label($this->lang->line('reservRefus_label_'.$input_name), $input_name, $attributes);
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	$date,
					'disabled' => true,
				);
				echo form_input($attributes);
				?>
			</div>

			<div class="row form-group">
				<?php
				$input_name = 'creneau';
				
				$attributes = array(
					'class'	=>	'control-label '.$label_size,
				);
				echo form_label($this->lang->line('reservRefus_label_'.$input_name), $input_name, $attributes);
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	$creneau,
					'disabled' => true,
				);
				echo form_input($attributes);
				?>
			</div>
			
			<div class="row form-group">
				<?php
				$input_name = 'justificatif';
				
				$attributes = array(
					'class'	=>	'control-label label-required '.$label_size,
				);
				echo form_label($this->lang->line('reservRefus_label_'.$input_name), $input_name, $attributes);
				$attributes = array(
					'id'	=>	$input_name,
					'name'	=>	$input_name,
					'value'	=>	set_value($input_name),
				);
				echo form_textarea($attributes);
				?>
				<div class="<?php echo $label_offset ?>">
					<?php echo form_error($input_name); ?>
				</div>
			</div>

			<div class="row form-group">
				<?php
				$attributes = array(
					'id'	=>	'refusReservation_submit',
					'class'	=>	'btn btn-primary '.$label_offset,
					'value'	=>	$this->lang->line('reservRefus_btn_submit'),
				);
				echo form_submit($attributes);
				?>
				<a href="<?php echo site_url() ?>">
					<button type="button" class="btn btn-default"><?= $this->lang->line('reservRefus_btn_abort') ?></button>
				</a>
			</div>
			
			<?php echo form_close(); ?>
		</div>
		<div class="panel-footer">
			<p class="help-block"><em>(*) : <?= $this->lang->line('common_msg_required_field') ?></em></p>
		</div>
	</div>
</div>