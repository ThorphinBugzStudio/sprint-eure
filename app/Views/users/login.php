<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('main_content') ?>
<div class="flash-message">

  <?php if(!empty($w_flash_message->message)) { ?>

    <span class="span-flash"><?= $w_flash_message->message ?></span>
<!-- echo $w_flash_message->level; interprete l'argument success ou warning.... pr bootstrap(couleurs)-->
    <?php } ?>

    <form class="" action="<?php $this->url('login_action') ?>" method="POST">

      <label for="pseudo-mail">Entrez votre pseudo ou votre Email<span><?php if(!empty($error['pseudo-mail'])){ echo $error['pseudo-mail']; } ?></span></label>
      <input type="text" name="pseudo-mail" value="">

      <label for="password">Entrez votre mot de passe<span><?php if(!empty($error['password'])){ echo $error['password']; } ?></span></label>
      <input type="text" name="password" value="">

      <input type="submit" name="submit" value="Se connecter">

      <a href="<?php echo $this->url('password_lost'); ?>">Mot de passe oublié?</a>

    </form>



<?php $this->stop('main_content') ?>
