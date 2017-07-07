<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
  <meta name="" content="">

  <link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/bootstrap/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/dist/css/sb-admin-2.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('admin/vendor/morrisjs/morris.css') ?>">
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
                  <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li><a href="">Panneau d'administration</a></li>
                      <li><a href="">Voir le site</a></li>
                    </ul>
                  </li>

                  <!-- Onglet : Accueil -->
                  <li class="separator">ACCUEIL</li>

                  <li>
                      <a href="#"><i class="fa fa-play fa-fw"></i> Sliders<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li><a href="">Tous les sliders</a></li>
                        <li><a href="">Ajouter</a></li>
                      </ul>
                  </li>

                  <!-- Onglet : E-commerce -->
                  <li class="separator">COMMERCE</li>

                  <li>
                      <a href="#"><i class="fa fa-shopping-basket fa-fw"></i> Vitrine<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li><a href="">Tous les produits</a></li>
                        <li><a href="">Ajouter</a></li>
                      </ul>
                  </li>

                  <li><a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Commandes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li><a href="">Toutes les commandes</a></li>
                      <li><a href="">Gérer les devis</a></li>
                    </ul>
                  </li>

                  <!-- Onglet : Divers -->
                  <li class="separator">DIVERS</li>
                  <li>
                      <a href="#"><i class="fa fa-user fa-fw"></i> Utilisateurs<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li><a href="">Tous les utilisateurs</a></li>
                        <li><a href="">???</a></li>
                      </ul>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-gears fa-fw"></i> Paramètres<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li><a href="">Gérer le référencement</a></li>
                      <li><a href="">???</a></li>
                    </ul>
                  </li>
              </ul>
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
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
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
                </div>
			<?= $this->section('main_content') ?>
		</section>

		<footer>

		</footer>

  <script src="<?= $this->assetUrl('admin/vendor/jquery/jquery.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/bootstrap/js/bootstrap.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/metisMenu/metisMenu.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/raphael/raphael.min.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/vendor/morrisjs/morris.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/data/morris-data.js') ?>" charset="utf-8"></script>
  <script src="<?= $this->assetUrl('admin/dist/js/sb-admin-2.js') ?>" charset="utf-8"></script>
</body>
</html>
