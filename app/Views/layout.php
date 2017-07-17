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
	<link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/hover.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/fancybox.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
	<header>
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed">
			<button class="navbar-toggler m-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- ============================================ -->
				<!--							 Navbar principale 						  -->
				<!-- ============================================ -->
				<div class="row navbar-menu w-100 justify-content-start">
					<ul class="row mr-auto justify-content-start w-100">
						<li class="hvr-underline-from-center"><a href="<?= $this->url('default_home') ?>">Accueil</a></li>
						<li class="hvr-underline-from-center"><a href="<?= $this->url('catalog') ?>">Nos produits</a></li>
						<li class="hvr-underline-from-center"><a href="<?= $this->url('how_to') ?>">Comment ça marche ?</a></li>
						<li class="hvr-underline-from-center"><a href="<?= $this->url('devis') ?>">Devis</a></li>
					</ul>
				</div>

				<!-- ============================================ -->
				<!-- Navbar des utilisateurs : Inscription | Connexion | Profil | Déconnexion | Administration | Panier -->
				<!-- ============================================ -->
				<div class="row w-100 navbar-users justify-content-end">

					<ul class="ml-auto w-100">
						<?php if(empty($w_user)) { ?>
							<li>
								<a href="<?= $this->url('inscription') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a>
							</li>

							<li>
								<a href="<?= $this->url('login') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a>
							</li>
						<?php	} ?>

						<?php if(!empty($w_user)) { ?>
							<li>
								<a href="<?= $this->url('user_profile') ?>"><img class="navbar-avatar" src="<?php echo $this->assetUrl('img/avatars/'.$w_user['avatar']) ?>" alt="">
									<?= $w_user['username'] ?>
								</a>
							</li>
						<?php	} ?>

						<?php if($w_user['role'] == 'admin') { ?>
							<li>
								<a href="<?= $this->url('admin_users') ?>"><i class="fa fa-dashboard" aria-hidden="true"></i> Administration</a>
							</li>
						<?php } ?>

						<?php if(!empty($w_user))	{ ?>
							<li>
								<a href="<?= $this->url('logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
							</li>
						<?php	} ?>

						<li class="dropdown basket-order">
							<a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier <span id="nbr_articles">(0)</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<div class="title_basket">
									<a href="<?= $this->url('panier_client') ?>">Votre panier</a>
								</div>
								<div class="dropdown-item">
									<p id = "basket_first_line" class="text-align-center mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Le panier est vide.</p>
									<hr class="hrPage">
									<div class="row mt-2">
										<p class="col-6 bold mb-0">Total hors taxes</p>
										<p class="col-6 text-align-right mb-0"><span id="total_ht">0.00</span> €</p>
										<p class="col-6 bold mb-0">Taxes :</p>
										<p class="col-6 text-align-right mb-0"><span id="total_tva">0.00</span>€</p>
									</div>
									<div class="basket-spacer my-2"></div>
									<div class="row">
										<p class="col-6 bold mb-0">Total :</p>
										<p class="col-6 text-align-right mb-0"><span id="total_ttc">0.00</span> €</p>
									</div>
									<div class="row justify-content-center mt-2">
										<button type="button" name="button" class="btn_ok"><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="<?= $this->url('panier_client') ?>"></a> </button>
									</div>
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
		</div>

		<!-- ============================================ -->
		<!-- 					Menu de naviguation du site 				-->
		<!-- ============================================ -->
		<div class="navbar-title">
			<div class="row col-lg-9 mx-auto w-100">

			</div>
		</div>
	</header>

	<!-- Bouton : Haut de Page  -->
	<a href="#" title="Haut de page" class="scrollup"><i class="fa fa-arrow-up"></i></a>

<div class="col-lg-9 mx-auto bg-white">
		<section>
			<?php if($_ENV == 'Home') { ?>

				<?php } else { ?>
			<div class="container-fluid row pt-4 mainContent">
				<h2><?= $this->e($title) ?></h2>
				<hr class="hrPage">
			</div>
				<?php } ?>

			<div class="container-fluid">
				<?= $this->section('main_content') ?>
			</div>
		</section>
</div>

<footer>
	<div class="container-fluid row footer-center">
		<div class="footer_1">
			<h2>» Réseaux sociaux</h2>
			<hr class="hr_footer">
			<div class="row">
				<a href="http://facebook.com"><img src="<?= $this->assetUrl('img/facebook.png') ?>" alt="Facebook" class="hvr-grow img-fluid"></a>
				<a href="http://twitter.com"><img src="<?= $this->assetUrl('img/twitter.png') ?>" alt="Twitter" class="hvr-grow img-fluid"></a>
				<a href="http://linkedin.com"><img src="<?= $this->assetUrl('img/linkedin.png') ?>" alt="Linkedin" class="hvr-grow img-fluid"></a>
				<a href="#"><img src="<?= $this->assetUrl('img/google_plus.png') ?>" alt="Google +" class="hvr-grow img-fluid"></a>
				<a href="#"><img src="<?= $this->assetUrl('img/rss.png') ?>" alt="Flux RSS" class="hvr-grow img-fluid"></a>
			</div>
		</div>

		<div class="footer_2">
			<h2>» Contact</h2>
			<hr class="hr_footer">
			<address><i class="fa fa-map-marker" aria-hidden="true"></i> 5 rue des Pantoufles</address>
			<address style="padding-left: 19px;">27370, Louviers</address>
			<address class="mt-2"><i class="fa fa-phone" aria-hidden="true"></i> 02.32.40.63.78</address>
			<address class="mt-2"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:contact@sprinteure.fr">contact@sprinteure.fr</a></address>
		</div>

		<div class="footer_3">
			<h2>» Où sommes-nous ?</h2>
			<hr class="hr_footer">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2625.191168697093!2d2.3552835605743416!3d48.85456490724742!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb2bbd365849898f2!2sWebforce3!5e0!3m2!1sfr!2sfr!4v1499899746835" width="600" height="450" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="footer_4">
			<h2>» Newsletter</h2>
			<hr class="hr_footer">
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
			  <input type="text" class="form-control" placeholder="Saisir votre e-mail" aria-describedby="basic-addon1" class="input-form">
			</div>
		</div>

	</div>
	<p class="copyright">Copyright © 2017 - Sprint'Eure - Tous droits reservé.</p>
</footer>

	<script src="<?= $this->assetUrl('js/jquery-3.2.1.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/fancybox.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/haut_de_page.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/category.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/panier.js') ?>" charset="utf-8"></script>


</body>
</html>
