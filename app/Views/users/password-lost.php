<?php $this->layout('layout', ['title' => 'Mot de passe perdu ?']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?php $this->url('password_lost_action') ?>" method="POST">

  <label class="mt-4 mb-2" for="emailconfirm">Pour retrouver votre mot de passe, veuillez renseigner votre email.</label> <br>
  <div class="row">
    <input class="input-form mx-auto" style="max-width: 300px;" placeholder="Saisir votre email..." type="text" name="emailconfirm" value="<?php if(!$success){if(!empty($_POST['emailconfirm'])){ echo $_POST['emailconfirm'];}}?>">
  </div>
  <div class="row">
    <span class="mx-auto" style="color: red;"><?php if(!empty($error['emailconfirm'])){ echo $error['emailconfirm']; } ?></span>
  </div>

  <div class="row mt-2">
    <input class="btn_ok mx-auto" type="submit" name="submit" value="Envoyer">
  </div>

  <?php if($success == true) { ?>
  <?= $link ?>
  <?php } ?>

  </form>

</form>

<?php $this->stop('main_content') ?>
