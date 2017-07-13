<?php $this->layout('layout', ['title' => 'Nos produits']) ?>

<?php $this->start('main_content') ?>


<?php $_ENV = 'Home' ?>

<div class="row w-100 ml-auto mt-2 justify-content-end category-row">
  <!-- BOUTON : Trier par catégorie -->
  <div class="btn-group category-button">
    <p type="button" class="my-auto mr-auto" >Catégorie</p>
    <i class="fa fa-angle-down ml-auto" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

    <div class="dropdown-menu category-content">
      <ul class="p-0">
        <li><a class="dropdown-item p-2" href="<?= $this->url('catalog_all')?>">» Tous les produits</a></li>
        <div class="dropdown-divider m-0"></div>
        <?php foreach ($categorie as $cat): ?>
          <li><a href="<?= $this->url('catalog_categorie_item', ['id' =>  $cat['id']])?>" class="dropdown-item p-1 px-2"><?= $cat['family'] ?></a></li>
        <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Titre : Meilleures ventes -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2>Nos meilleurs produits</h2>
  <hr class="hrPage">
</div>


<!-- Contenu des meilleures ventes -->
<div class="top-product text-align-center single-article-container">
  <?php foreach ($topProduct as $result): ?>
    <div class="single-article m-3" id="img-article-1">

      <a href="<?= $this->url('catalog_detail', ['id' =>  $result['id']])?>">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail hvr-glow">
      </a>

      <div class="single-article-price">
        <?= number_format($result['puht'],2,',', ' ').' €'; ?>
      </div>

      <div class="row my-2" style="display: flex;">
        <div class="mr-auto my-auto">
          <!-- Nom de l'article -->
          <div class="single-article-title">
            <a href="<?= $this->url('catalog_detail', ['id' =>  $result['id']])?>"><?= $result['designation']; ?></a>
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


<!-- Titre : Derniers produits -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2>Nos derniers produits</h2>
  <hr class="hrPage">
</div>

<!-- Contenu des derniers produits -->
<div class="lastproduct text-align-center single-article-container">
  <?php foreach ($lastProduct as $result): ?>
    <div class="single-article m-3" id="img-article-2">


      <a href="<?= $this->url('catalog_detail', ['id' =>  $result['id']])?>">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail">


      <div class="single-article-price">
        <?= number_format($result['puht'],2,',', ' ').' €'; ?>
      </div>

      <div class="row my-2" style="display: flex;">
        <div class="mr-auto my-auto">
          <!-- Nom de l'article -->
          <div class="single-article-title">
            <a href="<?= $this->url('catalog_detail', ['id' =>  $result['id']])?>"><?= $result['designation']; ?></a>
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

<?php $this->stop('main_content') ?>
