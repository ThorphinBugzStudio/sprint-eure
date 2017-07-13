<?php $this->layout('layout', ['title' => 'Tous les produits']) ?>

<?php $this->start('main_content') ?>

<a href="<?= $this->url('catalog_all')?>">tous nos produits</a>
<?php foreach ($categorie as $cat): ?>
  <a href="<?= $this->url('catalog_categorie_item', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a>
<?php endforeach; ?>

<!-- Barre de pagination -->
<div class="row pagination w-100 py-2">
  <?= $navPaginBar ?>
</div>

<div class="row">
  <div class="col-sm-12 col-md-9 py-3 " style="justify-content: space-around;">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-picture-o fa-fw"></i> Liste de tous les articles
      </div>
      <div class="text-align-center single-article-container">
        <?php foreach ($results as $result ): ?>
          <div class="single-article m-3" id="test">

            <a href="#">
              <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail">
            </a>

            <div class="single-article-price">
              <?= number_format($result['puht'],2,',', ' ').' €'; ?>
            </div>

            <div class="row px-4 my-2" style="display: flex;">
              <div class="mr-auto my-auto">
                <!-- Titre de l'article -->
                <div class="single-article-title">
                  <?= $result['designation']; ?>
                </div>
              </div>
            </div>

            <hr class="hrSingleArticle m-0 mb-3">

          </div>
        <?php endforeach; ?>

        <?php if(empty($result)) { ?>
          <p class="p-4">Il n'y a aucun produit à afficher.</p>
        <?php } ?>
      </div>
    </div>
  </div>


</div>

<!-- Barre de pagination -->
<div class="row pagination w-100 my-3">
  <?= $navPaginBar ?>
</div>

<?php $this->stop('main_content') ?>
