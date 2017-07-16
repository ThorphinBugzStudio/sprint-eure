<?php $this->layout('back_layout', ['title' => 'Approbation des commentaires']) ?>

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
            <th>Auteur</th>
            <th>Contenu</th>
            <th>Status</th>
            <th>Créé le</th>
            <th>Dernière modification le</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          // CONDITION : Si il y a du contenu dans la base de données, alors on affiche tout ce qui concerne la page.
          $i = 0;
          if(!empty($results)) {
          foreach ($results as $result) { ?>
          <tr>
            <!-- ID des commentaires -->
            <td><?php echo $result['id']; ?></td>

            <!-- Pseudo des utilisateurs -->
            <td><?php echo $result['username']; ?></td>

            <!-- Contenu du commentaire -->
            <td><?php echo $result['comment']; ?></td>

            <!-- État du commentaire (Visible, en attente ou supprimé) -->
            <td>
              <?php if($result['status'] == 'inactive') { ?>
                <img src="<?= $this->assetUrl('admin/img/attente.png') ?>" alt="Inactif" title="Commentaire en attente">
              <?php } elseif($result['status'] == 'active') { ?>
                <img src="<?= $this->assetUrl('admin/img/icon-check.png') ?>" alt="Actif" title="Commentaire activé">
              <?php } elseif($result['status'] == 'deleted') { ?>
                <img src="<?= $this->assetUrl('admin/img/delete.png') ?>" alt="Supprimé" title="Commentaire supprimé">
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
              <!-- BOUTON : Approve -->
              <?php if ($result['status'] != 'active') { ?>
              <a class="" href="<?=$this->url('admin_approve_comment', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Approuver">
                   <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </button>
             </a> <?php } ?>
              <!-- or BOUTON : Not Approve -->
              <?php if ($result['status'] == 'active') { ?>
              <a class="" href="<?=$this->url('admin_notapproved_comment', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Approuver">
                   <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                </button>
             </a> <?php } ?>
              <!-- BOUTON : Delete -->
              <a class="" href="<?=$this->url('admin_delete_comment', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
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

<?php $this->stop('main_content') ?>
