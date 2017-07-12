<?php $this->layout('layout', ['title' => 'UserProfile']) ?>

<?php $this->start('main_content');

$user_id = $w_user['id']; ?>

<p>Pseudo   <?= $w_user['username'] ?></p>
<p>Nom   <?= $w_user['lastName'] ?></p>
<p>prénom   <?= $w_user['firstName'] ?></p>
<p>Email   <?= $w_user['email'] ?></p>

  <p>Adresse   <?= $user_adress['adress1'] ?></p>
  <p>Code postal   <?= $user_adress['postal_code'] ?></p>
  <p>Ville   <?= $user_adress['town'] ?></p>
  <p>Pays   <?= $user_adress['country'] ?></p>
  <p>Avatar   <img src="<?= $this->assetUrl('img/avatars/'.$user_avatar['img_name']); ?>" alt=""><?= $user_avatar['img_name'].' ' ?></p>



<a href="<?= $this->url('user_profile_modify',['id' => $user_id]); ?>">Editer votre profil</a>




<?php $this->stop('main_content') ?>
