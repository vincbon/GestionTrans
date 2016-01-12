<div class="panel panel-primary">
	<div class="panel-heading">
		<span class="panel-title clearfix large"><?php echo $title; ?></span>
	</div>
	<table class="table table-bordered table-striped table-condensed">
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
		</tr>
		<?php foreach ($array_data as $num_row => $row) : ?>
			<tr id="<?php echo $object.'_'.$row[0] ?>" class="trb <?php if (isset($rows_false) && in_array($row, $rows_false, true)) echo 'danger' ?>">
				<?php foreach ($row as $num_field => $value) : ?>
					<td id="<?php echo $object.'_'.$row[0].'_'.$fields_metadata[$num_field]['name'] ?>"><?php echo $value; ?></td>
				<?php endforeach ?>
				<?php if ($btnSelect) : ?>
					<td>
						<button type="button" id="select_<?php echo $object.'_'.$row[0] ?>" class="btn btn-success btn-sm" data-dismiss="modal">Selectionner</button>
					</td>
				<?php endif ?>

				<?php if ($btnModif) : ?>
					<td>
						<a href="<?php echo base_url().$this->router->fetch_class()."/modifier/".$row[0] ?>">
							<button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
						</a>
					</td>
				<?php endif ?>
				<?php if ($btnInfos) : ?>
					<td>
						<button type="button" id="pop_<?php echo $object.'.'.$row[0] ?>" class="btn btn-info btn-sm" data-toggle="popover"
								title="<h4>Informations compl&eacute;mentaires</h4>" data-html="true" data-content="<?php echo scriptMiscInfos($miscInfos[$row[0]]); ?>">
								<span class="glyphicon glyphicon-info-sign"></span>
						</button>
					</td>
				<?php endif ?>
			</tr>
		<?php endforeach ?>
	</table>
	<div class="panel-footer">
		<p class="help-block"><em>Nombre d'enregistrements : <?php echo count($array_data); ?></em></p>
	</div>
</div>
