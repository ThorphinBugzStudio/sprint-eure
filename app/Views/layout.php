<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?> - Sprint'Eure</title>
	<meta name="description" content="">
  <meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" type="image/png" href="">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/hover.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/jquery-ui.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
	<header>
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler m-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<!-- ============================================ -->
		<!-- Navbar des utilisateurs : Inscription | Connexion | Profil | Déconnexion | Administration | Panier -->
		<!-- ============================================ -->
		<div class="row w-100 navbar-users justify-content-end">
			<ul class="w-100">
				<li>
					<a href="<?= $this->url('inscription') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a>
				</li>

				<li>
					<a href="<?= $this->url('login') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a>
				</li>

				<li>
					<a href="<?= $this->url('user_profile') ?>"><i class="fa fa-user" aria-hidden="true"></i> Votre profil</a>
				</li>

				<li>
					<a href="<?= $this->url('admin_users') ?>"><i class="fa fa-dashboard" aria-hidden="true"></i> Administration</a>
				</li>

				<li>
					<a href="<?= $this->url('logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
				</li>

				<li class="basket-order" id="basket">
					<a href="#" id="opener"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier (0) <i class="fa fa-angle-down" aria-hidden="true"></i></a>
					<div id="dialog" title="Votre panier">
						<p class="text-align-center mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Le panier est vide.</p>
						<hr class="hrPage">
						<div class="row mt-2">
							<p class="col-6 bold mb-0">Total :</p>
							<p class="col-6 text-align-right mb-0">0.00 €</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
		<!-- ============================================ -->
		<!-- 			Bannière du site + nom et logo 					-->
		<!-- ============================================ -->
		<div class="main-banner img-fluid row">
			<div class="column m-auto justify-content-center">

				<a href="<?= $this->url('default_home') ?>">
					<img class="row img-fluid mx-auto justify-content-center mb-2 hvr-grow" src="<?= $this->assetUrl('img/logo.png') ?>" alt="Logo">
				</a>

				<h1 class="row m-auto main-title">
					<a href="<?= $this->url('default_home') ?>">Sprint'Eure</a>
				</h1>

			</div>
			<!--<video class="slider-video" type="video/mp4" src="<?= $this->assetUrl('img/sliders/3dprint_introduction.mp4') ?>" muted autoplay loop></video>-->
		</div>


		<!-- ============================================ -->
		<!-- 					Menu de naviguation du site 				-->
		<!-- ============================================ -->
		<nav class="navbar-menu">
			<ul class="row justify-content-center">
				<li class="hvr-underline-from-center"><a href="<?= $this->url('default_home') ?>">Accueil</a></li>
				<li class="hvr-underline-from-center"><a href="#">Boutique</a></li>
				<li class="hvr-underline-from-center"><a href="<?= $this->url('how_to') ?>">Comment ça marche ?</a></li>
				<li class="hvr-underline-from-center"><a href="#">À propos</a></li>
				<li class="hvr-underline-from-center"><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>

	<!-- Bouton : Haut de Page  -->
	<a href="#" title="Haut de page" class="scrollup"><i class="fa fa-arrow-up"></i></a>

<div class="container bg-white">
		<section>
			<div class="container-fluid row pt-4 mainContent">
				<h2><?= $this->e($title) ?></h2>
				<hr class="hrPage">
			</div>
			<div class="container-fluid pt-2 pb-3">
				<?= $this->section('main_content') ?>
			</div>
		</section>
</div>

<footer>
	<div class="container-fluid row footer-center">
		<div class="footer_1">
			<h2>» Widget</h2>
			<hr class="hr_footer">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="footer_2">
			<h2>» Widget</h2>
			<hr class="hr_footer">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="footer_3">
			<h2>» Widget</h2>
			<hr class="hr_footer">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="footer_4">
			<h2>» Widget</h2>
			<hr class="hr_footer">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

	</div>
	<p class="copyright">Copyright © 2017 - Sprint'Eure - Tous droits reservé.</p>
</footer>

	<script src="<?= $this->assetUrl('js/jquery-3.2.1.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/jquery-ui.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/panier.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/haut_de_page.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/inscription-ajax.js') ?>" charset="utf-8"></script>
</body>
</html>
