<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php
if(!empty($_SESSION))
{
	foreach($comments as $comment)
	{ ?>

		<div class="last-comments">
			<p><?= $comment['username']; ?></p>
			<p><?= $comment['comment']; ?></p>
			<p><?= $comment['created_at']; ?></p>
		</div>

		<?php }
} ?>

<div class="comments-container">
	<form class="comments-form" action="" method="POST">

		<label class="comment">Votre commentaire</label>
		<textarea name="comment" rows="8" cols="80"></textarea>

		<input type="submit" name="submit" value="Laisser un commentaire">

	</form>
</div>

<?php $this->stop('main_content') ?>
