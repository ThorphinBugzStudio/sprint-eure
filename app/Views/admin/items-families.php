<?php $this->layout('back_layout', ['title' => 'Catégories']) ?>

<?php $this->start('main_content') ?>

<div class="row">
  <div class="col-sm-12">

    <!-- Barre de pagination -->
    <div class="row pagination w-100 py-2">
      <?= $navPaginBar ?>
    </div>

    <div class="panel panel-default" style="overflow-x:auto;">
      <table class="table table-striped table-bordered table-hover">
        <!-- En-tête de tableau -->
        <thead>
          <tr>
            <th>ID</th>
            <th>Catégorie</th>
            <th>Status</th>
            <th>Créé le</th>
            <th>Dernière modification le</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // CONDITION : Si il y a du contenu dans la base de données, alors on affiche tout ce qui concerne la page.
          $i = 0;
          foreach ($results as $result) { ?>
          <tr>
            <!-- ID des catégories -->
            <td><?php echo $result['id']; ?></td>

            <!-- Noms des catégories -->
            <td><?php echo $result['family']; ?></td>

            <!-- État de la catégorie (Visible ou supprimée) -->
            <td>
              <?php if($result['status'] == 'deleted') { ?>
                <img src="<?= $this->assetUrl('admin/img/delete.png') ?>" alt="Supprimée" title="Catégorie supprimée">
              <?php } elseif($result['status'] == 'active') { ?>
                <img src="<?= $this->assetUrl('admin/img/icon-check.png') ?>" alt="Actif" title="Catégorie active">
              <?php } ?>
            </td>

            <!-- Date de création du commentaire -->
            <td><?php echo date('d/m/Y à H:i:s', strtotime($result['created_at'])); ?></td>

            <!-- Date de modification du commentaire -->
            <td>
              <?php if(date('d/m/Y à H:i:s', strtotime($result['modified_at'])) == '01/01/1970 à 01:00:00') {
                echo '';
              } else {
                echo date('d/m/Y à H:i:s', strtotime($result['modified_at']));
              } ?>
            </td>


            <td class="menu_actions">
              <!-- BOUTON : Edition -->
              <a class="" href="<?=$this->url('admin_single_item_family', ['id' => $result['id']] ) ?>">
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
            </td>
          </tr>
          <?php } ?>

          <?php if(empty($result)) { ?>
            <tr>
              <td> - </td>
              <td> - </td>
              <td> - </td>
              <td> - </td>
              <td> - </td>
              <td> - </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>

    <!-- Barre de pagination -->
    <div class="row pagination w-100 my-3">
      <?= $navPaginBar ?>
    </div>

  </div>
</div>

<?php $this->stop('main_content'); ?>
