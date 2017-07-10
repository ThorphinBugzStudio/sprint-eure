<?php $this->layout('layout', ['title' => 'login']) ?>

<?php $this->start('main_content') ?>
<div class="flash-message">

  <?php if(!empty($w_flash_message->message)) { ?>

    <span class="span-flash"><?= $w_flash_message->message ?></span>
<!-- echo $w_flash_message->level; interprete l'argument success ou warning.... pr bootstrap(couleurs)-->
    <? } ?>

    <form class="" action="<?php $this->url('login_action') ?>" method="POST">

      <label for="pseudo-mail">Entrez votre pseudo ou votre Email</label>
      <input type="text" name="pseudo-mail" value="">

      <label for="password">Entrez votre mot de passe</label>
      <input type="text" name="password" value="">

      <input type="submit" name="submit" value="Se connecter">

      

    </form>



<?php $this->stop('main_content') ?>
