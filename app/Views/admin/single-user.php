<?php $this->layout('back_layout', ['title' => 'Utilisateur']) ?>

<?php $this->start('main_content') ?>

  <!-- formulaire radiobutton pour changement de role -->
  <form id="formChangeRole" class="form-subscribe" action="<? $this->url('admin_single_user_action', ['id' => $postId]); ?>" method="POST">



    <div class="col-sm-12 col-md-8 py-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-user fa-fw"></i> Modification de l'utilisateur
        </div>
        <div class="p-4">

          <div class="form-group">

            <!-- Section : Prénom -->
            <label for="firstname">Prénom</label> <span class="error">*</span>
            <?php if(!empty($error['firstname'])){ echo '<p id="error-firstname" class="error">' . $error['firstname'] . '</p>'; } ?>
            <input class="input-form" type="text" name="firstName" value="<?php if(!empty($_POST['firstName'])){ echo $_POST['firstName']; } elseif (!empty($userToUpdate['firstName'])) { echo $userToUpdate['firstName']; } ?>">

            <!-- Section : Nom -->
            <label for="lastname">Nom</label> <span class="error">*</span>
            <?php if(!empty($error['lastname'])){ echo '<p id="error-lastname" class="error">' . $error['lastname'] . '</p>'; } ?>
            <input class="input-form" type="text" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname']; } elseif (!empty($userToUpdate['lastName'])) { echo $userToUpdate['lastName']; } ?>">

          </div>

          <div class="form-group">
            <!-- Section : Pseudo -->
            <label for="pseudo">Pseudo</label> <span class="error">*</span>
            <?php if(!empty($error['pseudo'])){ echo '<p id="error-pseudo" class="error">' . $error['pseudo'] . '</p>'; } ?>
            <input class="input-form" type="text" name="pseudo" value="<?php if(!empty($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>">
          </div>

          <div class="form-group">
            <!-- Section : E-mail -->
            <label for="email">E-mail</label> <span class="error">*</span>
            <?php if(!empty($error['email'])){ echo '<p id="error-email" class="error">' . $error['email'] . '</p>'; } ?>
            <input class="input-form" type="text" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } elseif (!empty($userToUpdate['email'])) { echo $userToUpdate['email']; }?>">
          </div>

          <div class="form-group">
              <!-- Section : Adresse -->
              <label for="adress">Adresse de facturation</label> <span class="error">*</span>
              <?php if(!empty($error['adress'])){ echo '<p id="error-adress" class="error">' . $error['adress'] . '</p>'; } ?>
              <input class="input-form" type="text" name="adress" value="<?php if(!empty($_POST['adress'])){ echo $_POST['adress']; }  elseif (!empty($userToUpdate['email'])) { echo $userToUpdate['email']; } ?>">
          </div>

          <div class="form-group">
              <!-- Section : Code Postal -->
              <label for="postal-code">Code Postal</label> <span class="error">*</span>
              <?php if(!empty($error['postal-code'])){ echo '<p id="error-postal-code" class="error">' . $error['postal-code'] . '</p>'; } ?>
              <input class="input-form" type="text" name="postal-code" value="<?php if(!empty($_POST['postal-code'])){ echo $_POST['postal-code']; } ?>">

              <!-- Section : Ville -->
              <label for="city">Ville</label> <span class="error">*</span>
              <?php if(!empty($error['city'])){ echo '<p id="error-city" class="error">' . $error['city'] . '</p>'; } ?>
              <input class="input-form" type="text" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } ?>">
          </div>

          <div class="form-group">
            <!-- Section : Pays -->
            <label for="country">Pays</label> <span class="error">*</span>
            <?php if(!empty($error['country'])){ echo '<p id="error-country" class="error">' . $error['country'] . '</p>'; } ?>
            <input class="input-form" type="text" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country']; } ?>">
          </div>

          <div class="form-group">
            <!-- Section : Avatar -->
            <label for="avatar">Avatar</label> <span class="error">*</span>
            <?php if(!empty($error['avatar'])){ echo '<p id="error-avatar" class="error">' . $error['avatar'] . '</p>'; } ?>
            <input class="input-form" type="file" name="avatar" value="<?php if(!empty($_POST['avatar'])){ echo $_POST['avatar']; } ?>" style="max-width: 100%; overflow: hidden;">
          </div>
        
        </div>

        <div>
        
          <?= $rolesBox ?>
          <?= $statusBox ?>

        </div>

        <div>
          <!--submit-->
          <input class= "bg-primary btn_ok" type="submit" name="submit" value="Mettre à jour">
          <!-- Retour vers listing -->
          <a href="<?= $this->url('admin_page_users', ['page' => $page]) ?>"><button type="button" class="btn btn-warning">Annuler</button></a>
        </div>


      </div>
  </form>


<?php $this->stop('main_content') ?>
