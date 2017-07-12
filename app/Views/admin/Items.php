<?php $this->layout('back_layout', ['title' => 'Tous les produits']) ?>

<?php $this->start('main_content') ?>

<!-- Barre de pagination -->
<div class="row pagination w-100 py-2">
  <?= $navPaginBar ?>
</div>

<div class="row">
  <div class="col-sm-12 col-md-9 py-3 " style="justify-content: space-around;">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-picture-o fa-fw"></i> Miniature de l'article
      </div>
      <div class="text-align-center" style="justify-content: space-around;">
        <?php foreach ($results as $result ): ?>
          <div class="single-article m-3" id="test">

            <a href="#">
              <img src="<?= $this->assetUrl('img/uploaded_articles/'.$result['img_name']) ?>" alt="Miniature" class="thumbnail">
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

            <div class="row px-4" style="display: flex;">
              <div class="mr-auto my-auto">
                <!-- État de l'article-->
                <?= $result['status']; ?>
              </div>

              <!-- Boutons d'action sur l'article -->
              <div class="text-align-right">
                <!-- BOUTON : Edition -->
                <a class="" href="<?=$this->url('admin_single_item', ['id' => $result['id']] ) ?>">
                  <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editer">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                </a>
                <!-- BOUTON : Delete -->
                <a class="" href="<?=$this->url('admin_single_item_delete', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                  <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if(empty($result)) { ?>
          <p class="p-4">Il n'y a aucun produit à afficher.</p>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Section : Trier par catégorie -->
  <div class="col-sm-12 col-md-3 py-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-folder fa-fw"></i> Trier par catégorie
      </div>
      <div class="search_per_category p-4">
        <a href="/sprint-eure/public/admin/items">tout les produits</a>
        <?php foreach ($categorie as $cat): ?>
          <a href="<?= $this->url('admin_categorie_item', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a>
        <?php endforeach; ?>

        <?php if(empty($cat)) { ?>
          <p>Il n'y a aucune catégorie à afficher.</p>
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
