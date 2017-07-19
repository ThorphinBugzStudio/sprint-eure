<?php $this->layout('layout', ['title' => 'passwordLost']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?php $this->url('password_lost_action') ?>" method="POST">

  <label for="emailconfirm">Pour retrouver votre mot de passe, veuillez renseigner votre email</label>
  <span style="color:red"><?php if(!empty($error['emailconfirm'])){ echo $error['emailconfirm']; } ?></span>
  <input type="text" name="emailconfirm" value="<?php if(!$success){if(!empty($_POST['emailconfirm'])){ echo $_POST['emailconfirm'];}} ?>">

  <input class="submit-btn" type="submit" name="submit" value="Envoyer">

  <?php if($success == true){ ?>

  <li><?= $link ?></li>
  <?php } ?>
  </form>

</form>

<?php $this->stop('main_content') ?>
