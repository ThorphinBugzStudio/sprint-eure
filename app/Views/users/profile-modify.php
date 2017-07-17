<?php $this->layout('layout', ['title' => 'Modification de votre profil']) ?>

<?php $this->start('main_content'); ?>


<div class="row" style="justify-content: space-between">
  <div class="col-lg-5 col-sm-12">
    <form class="" action="<?php $this->url('user_profile_modify_action') ?>" enctype="multipart/form-data" method="post">

      <!-- Section : Nom -->
      <label for="lastname">Nom</label> <span class="error">*</span>
      <input class="input-form" type="text" name="lastname" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname']; } else { echo $w_user['lastName']; }?>">
      <?php if(!empty($error['lastname'])){ echo '<p id="error-lastname" class="error">' . $error['lastname'] . '</p>'; } ?>

      <!-- Section : Prénom -->
      <label for="firstname">Prénom</label> <span class="error">*</span>
      <input class="input-form" type="text" name="firstname" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname']; } else { echo $w_user['firstName']; } ?>">
      <?php if(!empty($error['firstname'])){ echo '<p id="error-firstname" class="error">' . $error['firstname'] . '</p>'; } ?>

      <!-- Section : E-mail -->
      <label for="email">E-mail</label> <span class="error">*</span>
      <input class="input-form" type="text" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } else { echo $w_user['email']; } ?>">
      <?php if(!empty($error['email'])){ echo '<p id="error-email" class="error">' . $error['email'] . '</p>'; } ?>

      <div class="billing-adress">
        <!-- Section : Adresse -->
        <label for="adress">Adresse de facturation</label> <span class="error">*</span>
        <input class="input-form" type="text" name="adress" value="<?php if(!empty($_POST['adress'])){ echo $_POST['adress']; } else { echo $user_adress['adress1']; } ?>">
        <?php if(!empty($error['adress'])){ echo '<p id="error-adress" class="error">' . $error['adress'] . '</p>'; } ?>

        <div class="row">
          <div class="col-lg-5 mr-auto">
            <!-- Section : Code Postal -->
            <label for="postal-code">Code Postal</label> <span class="error">*</span>
            <input class="input-form" type="text" name="postal-code" value="<?php if(!empty($_POST['postal-code'])){ echo $_POST['postal-code']; } else { echo $user_adress['postal_code']; } ?>">
            <?php if(!empty($error['postal-code'])){ echo '<p id="error-postal-code" class="error">' . $error['postal-code'] . '</p>'; } ?>
          </div>

          <div class="col-lg-5 ml-auto">
            <!-- Section : Ville -->
            <label for="city">Ville</label> <span class="error">*</span>
            <input class="input-form" type="text" name="city" value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } else { echo $user_adress['town']; } ?>">
            <?php if(!empty($error['city'])){ echo '<p id="error-city" class="error">' . $error['city'] . '</p>'; } ?>
          </div>
        </div>

        <!-- Section : Pays -->
        <label for="country">Pays</label> <span class="error">*</span>
        <input class="input-form" type="text" name="country" value="<?php if(!empty($_POST['country'])){ echo $_POST['country']; } else { echo $user_adress['country']; }?>">
        <?php if(!empty($error['country'])){ echo '<p id="error-country" class="error">' . $error['country'] . '</p>'; } ?>
      </div>
    </div>


      <div class="col-lg-5 col-sm-12">
        <!-- Section : Pseudo -->
        <label for="pseudo">Pseudo</label> <span class="error">*</span>
        <input class="input-form" type="text" name="pseudo" value="<?php if(!empty($_POST['pseudo'])){ echo $_POST['pseudo']; } else { echo $w_user['username']; }?>">
        <?php if(!empty($error['pseudo'])){ echo '<p id="error-pseudo" class="error">' . $error['pseudo'] . '</p>'; } ?>

        <!-- Section : Avatar -->
        <label for="avatar">Avatar</label> <span class="error">*</span>
        <input class="input-form" type="file" name="avatar" value="<?php if(!empty($_FILES['name'])){ echo $_FILES['name']; } else { echo $user_avatar['img_name']; } ?>" style="max-width: 100%; overflow: hidden;">
        <?php if(!empty($error['avatar'])){ echo '<p id="error-avatar" class="error">' . $error['avatar'] . '</p>'; } ?>

        <div class="row mt-2">
          <input class="btn_ok mx-auto" type="submit" name="submit" value="Modifier le profil">
        </div>
      </div>

    </form>
</div>

<?php $this->stop('main_content') ?>
