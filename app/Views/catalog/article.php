<?php $this->layout('layout', ['title' => $result['designation']]) ?>

<?php $this->start('main_content') ?>

<div class="row">
  <div class="col-md-8 p-0">
    <!-- Description de l'article -->
    <div class="description mt-4">
      <p><?= $result['description']; ?></p>
    </div>
  </div>

  <div class="col-md-4">
    <!-- Miniature de l'article -->
    <div class="image text-align-center mt-4">
      <a href="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" data-fancybox data-caption="<?= $result['designation']; ?>">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="mx-auto hvr-grow">
      </a>

      <div class="row mx-auto" style="text-decoration: none; max-width: 200px;">
        <ul class="p-0 m-0 d-flex" style="list-style: none;">
          <!-- Prix de l'article -->
          <li>
            <p class="article-single-price justify-content-start"><?= $result['puht']*1.20; ?>€</p>
          </li>

          <!-- BOUTON : Ajouter au panier -->
          <li class="d-flex">
            <a class="btn_basket justify-content-end" href="#" style="border-radius: 0;">
              <i class="fa fa-cart-arrow-down"></i>
            </a>
          </li>
        </ul>
      </div>

      <div class="packaging row mx-auto">
        <p class="my-2">Quantité : <span class="bold"><?= $result['packaging']; ?></span></p>
      </div>

    </div>


  </div>
</div>


<?php $this->stop('main_content') ?>
