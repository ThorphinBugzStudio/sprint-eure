<?php $this->layout('back_layout', ['title' => 'Commentaires']) ?>

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
          <?php $i = 0;
          foreach ($results as $result) { ?>
          <tr>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $result['comment']; ?></td>
            <td><?php echo $result['status']; ?></td>
            <td><?php echo $result['created_at']; ?></td>
            <td><?php echo $result['modified_at']; ?></td>
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
                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Approuver">
                   <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </button>
             </a> <?php } ?>
              <!-- BOUTON : Delete -->
              <a class="" href="<?=$this->url('admin_delete_comment', ['id' => $result['id'], 'fromPage' => $actualPageId] ) ?>">
                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </a>
            </td>
          </tr> <?php } ?>
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
