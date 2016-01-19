
<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo site_url(); ?>">Les Rencontres Trans Musicales</a>
	</div>
	<ul id="menu-app" class="nav navbar-nav">
		<?php if ($user_connected) : ?>
			<?php if ($atm_connected) : ?>
				<li><a href="<?php echo site_url("???"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Réservations en attente</a></li>
			<?php else : ?>
			
			<?php endif; ?>
		<?php else : ?>
		
		<?php endif; ?>
	</ul>
	<ul id="menu-user" class="nav navbar-nav pull-right">
		<?php if ($user_connected) : ?>
			<li><?php echo $user_login ?></li>
			<li><a href="<?php echo site_url("connexion/logout"); ?>"><i class="fa fa-power-off"></i></a></li>
		<?php else : ?>
			<?php if ($this->router->fetch_class() == "inscription") : ?>
				<li><a href="<?php echo site_url("connexion"); ?>">Connexion</a></li>
			<?php else : ?>
				<li><a href="<?php echo site_url("inscription"); ?>">Inscription</a></li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>
