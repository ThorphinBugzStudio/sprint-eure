<?php $this->layout('layout', ['title' => 'UserProfile']) ?>

<?php $this->start('main_content');

debug($user); ?>

<p>Pseudo<?= ' '.$user['username'].' ' ?><a href="<?php $this->url('user_profile_modify') ?>">Edit</a></p>





<?php $this->stop('main_content') ?>
