<?php $this->layout('back_layout', ['title' => 'Gestion des commandes']) ?>

<?php $this->start('main_content') ?>

<!-- 'headOrder' => $headOrder,
'rowsOrder' => $rowsOrder,
'footOrder' => $footOrder,
'statusBox' => $statusBox->getHtml(), -->

<div class="global">
  <div class="col-sm-12 col-md-8 py-3 px-0">
    <!-- LIGNES DE LA COMMANDE -->
    <div class="rowsOrder">
      <table class="table table-striped table-bordered table-hover">
        <!-- En-tête de tableau -->
        <thead>
          <tr>
            <th>#</th>
            <th>Réf.</th>
            <th>Catégorie</th>
            <th>Désignation</th>
            <th>Par</th>
            <th>Prix Unitaire HT</th>
            <th>Qté</th>
            <th>Prix Total HT</th>
          </tr>
        </thead>
        <!-- Contenu du tableau -->
        <tbody>
          <?php $i = 0;
          if(!empty($rowsOrder)) {
            foreach ($rowsOrder as $rowOrder) {
              $i++; ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rowOrder['items_id']; ?></td>
                <td><?php echo $rowOrder['family']; ?></td>
                <td><?php echo $rowOrder['designation']; ?></td>
                <td><?php echo $rowOrder['packaging']; ?></td>
                <td><?php echo $rowOrder['puht']; ?> €</td>
                <td><?php echo $rowOrder['amount']; ?></td>
                <td><?php echo $rowOrder['pht']; ?> €</td>
              </tr>
                <?php } } else { ?>
                  <tr>
                    <td> - </td>
                    <td> - </td>
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

      <!-- Totaux commande -->
      <div class="text-align-right">
        <hr>
        <h5 class="pageBasket_total">TOTAL HT : <span><?= $footOrder['totalHt'] ?> €</span></h5>
        <h5 class="pageBasket_total">TOTAL TVA <i>(<?= $headOrder['vat_percentage'] ?>%)</i> : <span><?= $footOrder['totalTva'] ?> €</span></h5>
        <hr>
        <h5 class="pageBasket_total pageBasket_total_TTC">TOTAL TTC : <span><?= $footOrder['totalTTC'] ?> €</span></h5>
        <hr>
      </div>

    </div>
  </div>

  <div class="col-sm-12 col-md-4 py-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-shopping-basket fa-fw"></i> Détails de la commande N° <?= $headOrder['id'] ?>
      </div>
      <div class="p-4">
        <div class="form-group">
          <div class="row px-4">
            <!-- En TETE DE LA COMMANDE -->
            <div class="headOrder">
              <!-- client    -->
              <p>Émise par : <span class="bold"><?= $headOrder['username'] ?></span></p>
              <p>Nom : <span class="bold"><?= $headOrder['lastName'] ?></span></p>
              <p>Prénom : <span class="bold"><?= $headOrder['firstName'] ?></span></p>
              <!-- Date de commande et statut actuel -->
              <p>Le : <span class="bold"><?= $headOrder['created_at'] ?></span></p>
              <!-- statuts possible = paid, checked, prepared, sent (Payée, Validée, Preparée, Expediée) -->
              <p>Statut actuel : <span class="bold"><?= $headOrder['status'] ?></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-default mt-4">
      <div class="panel-heading">
        <i class="fa fa-gear fa-fw"></i> Paramètres
      </div>
      <div class="p-4 text-align-center">

        <!-- PIED DE COMMANDE -->
        <div class="footerOrder px-4">
          <!-- Radios buttons changement de statut -->
          <form id="formChangeStatus" class="form-subscribe row " action="<?php $this->url('admin_single_order_action', ['id' => $headOrder['id'], 'fromPage' => $page]); ?>" method="POST">
            <!-- Status : Payé ou non -->
            <div class="form-group">
              <?= $statusBox ?>
            </div>

            <!-- Bouton d'envoi -->
            <input class="btn_ok" type="submit" name="submit" value="Mettre à jour">
            <!-- Retour vers listing -->
            <a href="<?= $this->url('admin_page_orders', ['page' => $page]) ?>"><button type="button" class="btn_cancel">Retour</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->stop('main_content') ?>
