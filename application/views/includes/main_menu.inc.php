
<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">Festival des Transmusicales</a>
	</div>
	<ul class="nav navbar-nav">
		<?php if ($user_connected) : ?>
			<?php if ($atm_connected) : ?>
				<li><a href="<?php echo base_url("???"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Réservations en attente</a></li>
			<?php endif; ?>
		<?php else : ?>
			<?php if ($title == 'inscription') : ?>
				<li><a href="<?php echo base_url("connexion"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Connexion</a></li>
			<?php else : ?>
				<li><a href="<?php echo base_url("inscription"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Inscription</a></li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>
