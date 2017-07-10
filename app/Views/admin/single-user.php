<?php $this->layout('back_layout', ['title' => 'Utilisateur']) ?>

<?php $this->start('main_content') ?>

   <!-- formulaire radiobutton pour changement de role -->
   <form id="formChangeRole" class="form-subscribe" action="<? $this->url('admin_single_user_action', ['id' => $postId]); ?>" enctype="multipart/form-data" method="POST">

     <div class="col-sm-12 col-md-8 py-3">
       <div class="panel panel-default">
         <div class="panel-heading">
           <i class="fa fa-user fa-fw"></i> Modification de l'utilisateur
         </div>
         <div class="p-4">
          <?= $rolesBox ?>
          <?= $statusBox ?>
        </div>
      </div>
  </form>
</div>

<?php $this->stop('main_content') ?>
