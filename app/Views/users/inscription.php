<?php $this->layout('layout', ['title' => 'Inscription']); ?>

<?php $this->start('main_content') ?>

<form class="form-subscribe" action="<? $this->url('inscription_action'); ?>" enctype="multipart/form-data" method="POST">

  <div class="row my-3" style="justify-content: space-between;">
    <div class="col-lg-5">
      <label for="firstname">Prénom</label> <br>
      <input class="input-form" type="text" name="firstname" value="">

      <label for="lastname">Nom</label> <br>
      <input class="input-form" type="text" name="lastname" value="">

      <label for="email">E-mail</label>
      <input class="input-form" type="text" name="email" value="">

      <div class="billing-adress">
        <label for="adress">Adresse de facturation</label>
        <input class="input-form" type="text" name="adress" value="">

          <div class="row">
            <div class="col-lg-5 mr-auto">
              <label for="postal-code">Code Postal</label>
              <input class="input-form" type="text" name="postal-code" value="">
            </div>

            <div class="col-lg-5 ml-auto">
              <label for="city">Ville</label>
              <input class="input-form" type="text" name="city" value="">
            </div>
          </div>

        <label for="country">Pays</label>
        <input class="input-form" type="text" name="country" value="">

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

      <input class= "bg-primary" type="submit" name="submit" value="S'inscrire">
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
