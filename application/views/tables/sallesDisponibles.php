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
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-th-list"></span> Étape 2 : Sélectionner une salle disponible</span>
		</div>
		<?php if (count($tableData) == 0) : ?>
			<div class="panel-body">
				<p id="noResultFound">Aucun résultat correspondant à votre recherche n'a été trouvé.</p>
			</div>
		<?php else : ?>
			<table class="table table-bordered table-striped table-condensed">
				<tr>
					<?php foreach ($headings as $heading) : ?>
						<th><?php echo $heading; ?></th>
					<?php endforeach ?>
					<?php echo "<th></th>"; ?>
				</tr>
				<?php foreach ($tableData as $row) : ?>
					<tr class="trb">
						<?php foreach ($row as $fieldNum => $fieldValue) : ?>
							<td><?php echo $fieldValue; ?></td>
						<?php endforeach ?>
						<td>
							<?php $salle = urlencode(str_replace(" ", "_", $row[0])); ?>
							<a href="<?php echo base_url("index.php/salles/reserverSalle/$salle") ?>">
								<button type="button" class="btn btn-success btn-sm">Réserver</button>
							</a>
						</a>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		<?php endif ?>
	</div>
</div>
