<?php $this->layout('layout', ['title' => 'Tous les produits']) ?>

<?php $this->start('main_content') ?>

<?php $_ENV = 'Home' ?>

<div class="row w-100 ml-auto mt-2 justify-content-end category-row">

  <div class="row category-button-return" style="margin-right: 5px;">
      <a class="my-auto mr-auto" href="<?= $this->url('catalog') ?>">
        <i class="fa fa-reply mr-auto my-auto" aria-hidden="true" style="margin-right: 5px;"></i>
        Retour
      </a>
  </div>

  <div class="category-button row">
    <p class="my-auto mr-auto">Catégorie</p>
    <i class="fa fa-angle-down ml-auto" aria-hidden="true" id="category-article"></i>
  </div>

  <div class="hidden category-content" id="category_content">
    <ul class="p-0">
      <li><a href="<?= $this->url('catalog_all')?>">» Tous nos produits</a></li>
      <hr class="my-1">
      <?php foreach ($categorie as $cat): ?>
        <li><a href="<?= $this->url('catalog_categorie_item', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<!-- Titre : Meilleures ventes -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2><?= $cat['family'] ?></h2>
  <hr class="hrPage">
</div>

<!-- Contenu de tous les produits -->
<div class="top-product text-align-center single-article-container">
  <?php foreach ($results as $result ): ?>
    <div class="single-article m-3" id="img-article-3">
      <a href="#">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail hvr-glow">
      </a>

      <div class="single-article-price">
        <?= number_format($result['puht'],2,',', ' ').' €'; ?>
      </div>

      <div class="row my-2" style="display: flex;">
        <div class="mr-auto my-auto">
          <!-- Titre de l'article -->
          <div class="single-article-title">
            <a href="#"><?= $result['designation']; ?></a>
          </div>
        </div>
      </div>

      <hr class="hrSingleArticle m-0 mb-3">

      <!-- BOUTON : Ajouter au panier -->
      <div class="row" style="display: flex;">
        <div class="row mx-auto">
          <a class="btn_basket" href="#">
              <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Ajouter au panier
          </a>
        </div>
      </div>

    </div>
  <?php endforeach; ?>
</div>

<?php if(empty($result)) { ?>
  <p>Il n'y a aucun produit à afficher.</p>
<?php } ?>

<!-- Barre de pagination -->
<div class="row pagination w-100 my-3 justify-content-center">
  <?php if(!empty($result)) {
    echo $navPaginBar;
  } ?>
</div>

<?php $this->stop('main_content') ?>
