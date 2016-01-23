
<div id="menu" class="container">
	<ul id="menu_lang" class="nav navbar-nav">
		<li><a href="<?php echo site_url("accueil/lang/fr") ?>">FR</a></li>
		<li><a href="<?php echo site_url("accueil/lang/en") ?>">EN</a></li>
	</ul>
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo site_url(); ?>">Les Rencontres Trans Musicales</a>
	</div>
	<ul id="menu-app" class="nav navbar-nav">
		<?php if ($user_connected) : ?>
			<?php if ($atm_connected) : ?>

			<?php else : ?>
			
			<?php endif; ?>
		<?php else : ?>
		
		<?php endif; ?>
	</ul>
	<ul id="menu-user" class="nav navbar-nav pull-right">
		<?php if ($user_connected) : ?>
			<li id="user_pseudo"><?php 
				if ($user_login == 'atm') 
					echo $user_login;
				else 
					echo $this->Artiste_model->get(array('login' => $user_login))[0]['nom'];
				?>
			</li>
			<li id="btn-logout"><a href="<?php echo site_url("connexion/logout"); ?>"><i class="fa fa-power-off"></i></a></li>
		<?php else : ?>
			<?php if ($this->router->fetch_class() == "inscription") : ?>
				<li><a href="<?php echo site_url("connexion"); ?>"><?= $this->lang->line('menu_connexion') ?></a></li>
			<?php else : ?>
				<li><a href="<?php echo site_url("inscription"); ?>"><?= $this->lang->line('menu_inscription') ?></a></li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</div>
