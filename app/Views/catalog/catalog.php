<?php $this->layout('layout', ['title' => 'Nos produits']) ?>

<?php $this->start('main_content') ?>


<?php $_ENV = 'Home' ?>

<a href="<?= $this->url('catalog_All')?>">Tous nos produits</a>
<?php foreach ($categorie as $cat): ?>
  <a href="<?= $this->url('catalog_all_page', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a>
<?php endforeach; ?>


<div class="container-fluid row pt-4 px-0 mainContent">
  <h2>Catégories</h2>
  <hr class="hrPage">
</div>

<div class="category-bar mt-4">
  <ul>
    <?php foreach ($categorie as $cat): ?>
      <li><a class="" href="<?= $this->url('admin_categorie_item', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>

<!-- Titre : Meilleures ventes -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2>Nos meilleures ventes</h2>
  <hr class="hrPage">
</div>


<!-- Contenu des meilleures ventes -->
<div class="top-product text-align-center single-article-container">
  <?php foreach ($topProduct as $result): ?>
    <div class="single-article m-3" id="img-article-1">

      <a href="#">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail">
      </a>

      <div class="single-article-price">
        <?= number_format($result['puht'],2,',', ' ').' €'; ?>
      </div>

      <div class="row my-2" style="display: flex;">
        <div class="mr-auto my-auto">
          <!-- Nom de l'article -->
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


<!-- Titre : Derniers produits -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2>Nos derniers produits</h2>
  <hr class="hrPage">
</div>

<!-- Contenu des derniers produits -->
<div class="lastproduct text-align-center single-article-container">
  <?php foreach ($lastProduct as $result): ?>
    <div class="single-article m-3" id="img-article-2">

      <a href="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" data-fancybox="lastproduct">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail">
      </a>

      <div class="single-article-price">
        <?= number_format($result['puht'],2,',', ' ').' €'; ?>
      </div>

      <div class="row my-2" style="display: flex;">
        <div class="mr-auto my-auto">
          <!-- Nom de l'article -->
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

<?php $this->stop('main_content') ?>
