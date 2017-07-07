<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<h1>Section Inscription</h1>

<form class="form-subscribe" action="" enctype="multipart/form-data" method="POST">

  <label for="firstname">Votre prénom</label>
  <input type="text" name="firstname" value="">

  <label for="lastname">Votre nom</label>
  <input type="text" name="lastname" value="">

  <label for="pseudo">Votre pseudo</label>
  <input type="text" name="pseudo" value="">

  <label for="email">Votre email</label>
  <input type="text" name="email" value="">

  <label for="avatar">Votre avatar</label>
  <input type="file" name="avatar" value="">

  <div class="first-adress">
    <label for="adress_1">Adresse</label>
    <input type="text" name="adress_1" value="">

    <label for="postal-code_1">Code postal</label>
    <input type="text" name="postal-code_1" value="">

    <label for="city_1">Ville</label>
    <input type="text" name="city_1" value="">

    <label for="country_1">Pays</label>
    <input type="text" name="country" value="">

    <label for="adress_type">Adresse de</label>

    <select class="" name="">

    </select>
  </div>

  <div class="">

  </div>


  <label for="adress_2">Adresse 2</label>

  <label for="password">Votre mot de passe</label>
  <input type="text" name="password" value="">

  <label for="password-confirm">Confirmez votre mot de passe</label>
  <input type="text" name="password-confirm" value="">



</form>

<input type="text" name="" value="">

<?php $this->stop('main_content') ?>
