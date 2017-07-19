<?php $this->layout('layout', ['title' => 'Changement de mot de passe']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?php $this->url('password_modify_action') ?>" method="POST">
  <div class="row mx-auto mt-4" style="max-width: 300px;">
    <label for="newpassword">Votre nouveau mot de passe :</label> <br>
    <input class="input-form" type="password" name="newpassword" value="<?php if(!empty($_POST['newpassword'])){ echo $_POST['newpassword']; } ?>">
    <span class="error mx-auto mb-2"><?php if(!empty($error['newpassword'])){ echo $error['newpassword'];} ?></span>
  </div>

  <div class="row mx-auto" style="max-width: 300px;">
    <label for="newpassword-confirm">Confirmation de votre mot de passe :</label> <br>
    <input class="input-form" type="password" name="newpassword-confirm" value="<?php if(!empty($_POST['newpassword-confirm'])){ echo $_POST['newpassword-confirm']; } ?>">
  </div>

  <div class="row mt-3 mb-2">
    <input class="btn_ok mx-auto" type="submit" name="submit" value="Modifier le mot de passe">
  </div>

</form>

<?php $this->stop('main_content') ?>
