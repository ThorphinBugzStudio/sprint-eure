<?php $this->layout('layout', ['title' => 'passwordModify']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?php $this->url('password_modify_action') ?>" method="POST">

  <label for="newpassword">Votre nouveau mot de passe</label>
  <input type="text" name="newpassword" value="<?php if(!empty($_POST['newpassword'])){ echo $_POST['newpassword']; } ?>">
  <span class="error"><?php if(!empty($error['newpassword'])){ echo $error['newpassword'];} ?></span>

  <label for="newpassword-confirm">Veuillez confirmer votre mot de passe</label>
  <input type="text" name="newpassword-confirm" value="<?php if(!empty($_POST['newpassword-confirm'])){ echo $_POST['newpassword-confirm']; } ?>">

  <input type="submit" name="submit" value="Modifier le mot de passe">

</form>

<?php $this->stop('main_content') ?>
