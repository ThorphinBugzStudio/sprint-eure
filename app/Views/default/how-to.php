<?php $this->layout('layout', ['title' => 'Comment ça marche ?']) ?>

<?php $this->start('main_content') ?>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.</p>




  <nav class="navbar navbar-toggleable-md navbar-light bg-faded"  style="position: fixed; top: 0; left: 0; width: 100%;">
    <button class="navbar-toggler m-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <!-- ============================================ -->
  <!-- Navbar des utilisateurs : Inscription | Connexion | Profil | Déconnexion | Administration | Panier -->
  <!-- ============================================ -->
  <div class="row w-100 navbar-users justify-content-end">
    <ul class="mr-auto">
      <li class="hvr-underline-from-center"><a href="<?= $this->url('default_home') ?>">Accueil</a></li>
      <li class="hvr-underline-from-center"><a href="<?= $this->url('catalog') ?>">Nos produits</a></li>
      <li class="hvr-underline-from-center"><a href="<?= $this->url('how_to') ?>">Comment ça marche ?</a></li>
      <li class="hvr-underline-from-center"><a href="#">À propos</a></li>
    </ul>

    <ul class="ml-auto">
      <li>
        <a href="<?= $this->url('inscription') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a>
      </li>

      <li>
        <a href="<?= $this->url('login') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a>
      </li>

      <li>
        <a href="<?= $this->url('user_profile') ?>"><i class="fa fa-user" aria-hidden="true"></i> Votre profil</a>
        <!--<a href="<?= $this->url('user_profile') ?>"> <img src="" alt="Avatar"> <p></p> </a>-->
      </li>

      <li>
      <a href="<?= $this->url('admin_users') ?>"><i class="fa fa-dashboard" aria-hidden="true"></i> Administration</a>
      </li>

      <li>
        <a href="<?= $this->url('logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
      </li>

      <li class="dropdown basket-order">
        <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier (0)
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <div class="title_basket">
            Votre panier
          </div>
          <div class="dropdown-item">
            <p class="text-align-center mb-2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Le panier est vide.</p>
            <hr class="hrPage">
            <div class="row mt-2">
              <p class="col-6 bold mb-0">Taxes :</p>
              <p class="col-6 text-align-right mb-0">0.00 €</p>
            </div>
            <div class="basket-spacer my-2"></div>
            <div class="row">
              <p class="col-6 bold mb-0">Total :</p>
              <p class="col-6 text-align-right mb-0">0.00 €</p>
            </div>
            <div class="row justify-content-center mt-2">
              <button type="button" name="button" class="btn_ok"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Valider le panier</button>
            </div>
          </div>
        </div>
      </li>

    </ul>
  </div>
</div>
</nav>






<?php $this->stop('main_content') ?>
