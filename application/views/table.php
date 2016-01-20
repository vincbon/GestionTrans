<?php
// Valeurs par défaut des variables $data
if (!isset($btnReserver)) $btnReserver = false;
if (!isset($object)) $object = null;
if (!isset($show_false)) $show_false = null;

// Récupération des champs spéciaux
foreach ($fields_metadata as $num_field => $field) {
	if ($field['type'] == 'boolean') {
		$bool_fields[] = $field['name'];
	} else if ($field['type'] == 'date') {
		$date_fields[] = $field['name'];
	}
}

// Traitement des champs "booléen" pour afficher une icône
if (isset($bool_fields) && !empty($bool_fields)) {
	foreach ($array_data as $num_row => $row) {
		foreach ($bool_fields as $field_name) {
			if ($row[$field_name] == 't') {
				$array_data[$num_row][$field_name] = $this->config->item('bool_display')['true'];
			} else {
				$array_data[$num_row][$field_name] = $this->config->item('bool_display')['false'];
			}
		}
	}
}

// Traitement des champs "date" pour afficher au bon format
if (isset($date_fields) && !empty($date_fields)) {
	foreach ($array_data as $num_row => $row) {
		foreach ($date_fields as $field_name) {
			$array_data[$num_row][$field_name] = date('d/m/Y', strtotime($row[$field_name]));
		}
	}
}

// Sauvegarde des données de $_GET pour le tri
$get_save = '';
foreach ($_GET as $id => $val) {
	if ($id != 'o') $get_save .= '&'.$id.'='.$val;
}

// Réinitialisation des index des données
$array_data_tmp = [];
foreach ($array_data as $num_row => $row) {
	foreach ($row as $value) {
		$array_data_tmp[$num_row][] = $value;
	}
}
$array_data = $array_data_tmp;

?>

<div class="container col-md-10 col-md-offset-1">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title clearfix large"><span class="glyphicon glyphicon-list"></span> <?php echo $title; ?></span>
		</div>
		<table class="table table-bordered table-striped table-condensed">
			<!-- Titres -->
			<tr>
				<?php foreach ($array_headings as $field => $heading) : ?>
					<th>
						<a href="<?php echo base_url().$this->router->fetch_class()."?o=".$field.$get_save; ?>" style="color:black">
							<?php 
								echo $heading;
								if (isset($_GET['o']) && $_GET['o'] == $field) {
									echo '<span class="fa fa-caret-up pull-right"></span>';
								}
							?>
						</a>
					</th>
				<?php endforeach ?>
				<?php
					if ($array_data != []) {
						if ($btnReserver) {
							echo "<th></th>";
						}
					}
				?>
			</tr>
			
			<!-- Données -->
			<?php foreach ($array_data as $num_row => $row) : ?>
				<tr id="<?php echo $object.'_'.$row[0] ?>" class="trb <?php if (isset($rows_false) && in_array($row, $rows_false, true)) echo 'danger' ?>">
					<?php foreach ($row as $num_field => $value) : ?>
						<td id="<?php echo $object.'_'.$row[0].'_'.$fields_metadata[$num_field]['name'] ?>"><?php echo $value; ?></td>
					<?php endforeach ?>
					
					<!-- Bouton de réservation d'une salle -->
					<?php if ($btnReserver) : ?>
						<td>
							<button type="button" id="reserver_<?php echo $object.'_'.$row[0] ?>" class="btn btn-success btn-sm" data-dismiss="modal">Réserver</button>
						</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		</table>
		<div class="panel-footer">
			<p class="help-block"><em>Résultats trouvés : <?php echo count($array_data); ?></em></p>
		</div>
	</div>
</div>
