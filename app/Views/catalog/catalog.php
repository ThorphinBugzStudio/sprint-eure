<?php $this->layout('layout', ['title' => 'Catalog']) ?>

<?php $this->start('main_content') ?>

<?php foreach ($categorie as $cat): ?>
  <a href="<?= $this->url('admin_categorie_item', ['id' =>  $cat['id']])?>"><?= $cat['family'] ?></a>
<?php endforeach; ?>


<div class="top-product">
  <?php foreach ($topProduct as $result): ?>
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
</div>

<div class="lasproduct">

  <?php foreach ($lastProduct as $result): ?>
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
</div>

<?php $this->stop('main_content') ?>
