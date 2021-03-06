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
        <i class="fa fa-picture-o fa-fw"></i> Liste de tous les articles
      </div>
      <div class="text-align-center single-article-container">
        <?php foreach ($results as $result ): ?>
          <div class="single-article m-3" id="test">

            <a href="<?=$this->url('admin_single_item', ['id' => $result['id']] ) ?>">
              <img src="<?= $this->assetUrl('img/uploaded_articles/'. $result['img_name']) ?>" alt="Miniature" class="thumbnail">
            </a>

            <div class="single-article-price">
              <?= number_format($result['puht'],2,',', ' ').' € HT'; ?>
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
                <?php if($result['status'] == 'deleted') { ?>
                  <img src="<?= $this->assetUrl('admin/img/delete.png') ?>" alt="Supprimé" title="Article supprimé">
                <?php } elseif($result['status'] == 'active') { ?>
                  <img src="<?= $this->assetUrl('admin/img/icon-check.png') ?>" alt="Actif" title="Article actif">
                <?php } ?>
              </div>

              <!-- Boutons d'action sur l'article -->
              <div class="text-align-right">
                <!-- BOUTON : Edition -->
                <a href="<?=$this->url('admin_single_item', ['id' => $result['id']] ) ?>">
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

  <div class="col-sm-12 col-md-3 py-3">
    <!-- Section : Rechercher -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-search fa-fw"></i> Rechercher
      </div>
      <div class="p-4">
        <form class="search mr-auto" action="<?= $this->url('admin_search') ?>" method="post">
          <input type="text" name="recherche" placeholder="Rechercher un produit..." class="input-back" style="border-radius: 8px 0 0 8px; width: none;">
          <input type="submit" name="submit" value="&#xf002" class="fa-input px-3">
        </form>
      </div>
    </div>

    <!-- Section : Trier par catégorie -->
    <div class="panel panel-default mt-4">
      <div class="panel-heading">
        <i class="fa fa-folder fa-fw"></i> Trier par catégorie
      </div>
      <div class="search_per_category p-4">
        <a href="<?= $this->url('admin_items') ?>">» Tous les produits</a>
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
