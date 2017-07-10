<?php $this->layout('layout', ['title' => 'Inscription']); ?>

<?php $this->start('main_content') ?>

<i>Les champs marqués d'une <span class="error">*</span> sont obligatoires.</i>

<form id="sub-form" class="form-subscribe" action="<?php $this->url('inscription_action'); ?>" enctype="multipart/form-data" method="POST">

  <div class="row my-3" style="justify-content: space-between;">
    <div class="col-lg-5">
      <!-- Section : Prénom -->
      <label for="firstname">Prénom</label> <span class="error">*</span>
      <input class="input-form" type="text" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname']; } ?>">
      <?php if(!empty($error['firstname'])){ echo '<p id="error-firstname" class="error">' . $error['firstname'] . '</p>'; } ?>

      <!-- Section : Nom -->
      <label for="lastname">Nom</label> <span class="error">*</span>
      <input class="input-form" type="text" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname']; } ?>">
      <?php if(!empty($error['lastname'])){ echo '<p id="error-lastname" class="error">' . $error['lastname'] . '</p>'; } ?>

      <!-- Section : E-mail -->
      <label for="email">E-mail</label> <span class="error">*</span>
      <input class="input-form" type="text" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>">
      <?php if(!empty($error['email'])){ echo '<p id="error-email" class="error">' . $error['email'] . '</p>'; } ?>

      <div class="billing-adress">
        <!-- Section : Adresse -->
        <label for="adress">Adresse de facturation</label> <span class="error">*</span>
        <input class="input-form" type="text" name="adress" value="<?php if(!empty($_POST['adress'])){ echo $_POST['adress']; } ?>">
        <?php if(!empty($error['adress'])){ echo '<p id="error-adress" class="error">' . $error['adress'] . '</p>'; } ?>

          <div class="row">
            <div class="col-lg-5 mr-auto">
              <!-- Section : Code Postal -->
              <label for="postal-code">Code Postal</label> <span class="error">*</span>
              <input class="input-form" type="text" name="postal-code" value="<?php if(!empty($_POST['postal-code'])){ echo $_POST['postal-code']; } ?>">
              <?php if(!empty($error['postal-code'])){ echo '<p id="error-postal-code" class="error">' . $error['postal-code'] . '</p>'; } ?>
            </div>

            <div class="col-lg-5 ml-auto">
              <!-- Section : Ville -->
              <label for="city">Ville</label> <span class="error">*</span>
              <input class="input-form" type="text" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } ?>">
              <?php if(!empty($error['city'])){ echo '<p id="error-city" class="error">' . $error['city'] . '</p>'; } ?>
            </div>
          </div>

        <!-- Section : Pays -->
        <label for="country">Pays</label> <span class="error">*</span>
        <input class="input-form" type="text" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country']; } ?>">
        <?php if(!empty($error['country'])){ echo '<p id="error-country" class="error">' . $error['country'] . '</p>'; } ?>
      </div>
    </div>

    <div class="col-lg-5">
      <!-- Section : Pseudo -->
      <label for="pseudo">Pseudo</label> <span class="error">*</span>
      <input class="input-form" type="text" name="pseudo" value="<?php if(!empty($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>">
      <?php if(!empty($error['pseudo'])){ echo '<p id="error-pseudo" class="error">' . $error['pseudo'] . '</p>'; } ?>

      <!-- Section : Mot de passe -->
      <label for="password">Mot de passe</label> <span class="error">*</span>
      <input class="input-form" type="password" name="password" value="<?php if(!empty($_POST['password'])){ echo $_POST['password']; } ?>">
      <?php if(!empty($error['password'])){ echo '<p id="error-password" class="error">' . $error['password'] . '</p>'; } ?>

      <!-- Section : Confirmation de mot de passe -->
      <label for="password-confirm">Confirmez votre mot de passe</label> <span class="error">*</span>
      <input class="input-form" type="password" name="password-confirm" value="<?php if(!empty($_POST['password-confirm'])){ echo $_POST['password-confirm']; } ?>">

      <!-- Section : Avatar -->
      <label for="avatar">Avatar</label> <span class="error">*</span>
      <input class="input-form" type="file" name="avatar" value="<?php if(!empty($_POST['avatar'])){ echo $_POST['avatar']; } ?>" style="max-width: 100%; overflow: hidden;">
      <?php if(!empty($error['avatar'])){ echo '<p id="error-avatar" class="error">' . $error['avatar'] . '</p>'; } ?>

      <div class="row my-2 justify-content-center">
        <input class= "bg-primary btn_ok" type="submit" name="submit" value="S'inscrire">
      </div>
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
