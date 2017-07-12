<?php $this->layout('back_layout', ['title' => 'Utilisateurs']) ?>

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
            <th>Pseudonyme</th>
            <th>Rôle</th>
            <th>Status</th>
            <th>Créé le</th>
            <th>Dernière modification le</th>
            <th>Action</th>
          </tr>
        </thead>
        <!-- Contenu du tableau -->
        <tbody>
          <?php $i = 0;
          if(!empty($results)) {
          foreach ($results as $result) { ?>
          <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $result['role']; ?></td>
            <td>
              <?php if($result['status'] == 'inactive') { ?>
                <img src="<?= $this->assetUrl('admin/img/delete.png') ?>" alt="Banni" title="Utilisateur banni">
              <?php } elseif($result['status'] == 'active') { ?>
                <img src="<?= $this->assetUrl('admin/img/icon-check.png') ?>" alt="Actif" title="Utilisateur actif">
              <?php } elseif($result['status'] == 'deleted') { ?>
                <img src="<?= $this->assetUrl('admin/img/delete.png') ?>" alt="Supprimé" title="Utilisateur supprimé">
              <?php } ?>
            </td>
            <td><?php echo $result['created_at']; ?></td>
            <td><?php echo $result['modified_at']; ?></td>
            <td class="menu_actions">
              <!-- BOUTON : Edition -->
              <a class="" href="<?=$this->url('admin_single_user', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editer">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
              </a>
              <!-- BOUTON : Delete -->
              <a class="" href="<?=$this->url('admin_delete_user', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </a>
            </td>
          </tr>

          <?php } } else { ?>
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
