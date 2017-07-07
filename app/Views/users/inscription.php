<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<form class="form-subscribe" action="" enctype="multipart/form-data" method="POST">

  <div class="row my-3" style="justify-content: space-between;">
    <div class="col-lg-5">
      <label for="firstname">Prénom</label> <br>
      <input class="input-form" type="text" name="firstname" value="">

      <label for="lastname">Nom</label> <br>
      <input class="input-form" type="text" name="lastname" value="">

      <label for="email">E-mail</label>
      <input class="input-form" type="text" name="email" value="">

      <div class="first-adress">
        <label for="adress_1">Adresse</label>
        <input class="input-form" type="text" name="adress_1" value="">

        <label for="adress_2">Adresse 2</label>
        <input class="input-form" type="text" name="adress_2" value="">

          <div class="row">
            <div class="col-lg-5 mr-auto">
              <label for="postal-code_1">Code Postal</label>
              <input class="input-form" type="text" name="postal-code_1" value="">
            </div>

            <div class="col-lg-5 ml-auto">
              <label for="city_1">Ville</label>
              <input class="input-form" type="text" name="city_1" value="">
            </div>
          </div>

        <label for="country_1">Pays</label>
        <input class="input-form" type="text" name="country" value="">

        <label for="adress_type">Adresse de</label>
        <select class="input-form" name="">
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
      </div>
    </div>

    <div class="col-lg-5">
      <label for="pseudo">Pseudo</label>
      <input class="input-form" type="text" name="pseudo" value="">

      <label for="password">Mot de passe</label>
      <input class="input-form" type="text" name="password" value="">

      <label for="password-confirm">Confirmez votre mot de passe</label>
      <input class="input-form" type="text" name="password-confirm" value="">

      <label for="avatar">Avatar</label>
      <input class="input-form" type="file" name="avatar" value="">
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
