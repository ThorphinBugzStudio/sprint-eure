<?php $this->layout('back_layout', ['title' => 'Utilisateur']) ?>

<?php $this->start('main_content') ?>

<div class="global">

  <!-- Formulaire radiobutton pour changement de role -->
  <form id="formChangeRole" class="form-subscribe row " action="<?php $this->url('admin_single_user_action', ['id' => $userToUpdate['id'], 'fromPage' => $page]); ?>" method="POST">
    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-user fa-fw"></i> Modification de l'utilisateur
        </div>
        <div class="p-4">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-6 mr-auto">
                <!-- Section : Prénom -->
                <label for="firstname">Prénom</label> <span class="error">*</span>
                <input class="input-back" type="text" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname']; } elseif (!empty($userToUpdate['firstName'])) { echo $userToUpdate['firstName']; } ?>">
                <?php if(!empty($error['firstname'])){ echo '<p id="error-firstname" class="error">' . $error['firstname'] . '</p>'; } ?>
              </div>

              <div class="col-lg-6 ml-auto">
                <!-- Section : Nom -->
                <label for="lastname">Nom</label> <span class="error">*</span>
                <input class="input-back" type="text" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname']; } elseif (!empty($userToUpdate['lastName'])) { echo $userToUpdate['lastName']; } ?>">
                <?php if(!empty($error['lastname'])){ echo '<p id="error-lastname" class="error">' . $error['lastname'] . '</p>'; } ?>
              </div>
            </div>

          <div class="form-group">
            <!-- Section : Pseudo -->
            <label for="pseudo">Pseudo</label> <span class="error">*</span>
            <input class="input-back" type="text" name="pseudo" value="<?php if(!empty($_POST['pseudo'])){ echo $_POST['pseudo']; } elseif (!empty($userToUpdate['username'])) { echo $userToUpdate['username']; } ?>">
            <?php if(!empty($error['pseudo'])){ echo '<p id="error-pseudo" class="error">' . $error['pseudo'] . '</p>'; } ?>
          </div>

          <div class="form-group">
            <!-- Section : E-mail -->
            <label for="email">E-mail</label> <span class="error">*</span>
            <input class="input-back" type="text" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } elseif (!empty($userToUpdate['email'])) { echo $userToUpdate['email']; }?>">
            <?php if(!empty($error['email'])){ echo '<p id="error-email" class="error">' . $error['email'] . '</p>'; } ?>
          </div>

          <div class="form-group">
              <!-- Section : Adresse -->
              <label for="adress">Adresse de facturation</label> <span class="error">*</span>
              <input class="input-back" type="text" name="adress" value="<?php if(!empty($_POST['adress'])){ echo $_POST['adress']; } elseif (!empty($adress['adress1'])) { echo $adress['adress1']; } ?>">
              <?php if(!empty($error['adress'])){ echo '<p id="error-adress" class="error">' . $error['adress'] . '</p>'; } ?>
          </div>

          <div class="form-group row">
            <div class="col-lg-6 mr-auto">
              <!-- Section : Code Postal -->
              <label for="postal-code">Code Postal</label> <span class="error">*</span>
              <input class="input-back" type="text" name="postal-code" value="<?php if(!empty($_POST['postal-code'])){ echo $_POST['postal-code']; } elseif (!empty($adress['postal_code'])) { echo $adress['postal_code']; } ?>">
              <?php if(!empty($error['postal-code'])){ echo '<p id="error-postal-code" class="error">' . $error['postal-code'] . '</p>'; } ?>
            </div>

            <div class="col-lg-6 ml-auto">
              <!-- Section : Ville -->
              <label for="city">Ville</label> <span class="error">*</span>
              <input class="input-back" type="text" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } elseif (!empty($adress['town'])) { echo $adress['town']; } ?>">
              <?php if(!empty($error['city'])){ echo '<p id="error-city" class="error">' . $error['city'] . '</p>'; } ?>
            </div>
          </div>

          <div class="form-group">
            <!-- Section : Pays -->
            <label for="country">Pays</label> <span class="error">*</span>
            <input class="input-back" type="text" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country']; } elseif (!empty($adress['country'])) { echo $adress['country']; } ?>">
            <?php if(!empty($error['country'])){ echo '<p id="error-country" class="error">' . $error['country'] . '</p>'; } ?>
          </div>

          <div class="form-group">
            <!-- Section : Avatar -->
            <label for="avatar">Avatar</label> <span class="error">*</span>
            <input class="input-back" type="text" name="avatar" value="<?php if(!empty($_POST['avatar'])){ echo $_POST['avatar']; } elseif (!empty($avatar['img_name'])) { echo $avatar['img_name']; } ?>">
            <?php if(!empty($error['avatar'])){ echo '<p id="error-avatar" class="error">' . $error['avatar'] . '</p>'; } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

      <div class="col-sm-12 col-md-4 py-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-picture-o fa-fw"></i> Avatar
          </div>
          <div class="image p-4">
            <?php
            // CONDITION : Si il y a une miniature, alors on l'affiche. Sinon, une image par défaut sera installé, le temps d'avoir une miniature.
            if(!empty($avatar['img_name'])) { ?>
              <img src="<?= $this->assetUrl('img/avatars/' . $avatar['img_name'] . '') ?>" alt="Avatar" class="hvr-grow mt-3">
            <?php } else { ?>
              <img src="<?= $this->assetUrl('img/avatar-default.png') ?>" alt="Avatar par défaut" class="hvr-grow mt-3">
            <?php } ?>
            <div class="form-check">
              <label for="resetavatar" class="form-check-label">
                <input class="form-check-input" name="resetavatar" type="checkbox" value="rtd">
                Reset to defaut
              </label>
            </div>
          </div>
        </div>

        <div class="panel panel-default mt-4">
          <div class="panel-heading">
            <i class="fa fa-star fa-fw"></i> État de l'utilisateur
          </div>
          <div class="p-4">
            <?= $rolesBox ?>
            <?= $statusBox ?>
          </div>
        </div>

        <div class="panel panel-default mt-4">
          <div class="panel-heading">
            <i class="fa fa-gear fa-fw"></i> Paramètres
          </div>
          <div class="p-4 text-align-center">
            <!-- Bouton d'envoi -->
            <input class="btn_ok" type="submit" name="submit" value="Mettre à jour">
            <!-- Retour vers listing -->
            <a href="<?= $this->url('admin_page_users', ['page' => $page]) ?>"><button type="button" class="btn_cancel">Annuler</button></a>
          </div>
        </div>
      </div>
  </form>
</div>

<?php $this->stop('main_content') ?>
