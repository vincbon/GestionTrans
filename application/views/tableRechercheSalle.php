<?php
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
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-list"></span> <?php echo $title; ?></span>
		</div>
		<table class="table table-bordered table-striped table-condensed">
			<tr>
				<?php foreach ($headings as $heading) : ?>
					<th><?php echo $heading; ?></th>
				<?php endforeach ?>
				<?php echo "<th></th>"; ?>
			</tr>
			<?php foreach ($tableData as $row) : ?>
				<tr id="salle_<?php echo $row[0] ?>" class="trb">
					<?php foreach ($row as $fieldNum => $fieldValue) : ?>
						<td id="salle_<?php echo $row[0].'_'.$fieldsMetaData[$fieldNum]['name'] ?>"><?php echo $fieldValue; ?></td>
					<?php endforeach ?>
					<td>
						<button type="button" id="reserver_salle_<?php echo $row[0] ?>" class="btn btn-success btn-sm" data-dismiss="modal">Réserver</button>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<div class="panel-footer">
			<p class="help-block"><em>Résultats trouvés : <?php echo count($tableData); ?></em></p>
		</div>
	</div>
</div>
