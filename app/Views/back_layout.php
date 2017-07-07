<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?> - Sprint'Eure</title>
	<meta name="description" content="">
  <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/png" href="">

  <link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/dist/css/sb-admin-2.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/font-awesome/css/font-awesome.min.css') ?>">
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
              <a class="navbar-brand" href="index.html">Sprint'Eure</a>
            </div>

      	<div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

							<!-- Section : Dashboard -->
              <li>
                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
              </li>

							<!-- ===================================== -->
              <!-- 					Onglet : Accueil 						 -->
							<!-- ===================================== -->
              <li class="separator">ACCUEIL</li>

							<!-- Section : Catégories -->
							<li>
                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Catégories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="<?= $this->url('admin_items_families') ?>">Toutes les catégories</a></li>
									<li><a href="#">Ajouter</a></li>
                </ul>
              </li>

							<!-- Section : Commentaires -->
							<li>
                <a href="#"><i class="fa fa-comment fa-fw"></i> Commentaires<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="<?= $this->url('admin_comments') ?>">Tous les commentaires</a></li>
                </ul>
              </li>

							<!-- Section : Sliders -->
              <li>
                <a href="#"><i class="fa fa-play fa-fw"></i> Sliders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="#">Tous les sliders</a></li>
                  <li><a href="#">Ajouter</a></li>
                </ul>
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
                  <li><a href="#">Ajouter un produit</a></li>
                </ul>
              </li>

							<!-- Section : Commandes -->
              <li><a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Commandes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="<?= $this->url('admin_orders') ?>">Toutes les commandes</a></li>
                  <li><a href="#">Gérer les devis</a></li>
                </ul>
              </li>

							<!-- ===================================== -->
              <!-- 					Onglet : Divers 						 -->
							<!-- ===================================== -->
              <li class="separator">DIVERS</li>

							<!-- Section : Utilisateurs -->
							<li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Utilisateurs<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li><a href="<?= $this->url('admin_users') ?>">Tous les utilisateurs</a></li>
                  <li><a href="#">Ajouter</a></li>
									<li><a href="#">Votre profil</a></li>
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
        </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-bar-chart-o fa-fw"></i> Titre de l'onglet
                </div>
                <div class="p-3">
                  <p>Test</p>
                </div>
              </div>
            </div>
						<?= $this->section('main_content') ?>
          </div>
				</div>
		</section>

		<footer>

		</footer>

  <script src="<?= $this->assetUrl('admin/vendor/jquery/jquery.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/bootstrap/js/bootstrap.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/raphael/raphael.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/dist/js/sb-admin-2.js') ?>" charset="utf-8"></script>
</body>
</html>
