<?php $this->layout('layout', ['title' => 'Votre profil']) ?>

<?php $this->start('main_content');

$user_id = $w_user['id']; ?>

<div class="row my-3 justify-content-end">
  <a href="<?= $this->url('user_profile_modify',['id' => $user_id]); ?>" style="text-decoration: none;">
    <img src="<?= $this->assetUrl('admin/img/edit.png') ?>" alt="" style="margin-right: 5px;">Éditer votre profil
  </a>
</div>

<div class="row" style="justify-content: space-between">
  <div class="col-lg-5 col-sm-12">
    <!-- Nom et Prénom -->
    <div class="row edit-profil-row">
      <div class="row">
        <i class="fa fa-user my-auto" aria-hidden="true"></i>
        <p>Nom</p>
      </div>
        <p class="bold uppercase my-auto edit-profil-content"><?= $w_user['lastName'] ?></p>
        <p class="my-auto"><?= $w_user['firstName'] ?></p>
    </div>

    <!-- E-mail -->
    <div class="row edit-profil-row">
      <div class="row">
        <i class="fa fa-envelope my-auto" aria-hidden="true"></i>
        <p>E-mail</p>
      </div>
      <p class="my-auto edit-profil-content"><?= $w_user['email'] ?></p>
    </div>

    <!-- Adresse -->
    <div class="row edit-profil-row">
      <div class="row">
        <i class="fa fa-map-marker my-auto" aria-hidden="true"></i>
        <p class="my-auto">Adresse</p>
      </div>
      <ul class="m-0 p-0">
        <li class="my-auto edit-profil-content"><?= $user_adress['adress1'] ?></li>
        <li class="my-auto edit-profil-content"><?= $user_adress['postal_code'] ?>, </li>
        <li class="my-auto edit-profil-content"><?= $user_adress['town'] ?></li>
      </ul>
    </div>

    <!-- Pays -->
    <div class="row edit-profil-row">
      <div class="row">
        <i class="fa fa-flag my-auto" aria-hidden="true"></i>
        <p>Pays</p>
      </div>
      <p class="my-auto edit-profil-content"><?= $user_adress['country'] ?></p>
    </div>

  </div>

  <div class="col-lg-5 col-sm-12">

    <!-- Pseudo -->
    <div class="row edit-profil-row">
      <div class="row">
        <i class="fa fa-user my-auto" aria-hidden="true"></i>
        <p>Pseudo</p>
      </div>
      <p class="my-auto edit-profil-content"><?= $w_user['username'] ?></p>
    </div>

    <!-- Avatar -->
    <div class="edit-profil-row w-100">
      <div class="row w-100">
        <i class="fa fa-picture-o my-auto" aria-hidden="true"></i>
        <p>Avatar</p>
      </div>
        <p class="my-auto py-3 mr-0" style="border-right: 1px solid #1d1d1d; border-left: 1px solid #1d1d1d;">
          <img src="<?= $this->assetUrl('img/avatars/'.$user_avatar['img_name']); ?>" alt="Avatar" class="row edit-profil-avatar mx-auto justify-content-center hvr-grow">
        </p>
    </div>

  </div>
</div>

<?php $this->stop('main_content') ?>
