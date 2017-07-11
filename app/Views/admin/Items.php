<?php $this->layout('back_layout', ['title' => 'liste articles']) ?>

<?php $this->start('main_content') ?>

<?php foreach ($categorie as $cat): ?>
  <a href="#"><?= $cat['family'] ?></a>
<?php endforeach; ?>

<div class="row">
  <div class="col-sm-12">

    <!-- Barre de pagination -->
    <div class="row pagination w-100 py-2">
      <?= $navPaginBar ?>
    </div>


    <div class="global">

      <?php foreach ($results as $result ): ?>
      <div class="box">
        <div class="product full">
          <a href="">
            <img src="<?= $this->assetUrl('img/uploaded_articles/'.$result['img_name']) ?>" >
          </a>
        </div>
        <div class="description">
          <?php echo $result['designation']; ?>
          <?php echo number_format($result['puht'],2,',', ' ').' €'; ?>
        </div>

        <a class="" href="<?=$this->url('admin_single_item', ['id' => $result['id']] ) ?>">
          <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editer">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </button>
        </a>
        <!-- BOUTON : Delete -->
        <a class="" href="<?=$this->url('admin_single_item_family_delete', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
          <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </button>
        </a>

      </div>
    <?php endforeach; ?>
  </div>

<div class="row pagination w-100 my-3">
  <?= $navPaginBar ?>
</div>

</div>
</div>

<?php $this->stop('main_content') ?>
