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
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
	<header>
		<!-- ============================================ -->
		<!-- Navbar des utilisateurs : Inscription | Connexion | Profil | Déconnexion | Administration | Panier -->
		<!-- ============================================ -->
		<div class="row navbar-users justify-content-end">
			<li>
				<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a>
			</li>

			<li>
				<a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a>
			</li>

			<li>
				<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Votre profil</a>
			</li>

			<li>
				<a href="#"><i class="fa fa-dashboard" aria-hidden="true"></i> Administration</a>
			</li>

			<li>
				<a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
			</li>

			<li class="basket-order">
				<a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier <i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</li>
		</div>


		<!-- ============================================ -->
		<!-- 			Bannière du site + nom et logo 					-->
		<!-- ============================================ -->
		<div class="main-banner img-fluid row">
			<div class="column m-auto justify-content-center">

				<a href="<?= $this->url('default_home') ?>">
					<img class="row img-fluid mx-auto justify-content-center hvr-grow" src="<?= $this->assetUrl('img/logo.png') ?>" alt="Logo">
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
				<li class="hvr-underline-from-center"><a href="#">Accueil</a></li>
				<li class="hvr-underline-from-center"><a href="#">Boutique</a></li>
				<li class="hvr-underline-from-center"><a href="#">À propos</a></li>
				<li class="hvr-underline-from-center"><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>

<div class="container-fluid row py-3 justify-content-center">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div class="bg-under-slider"></div>
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img1.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel">
					<p>Description</p>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img1.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel"
					<p>Description</p>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img1.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel"
					<p>Description</p>
				</div>
			</div>
		</div>

		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

	<section>
		<div class="container-fluid row py-4 mainContent">
			<h2><?= $this->e($title) ?></h2>
			<hr class="hrPage">
		</div>

		<?= $this->section('main_content') ?>
	</section>

	<footer>
		<div class="row">
			<div class="">

			</div>
		</div>
	</footer>
	<script src="<?= $this->assetUrl('js/jquery-3.2.1.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/sliders.js') ?>" charset="utf-8"></script>
</body>
</html>
