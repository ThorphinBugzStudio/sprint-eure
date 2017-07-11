<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
    <div class="flash-message">
      <?php if(!empty($w_flash_message->message)) { ?>
        <span class="span-flash"><?= $w_flash_message->message ?></span>
    <!-- echo $w_flash_message->level; interprete l'argument success ou warning.... pr bootstrap(couleurs)-->
        <?php } ?>
    </div>

    <div class="container connexion">
      <form class="row my-3" action="<?php $this->url('login_action') ?>" method="POST">

        <!-- Catégorie : Pseudo -->
        <label for="pseudo-mail">Pseudo / E-mail :</label>
        <input class="input-form" type="text" name="pseudo-mail" value="">
        <?php if(!empty($error['pseudo-mail'])){ echo '<p id="error-firstname" class="error">' . $error['pseudo-mail'] . '</p>'; } ?>

        <br>

        <!-- Catégorie : Mot de passe -->
        <label for="password" class="mt-2">Mot de passe :</label>
        <input class="input-form" type="password" name="password" value="">
        <?php if(!empty($error['password'])){ echo '<p id="error-firstname" class="error">' . $error['password'] . '</p>'; } ?>

        <!-- Catégorie : Boutons d'action -->
        <div class="row mx-auto mt-3 justify-content-center">
            <input type="submit" name="submit" value="Se connecter" class="btn_ok m-2">
            <a href="<?php echo $this->url('password_lost'); ?>" class="btn_cancel m-2">Mot de passe oublié?</a>
        </div>
      </form>
    </div>


<?php $this->stop('main_content') ?>
