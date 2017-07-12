<?php $this->layout('layout', ['title' => 'Accès refusé']) ?>

<?php $this->start('main_content'); ?>

<?php $_ENV = 'Home'; ?>

<div class="errorPage">
  <h2>Accès refusé</h2>
  <hr class="hrError">
  <p>Vous n'avez pas l'autorisation d'aller sur cette page.</p>
</div>


<?php $this->stop('main_content'); ?>
