<?php $this->layout('layout', ['title' => 'Nothing to see here']) ?>

<?php $this->start('main_content'); ?>

<div class="errorPage">
  <h2>Accès refusé</h2>
  <hr class="hrError">
  <p>Vous n'avez pas l'autorisation d'aller sur cette page.</p>
</div>


<?php $this->stop('main_content'); ?>
