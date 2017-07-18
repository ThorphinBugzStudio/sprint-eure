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
            <div class="huge">0</div>
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
            <div class="huge">0</div>
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
            <div class="huge">0</div>
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
            <i class="fa fa-file-text-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">0</div>
            <div>Devis en cours</div>
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
          <a href="#" class="list-group-item">
            <i class="fa fa-comment fa-fw"></i> Nouveau commentaire
            <span class="pull-right text-muted small"><em>8 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-comment fa-fw"></i> Nouveau commentaire
            <span class="pull-right text-muted small"><em>55 minutes ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-comment fa-fw"></i> Nouveau commentaire
            <span class="pull-right text-muted small"><em>14 minutes ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-comment fa-fw"></i> Nouveau commentaire
            <span class="pull-right text-muted small"><em>12 minutes ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-comment fa-fw"></i> Nouveau commentaire
            <span class="pull-right text-muted small"><em>7 minutes ago</em></span>
          </a>
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
          <a href="#" class="list-group-item">
            <i class="fa fa-user fa-fw"></i> Nouvel utilisateur
            <span class="pull-right text-muted small"><em>23 days ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-user fa-fw"></i> Nouvel utilisateur
            <span class="pull-right text-muted small"><em>15 days ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-user fa-fw"></i> Nouvel utilisateur
            <span class="pull-right text-muted small"><em>8 days ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-user fa-fw"></i> Nouvel utilisateur
            <span class="pull-right text-muted small"><em>12 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-user fa-fw"></i> Nouvel utilisateur
            <span class="pull-right text-muted small"><em>5 minutes ago</em></span>
          </a>
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
          <a href="#" class="list-group-item">
            Commande 3
            <span class="pull-right text-muted small"><em>10 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Commande 2
            <span class="pull-right text-muted small"><em>10 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Commande 1
            <span class="pull-right text-muted small"><em>9 hours ago</em></span>
          </a>
        </div>
        <a href="<?= $this->url('admin_orders') ?>" class="btn btn-default btn-block">Voir toutes les commandes en cours</a>
      </div>
    </div>
  </div>

  <!-- Derniers devis -->
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="panel panel-red">
      <div class="panel-heading">
        <i class="fa fa-file-text-o fa-fw"></i> Derniers devis
      </div>
      <div class="panel-body">
        <div class="list-group">
          <a href="#" class="list-group-item">
            Devis 3
            <span class="pull-right text-muted small"><em>15 days ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Devis 2
            <span class="pull-right text-muted small"><em>12 days ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Devis 1
            <span class="pull-right text-muted small"><em>1 day ago</em></span>
          </a>
        </div>
        <a href="#" class="btn btn-default btn-block">Voir tous les devis en cours</a>
      </div>
    </div>
  </div>

</div>

<!-- ==================================================== -->
<!--                WIDGET : Derniers produits            -->
<!-- ==================================================== -->

<!-- Derniers produits -->
<div class="row px-4 mt-4">
  <div class="col-sm-12 mb-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <i class="fa fa-shopping-basket fa-fw"></i> Derniers produits
      </div>
      <div class="panel-body">
        <div class="list-group">
          <a href="#" class="list-group-item">
            Produit 5
            <span class="pull-right text-muted small"><em>23 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Produit 4
            <span class="pull-right text-muted small"><em>23 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Produit 3
            <span class="pull-right text-muted small"><em>23 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Produit 2
            <span class="pull-right text-muted small"><em>12 hours ago</em></span>
          </a>
          <a href="#" class="list-group-item">
            Produit 1
            <span class="pull-right text-muted small"><em>57 minutes ago</em></span>
          </a>
          </div>
          <a href="<?= $this->url('admin_items') ?>" class="btn btn-default btn-block">Voir tous les produits</a>
      </div>
    </div>
  </div>
</div>


<?php $this->stop('main_content'); ?>
