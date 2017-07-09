<?php $this->layout('layout', ['title' => 'Inscription']); ?>

<?php $this->start('main_content') ?>

<form id="sub-form" class="form-subscribe" action="<? $this->url('inscription_action'); ?>" enctype="multipart/form-data" method="POST">

  <div class="row my-3" style="justify-content: space-between;">
    <div class="col-lg-5">
      <label for="firstname">Prénom<span id="error-firstname"><?php if(!empty($error['firstname'])){ echo $error['firstname']; } ?></span></label> <br>
      <input class="input-form" type="text" name="firstname" value="">

      <label for="lastname">Nom<span id="error-lastname"><?php if(!empty($error['lastname'])){ echo $error['lastname']; } ?></span></label> <br>
      <input class="input-form" type="text" name="lastname" value="">

      <label for="email">E-mail<span id="error-email"><?php if(!empty($error['email'])){ echo $error['email']; } ?></span></label>
      <input class="input-form" type="text" name="email" value="">

      <div class="billing-adress">
        <label for="adress">Adresse de facturation<span id="error-adress"><?php if(!empty($error['adress'])){ echo $error['adress']; } ?></span></label>
        <input class="input-form" type="text" name="adress" value="">

          <div class="row">
            <div class="col-lg-5 mr-auto">
              <label for="postal-code">Code Postal<span id="error-postal-code"><?php if(!empty($error['postal-code'])){ echo $error['postal-code']; } ?></span></label>
              <input class="input-form" type="text" name="postal-code" value="">
            </div>

            <div class="col-lg-5 ml-auto">
              <label for="city">Ville<span id="error-city"><?php if(!empty($error['city'])){ echo $error['city']; } ?></span></label>
              <input class="input-form" type="text" name="city" value="">
            </div>
          </div>

        <label for="country">Pays<span id="error-country"><?php if(!empty($error['country'])){ echo $error['country']; } ?></span></label>
        <input class="input-form" type="text" name="country" value="">

      </div>
    </div>

    <div class="col-lg-5">
      <label for="pseudo">Pseudo<span id="error-pseudo"><?php if(!empty($error['pseudo'])){ echo $error['pseudo']; } ?></span></label>
      <input class="input-form" type="text" name="pseudo" value="">

      <label for="password">Mot de passe<span id="error-password"><?php if(!empty($error['password'])){ echo $error['password']; } ?></span></label>
      <input class="input-form" type="text" name="password" value="">

      <label for="password-confirm">Confirmez votre mot de passe</label>
      <input class="input-form" type="text" name="password-confirm" value="">

      <label for="avatar">Avatar<span id="error-avatar"><?php if(!empty($error['avatar'])){ echo $error['avatar']; } ?></span></label>
      <input class="input-form" type="file" name="avatar" value="">

      <input class= "bg-primary" type="submit" name="submit" value="S'inscrire">
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
