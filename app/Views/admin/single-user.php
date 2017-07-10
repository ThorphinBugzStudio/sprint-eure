<?php $this->layout('back_layout', ['title' => 'admin Single Users']) ?>

<?php $this->start('main_content') ?>

<h1>Details d'un utilisateur</h1>

   <!-- formulaire radiobutton pour changement de role -->
   <form id="formChangeRole" class="form-subscribe" action="<? $this->url('admin_single_user_action', ['id' => $postId]); ?>" enctype="multipart/form-data" method="POST">

      <?= $rolesBox ?>

      <?= $statusBox ?>


   </form>

<?php $this->stop('main_content') ?>
