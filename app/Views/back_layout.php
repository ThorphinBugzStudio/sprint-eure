<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?> - Sprint'Eure</title>
	<meta name="description" content="">
  <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/png" href="<?= $this->assetUrl('admin/img/icon-admin.png') ?>">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/dist/css/sb-admin-2.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/jquery-ui.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/hover.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/css/style.css') ?>">

</head>
<body>
		<header>
      <div id="wrapper">
          <!-- Navigation + Bouton de naviguation pour les appareils mobiles -->
          <nav class="navbar navbar-static-top navbar-admin" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Sprint'Eure</a>
            </div>

      	<div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

							<!-- Section : Retour sur le front -->
							<li>
								<a href="<?= $this->url('default_home') ?>"><i class="fa fa-reply fa-fw"></i> Retour sur le site </a>
							</li>
							<!-- Section : Dashboard -->
              <li>
                <a href="<?= $this->url('admin_dashboard') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
              </li>

							<!-- ===================================== -->
              <!-- 				Onglet : E-commerce 					 -->
							<!-- ===================================== -->
              <li class="separator">E-COMMERCE</li>

							<!-- Section : Boutique -->
              <li>
                <a href="#"><i class="fa fa-shopping-basket fa-fw"></i> Boutique<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="<?= $this->url('admin_items') ?>">Tous les produits</a></li>
                  <li><a href="<?= $this->url('admin_single_item_add') ?>">Ajouter un produit</a></li>
                </ul>
              </li>

							<!-- Section : Catégories -->
							<li>
								<a href="#"><i class="fa fa-file-text-o fa-fw"></i> Catégories<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="<?= $this->url('admin_items_families') ?>">Toutes les catégories</a></li>
									<li><a href="<?= $this->url('admin_items_families_add') ?>">Ajouter une catégorie</a></li>
								</ul>
							</li>

							<!-- Section : Commandes -->
              <li><a href="<?= $this->url('admin_orders') ?>"><i class="fa fa-shopping-cart fa-fw"></i> Commandes</a></li>

							<!-- ===================================== -->
							<!-- 					Onglet : Utilisateurs 						 -->
							<!-- ===================================== -->
							<li class="separator">UTILISATEURS</li>

							<!-- Section : Utilisateurs -->
							<li>
								<a href="<?= $this->url('admin_users') ?>"><i class="fa fa-user fa-fw"></i> Utilisateurs</a>
							</li>

							<!-- Section : Commentaires -->
							<li>
								<a href="<?= $this->url('admin_comments') ?>"><i class="fa fa-comment fa-fw"></i> Commentaires</a>
							</li>

							<!-- ===================================== -->
              <!-- 					Onglet : Divers 						 -->
							<!-- ===================================== -->
              <li class="separator">DIVERS</li>

							<!-- Section : Sliders -->
							<li>
								<a href="#"><i class="fa fa-play fa-fw"></i> Sliders<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="#">Tous les sliders</a></li>
									<li><a href="#">Ajouter</a></li>
								</ul>
							</li>

							<!-- Section : Paramètres -->
              <li>
              	<a href="#"><i class="fa fa-gears fa-fw"></i> Paramètres<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
										<li><a href="#">Paramètres</a></li>
                    <li><a href="#">Gérer le référencement</a></li>
                  </ul>
              </li>
          	</ul>
      	</div>
    	</div>
		</div>
	</nav>
</header>

		<section>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">» <?= $this->e($title) ?></h1>
          </div>

			 <div class="flash-message px-4">
			   <?php if(!empty($w_flash_message->message)) { ?>
			   	<span class="span-flash"><?= $w_flash_message->message ?></span>
		      <?php } ?>

		  	 </div>

        </div>
						<?= $this->section('main_content') ?>
				</div>
		</section>

		<footer>

		</footer>

  <script src="<?= $this->assetUrl('admin/vendor/jquery/jquery.min.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/jquery-ui.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/bootstrap/js/bootstrap.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/raphael/raphael.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/dist/js/sb-admin-2.js') ?>" charset="utf-8"></script>

</body>
</html>
