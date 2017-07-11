<?php $this->layout('layout', ['title' => 'UserProfile']) ?>

<?php $this->start('main_content');

debug($user);
$user_id = $user['id']; ?>

<p>Pseudo<?= ' '.$user['username'].' ' ?><a href="<?php $this->url('user_profile_modify',['id' => $user_id]); ?>">Edit</a></p>





<?php $this->stop('main_content') ?>
