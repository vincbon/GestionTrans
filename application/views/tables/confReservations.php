<?php

foreach ($fieldsMetadata as $num_field => $field) {
	if ($field['type'] == 'boolean') {
		$bool_fields[] = $field['name'];
	} else if ($field['type'] == 'date') {
		$date_fields[] = $field['name'];
	}
}

if (isset($bool_fields) && !empty($bool_fields)) {
	foreach ($tableData as $num_row => $row) {
		foreach ($bool_fields as $field_name) {
			if ($row[$field_name] == 't') {
				$tableData[$num_row][$field_name] = $this->config->item('bool_display')['true'];
			} else {
				$tableData[$num_row][$field_name] = $this->config->item('bool_display')['false'];
			}
		}
	}
}

if (isset($date_fields) && !empty($date_fields)) {
	if ($user_language == 'en') {
		$dateFormat = 'm/d/Y';
	} else {
		$dateFormat = 'd/m/Y';
	}
	foreach ($tableData as $num_row => $row) {
		foreach ($date_fields as $field_name) {
			$tableData[$num_row][$field_name] = date($dateFormat, strtotime($row[$field_name]));
		}
	}
}

// Réinitialisation des index des données
$tableDataTmp = [];
foreach ($tableData as $rowNum => $row) {
	foreach ($row as $fieldValue) {
		$tableDataTmp[$rowNum][] = $fieldValue;
	}
}
$tableData = $tableDataTmp;
?>

<div class="container col-md-10 col-md-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= $this->lang->line('reservAttentes_panel_title') ?></span>
		</div>
		<?php if (empty($tableData)) : ?>
			<p class="message-empty-table"><?= $this->lang->line('common_msg_empty_table') ?></p>
		<?php else : ?>
			<table class="table table-bordered table-striped table-condensed">
				<tr>
					<?php for($i=0; $i < 6; $i++) : ?>
						<th><?= $this->lang->line('reservAttentes_heading_'.$i) ?></th>
					<?php endfor ?>
					<?php echo "<th colspan=2></th>"; ?>
				</tr>
				<?php foreach ($tableData as $row) : ?>
					<tr class="trb">
						<?php foreach ($row as $fieldNum => $fieldValue) : ?>
							<td><?php echo $fieldValue; ?></td>
						<?php endforeach ?>
						<td>
							<a href="<?php echo site_url()."/reservations/valider/".$row[0]."/".$row[2] ?>">
								<button type="button" id="valider_<?php echo $row[0] ?>" class="btn btn-success btn-sm"><?= $this->lang->line('reservAttentes_btn_valider') ?></button>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url()."/reservations/refuser/".$row[0]."/".$row[2] ?>">
								<button type="button" id="refuser_<?php echo $row[0] ?>" class="btn btn-danger btn-sm"><?= $this->lang->line('reservAttentes_btn_refuser') ?></button>
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		<?php endif; ?>
		<div class="panel-footer">
			<p class="help-block"><em>Total : <?= count($tableData); ?></em></p>
		</div>
	</div>
</div>