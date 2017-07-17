<?php $this->layout('layout', ['title' => $result['designation']]) ?>

<?php $this->start('main_content') ?>


    <div class="image">
      <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" >
    </div>

    <div class="description">
      <p><?= $result['description']; ?></p>
    </div>

    <div class="packaging">
      <p>quantitée: x<?= $result['packaging']; ?></p>
    </div>

    <div class="prix">
      <p>prix: <?= $result['puht']*1.20; ?></p>
    </div>

    <a class="" href="#">
        <i class="fa fa-cart-arrow-down"></i> Ajouter au panier
    </a>



<?php $this->stop('main_content') ?>
