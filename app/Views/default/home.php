<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<!-- ============================================ -->
<!-- 									Carousel 										-->
<!-- ============================================ -->
<div class="container-fluid row py-3 justify-content-center">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img1.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel mx-auto my-2">
					<p>Description</p>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img2.jpg') ?>" alt="...">
				<div class="row">
					<div class="carousel-caption d-none d-md-block">
						<h3>Titre</h3>
						<hr class="hrCarousel mx-auto my-2">
						<p>Description</p>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid" src="<?= $this->assetUrl('img/sliders/img3.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel mx-auto my-2">
					<p>Description</p>
				</div>
			</div>
		</div>

		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>


<!-- ============================================ -->
<!-- 								Commentaires 									-->
<!-- ============================================ -->
<?php
	foreach($comments as $comment) { ?>

		<div class="last-comments">
			<p><?= $comment['username']; ?></p>
			<p><?= $comment['comment']; ?></p>
			<p><?= $comment['created_at']; ?></p>
		</div>

		<?php } ?>

<div class="comments-container">

	<?php if(!empty($user)) { ?>
		<form class="comments-form" action="" method="POST">
			<hr class="hrPage mb-3">
			<div>
				<label class="comment m-0">Votre commentaire :</label> <br>
				<textarea name="comment" rows="8" cols="80"></textarea>

				<input class="container-fluid row btn_ok mt-3 mx-auto px-auto" type="submit" name="submit" value="Laisser un commentaire">
			</div>
		</form>

	<?php } ?>

</div>

<?php $this->stop('main_content') ?>
