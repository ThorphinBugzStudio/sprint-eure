<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<h1>Section Inscription</h1>

<form class="form-subscribe" action="" method="POST">

  <label for="pseudo">Votre pseudo</label>
  <input type="text" name="pseudo" value="">

  <label for="firstname">Votre prénom</label>
  <input type="text" name="firstname" value="">

  <label for="lastname">Votre nom</label>
  <input type="text" name="lastname" value="">

  <label for="email">Votre email</label>
  <input type="text" name="email" value="">

  <label for="password">Votre mot de passe</label>
  <input type="text" name="password" value="">

</form>

<input type="text" name="" value="">

<?php $this->stop('main_content') ?>
