<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content');

// Superglobal qui sert pour le Layout. Cela permet d'afficher le titre de la page sur lequel nous sommes ou non.
$_ENV = 'Home'; ?>

<div class="flash-message">
  <?php if(!empty($w_flash_message->message)) { ?>
    <span class="span-flash"><?= $w_flash_message->message ?></span>
<!-- echo $w_flash_message->level; interprete l'argument success ou warning.... pr bootstrap(couleurs)-->
    <?php } ?>
	</div>


<!-- ============================================ -->
<!-- 					    Carousel principal							-->
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
				<img class="img-fluid mainCarouselImg" src="<?= $this->assetUrl('img/sliders/img1.jpg') ?>" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h3>Titre</h3>
					<hr class="hrCarousel mx-auto my-2">
					<p>Description</p>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid mainCarouselImg" src="<?= $this->assetUrl('img/sliders/img2.jpg') ?>" alt="...">
				<div class="row">
					<div class="carousel-caption d-none d-md-block">
						<h3>Titre</h3>
						<hr class="hrCarousel mx-auto my-2">
						<p>Description</p>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<img class="img-fluid mainCarouselImg" src="<?= $this->assetUrl('img/sliders/img3.jpg') ?>" alt="...">
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

  <!-- ============================================ -->
  <!-- 						   		Publicités  								-->
  <!-- ============================================ -->
  <div class="ads-column">
    <a href="#"><img src="<?= $this->assetUrl('img/pub/img1.jpg') ?>" alt="Publicité" class="img-fluid hvr-grow-rotate"></a>
    <a href="<?= $this->url('how_to') ?>"><img src="<?= $this->assetUrl('img/pub/img2.jpg') ?>" alt="Publicité" class="img-fluid hvr-grow"></a>
  </div>

  <div class="ads-vertical">
    <a href="#"><img src="<?= $this->assetUrl('img/pub/img3.jpg') ?>" alt="Publicité" class="img-fluid"></a>
  </div>
</div>


<!-- ============================================ -->
<!-- 								Commentaires 									-->
<!-- ============================================ -->
<hr class="hrpage my-3">
<div class="row">
  <div class="col-sm-12 col-lg-8">

  <?php	foreach($comments as $comment) { ?>
  		<div class="last-comments">
        <div class="row">
          <div class="mr-auto">
            <h6 class="bold user_comment"><?php echo $comment['username']; ?></h6>
          </div>
          <div class="ml-auto">
            <div class="row">
              <i>Posté le :
                <span class="date_comment"><?php echo date("d/m/Y à H:i", strtotime($comment['created_at'])); ?></span>
              </i>
            </div>
          </div>
        </div>
        <hr>
  			<p class="comment-content"><?php echo $comment['comment']; ?></p>
  		</div>
  		<?php } ?>
  </div>

  <div class="col-sm-12 col-lg-4">
    <div class="comments-container">
      <?php if(!empty($user)) { ?>
        <form class="comments-form" action="<?php $this->url('inscription_action'); ?>" method="POST">
          <div>
            <textarea name="comment" rows="8" cols="80" placeholder="Saisir votre commentaire..."><?php if (!empty($actualComment)) { echo $actualComment; } ?></textarea>
            <span class=error><?php if(!empty($error['comment'])){ echo $error['comment'];} ?></span>
            <input class="container-fluid row btn_ok mt-3 mx-auto px-auto w-100" type="submit" name="submit" value="Laisser un commentaire">
          </div>
        </form>
        <?php } ?>
      </div>
  </div>
</div>
<?php $this->stop('main_content') ?>
