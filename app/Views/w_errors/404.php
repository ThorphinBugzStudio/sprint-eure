<?php $this->layout('layout', ['title' => 'Perdu ?']) ?>

<?php $this->start('main_content'); ?>

<div class="errorPage">
  <h2>Page inexistante</h2>
  <hr class="hrError">
  <p>La page ciblée n'existe pas.</p>
</div>

<?php $this->stop('main_content'); ?>
