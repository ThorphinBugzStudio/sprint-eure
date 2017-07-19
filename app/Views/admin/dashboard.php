<?php $this->layout('back_layout', ['title' => 'Dashboard']) ?>

<?php $this->start('main_content') ?>

<!-- =================================================== -->
<!--        WIDGET : Nouvelles choses sur le site        -->
<!-- =================================================== -->
<div class="col-sm-12 px-0">
  <!-- Section : Nouveaux commentaires -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-comments fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= $newcomments ?></div>
            <div>Nouveau(x) commentaire(s)</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section : Nouveaux utilisateurs -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-user fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= $allusers; ?></div>
            <div>Nouveau(x) client(s)</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section : Nouvelles commandes -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-shopping-cart fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= $nborders ?></div>
            <div>Nouvelle(s) commande(s)</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section : Devis en cours -->
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="panel panel-red">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-shopping-basket fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?= $allitems ?></div>
            <div>Nouveau(x) produit(s)</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- =============================================================== -->
<!--   WIDGET : Derniers commentaires/utilisateurs/devis/commandes   -->
<!-- =============================================================== -->
<div class="row px-4 mt-4">

  <!-- Derniers commentaires -->
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-comment fa-fw"></i> Derniers commentaires
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($comments as $comment): ?>
            <div class="list-group-item">
              <?= $comment['comment'] ?>
              <?php
              $date = new DateTime();
              $date1 = $date->format('Y-m-d H:i:s');
              $date2 = $comment['created_at'];
              $nbjours = round((strtotime($date1) - strtotime($date2))/(60*60*24)-1);
               ?>
              <span class="pull-right text-muted small"><em>Il y a <?= $nbjours ?> jour(s)</em></span>
            </div>
          <?php endforeach; ?>
          </div>
          <a href="<?= $this->url('admin_comments') ?>" class="btn btn-default btn-block">Voir tous les commentaires</a>
      </div>
    </div>
  </div>

  <!-- Derniers utilisateurs enregistrés -->
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="panel panel-green">
      <div class="panel-heading">
        <i class="fa fa-users fa-fw"></i> Derniers utilisateurs
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($users as $user ): ?>
            <div class="list-group-item">
              <?= $user['username']; ?>
              <?php
              $date = new DateTime();
              $date1 = $date->format('Y-m-d H:i:s');
              $date2 = $user['created_at'];
              $nbjours = round((strtotime($date1) - strtotime($date2))/(60*60*24)-1);
               ?>
              <span class="pull-right text-muted small"><em>Il y a <?= $nbjours ?> jour(s)</em></span>
            </div>
          <?php endforeach; ?>
          </div>
          <a href="<?= $this->url('admin_users') ?>" class="btn btn-default btn-block">Voir tous les utilisateurs</a>
      </div>
    </div>
  </div>

  <!-- Dernières commandes -->
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="panel panel-yellow">
      <div class="panel-heading">
        <i class="fa fa-shopping-cart fa-fw"></i> Dernières commandes
      </div>
      <div class="panel-body">
        <div class="list-group">
        <?php foreach ($orders as $order): ?>
          <div class="list-group-item">
            <?= $order['status'] ?>
            <?php
            $date = new DateTime();
            $date1 = $date->format('Y-m-d H:i:s');
            $date2 = $order['created_at'];
            $nbjours = round((strtotime($date1) - strtotime($date2))/(60*60*24)-1); ?>
            <span class="pull-right text-muted small"><em> il y a <?= $nbjours ?> jours</em></span>
          </div>
        <?php endforeach; ?>
        </div>
        <a href="<?= $this->url('admin_orders') ?>" class="btn btn-default btn-block">Voir toutes les commandes en cours</a>
      </div>
    </div>
  </div>

  <!-- Derniers produits -->
  <div class="row px-4 mt-4">
    <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
      <div class="panel panel-red">
        <div class="panel-heading">
          <i class="fa fa-shopping-basket fa-fw"></i> Derniers produits
        </div>
        <div class="panel-body">
          <div class="list-group">
            <?php foreach ($items as $item ): ?>
              <div class="list-group-item">
                <?= $item['designation']; ?>
                <?php
                $date = new DateTime();
                $date1 = $date->format('Y-m-d H:i:s');
                $date2 = $item['created_at'];
                $nbjours = round((strtotime($date1) - strtotime($date2))/(60*60*24)-1); ?>
                <span class="pull-right text-muted small"><em>il y a <?= $nbjours ?> jours</em></span>
              </div>
            <?php endforeach; ?>
            </div>
            <a href="<?= $this->url('admin_items') ?>" class="btn btn-default btn-block">Voir tous les produits</a>
        </div>
      </div>
    </div>
  </div>

</div>

<?php $this->stop('main_content'); ?>
