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
	foreach ($tableData as $num_row => $row) {
		foreach ($date_fields as $field_name) {
			$tableData[$num_row][$field_name] = date('d/m/Y', strtotime($row[$field_name]));
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
			<span class="panel-title"><span class="glyphicon glyphicon-list"></span> <?php echo $title; ?></span>
		</div>
		<table class="table table-bordered table-striped table-condensed">
			<tr>
				<?php foreach ($headings as $heading) : ?>
					<th><?php echo $heading; ?></th>
				<?php endforeach ?>
				<?php echo "<th></th><th></th>"; ?>
			</tr>
			<?php foreach ($tableData as $row) : ?>
				<tr id="reservation_<?php echo $row[0] ?>" class="trb">
					<?php foreach ($row as $fieldNum => $fieldValue) : ?>
						<td id="reservation_<?php echo $row[0].'_'.$fieldsMetadata[$fieldNum]['name'] ?>"><?php echo $fieldValue; ?></td>
					<?php endforeach ?>
					<td>
						<a href="<?php echo site_url()."/reservations/valider/".htmlspecialchars($row[0])."/".htmlspecialchars($row[2]) ?>">
							<button type="button" id="valider_<?php echo $row[0] ?>" class="btn btn-success btn-sm" data-dismiss="modal">Valider</button>
						</a>
					</td>
					<td><button type="button" id="valider_<?php echo $row[0] ?>" class="btn btn-danger btn-sm" data-dismiss="modal">Refuser</button></td>
				</tr>
			<?php endforeach ?>
		</table>
		<div class="panel-footer">
			<p class="help-block"><em>Total : <?php echo count($tableData); ?></em></p>
		</div>
	</div>
</div>