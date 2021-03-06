<?php $this->layout('layout', ['title' => 'Tous les produits']) ?>

<?php $this->start('main_content') ?>

<?php $_ENV = 'Home' ?>

<!-- <form class="search" action="search/[:id]" method="post">
  <input type="text" name="recherche" value="">
  <input type="submit" name="submit" value="rechercher">
</form> -->

<div class="row w-100 ml-auto mt-2 justify-content-end category-row">
  <div class="mr-auto">
    <form class="search mr-auto" action="<?= $this->url('catalog_search') ?>" method="post">
      <input type="text" name="recherche" placeholder="Rechercher un produit..." class="input-form" style="border-radius: 8px 0 0 8px; width: none;">
      <input type="submit" name="submit" value="&#xf002" class="fa-input px-3">
    </form>
</div>

  <!-- BOUTON : Retour à la page des articles -->
  <div class="row category-button-return">
      <a class="my-auto mr-auto" href="<?= $this->url('catalog') ?>">
        <i class="fa fa-reply mr-auto my-auto" aria-hidden="true" style="margin-right: 5px;"></i>
        Retour
      </a>
  </div>

  <!-- BOUTON : Prix par ordre croissant -->
  <div class="row category-button-return" style="background-color: #5b984c;">
    <a class="my-auto mr-auto" href="<?= $this->url('catalog_categorie_item_priceASC', ['id' =>  $id])?>">
      <i class="fa fa-arrow-up mr-auto my-auto" aria-hidden="true" style="margin-right: 5px;"></i>
      Prix croissant
    </a>
  </div>

  <!-- BOUTON : Prix par ordre décroissant -->
  <div class="row category-button-return" style="background-color: #ce741c;">
    <a class="my-auto mr-auto" href="<?= $this->url('catalog_categorie_item_priceDESC', ['id' =>  $id])?>">
      <i class="fa fa-arrow-down mr-auto my-auto" aria-hidden="true" style="margin-right: 5px;"></i>
      Prix décroissant
    </a>
  </div>

  <!-- BOUTON : Trier par catégorie -->
  <div class="btn-group category-button">
    <p type="button" class="my-auto mr-auto" >Categories</p>
    <i class="fa fa-angle-down ml-auto" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

    <div class="dropdown-menu category-content">
      <ul class="p-0">
        <li><a class="dropdown-item2 p-2" href="<?= $this->url('catalog_all')?>">» Tous les produits</a></li>
        <div class="dropdown-divider m-0"></div>
        <?php foreach ($categorie as $cat): ?>
          <li><a href="<?= $this->url('catalog_categorie_item', ['id' =>  $cat['id']])?>" class="dropdown-item2 p-1 px-2"><?= $cat['family'] ?></a></li>
        <?php endforeach; ?>
    </div>
  </div>
</div>


<?php if(isset($nomcat)) { ?>

<!-- TITRE : Catégorie de produit -->
<div class="container-fluid row pt-4 px-0 mainContent">
  <h2><?= $nomcat['family'] ?></h2>
  <hr class="hrPage">
</div>
<?php } else { ?>
  <div class="container-fluid row pt-4 px-0 mainContent">
    <h2>Tous nos produits</h2>
    <hr class="hrPage">
  </div>
  <?php } ?>

<!-- Contenu de tous les produits -->
<div class="top-product text-align-center single-article-container">
  <?php foreach ($results as $result ): ?>
    <div class="single-article m-3" id="img-article-3">

      <!-- Miniature de l'article -->
      <a href="<?= $this->url('catalog_detail', ['id' =>  $result['id']])?>">
        <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail hvr-glow">
      </a>

      <!-- Affichage du prix -->
      <div class="single-article-price">
        <?= number_format($result['puht']*1.20,2,',', ' ').' €'; ?>
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

      <div style="height:46px;"></div>

      <!-- BOUTON : Ajouter au panier -->
      <div class="row btn_basket-bottom">
        <div class="row mx-auto p-relative">
          <a class="btn_basket" href="<?= $this->url('ajouter_au_panier',array('id'=> $result['id'])); ?>">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
            Ajouter au panier
          </a>
        </div>
      </div>

    </div>
  <?php endforeach; ?>
</div>

<?php // CONDITION : Si il n'y a pas d'articles à afficher, alors ce message apparaît.
  if(empty($result)) { ?>
    <p>Il n'y a aucun produit à afficher.</p>
<?php } ?>

<!-- Barre de pagination -->
<div class="row pagination w-100 my-3 justify-content-center">
  <?php if(!empty($result)) {
    echo $navPaginBar;
  } ?>
</div>

<?php $this->stop('main_content') ?>
