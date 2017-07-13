<?php $this->layout('back_layout', ['title' => 'Gestion des commandes']) ?>

<?php $this->start('main_content') ?>

<!-- 'headOrder' => $headOrder,
'rowsOrder' => $rowsOrder,
'footOrder' => $footOrder,
'statusBox' => $statusBox->getHtml(), -->

<!-- En TETE DE LA COMMANDE -->
<div class="headOrder">
   <!-- numero de commande -->
   <h2>Details de la commande n° <?= $headOrder['id'] ?></h1>
   <!-- client    -->
   <p>émise par : <?= $headOrder['username'] ?></p>
   <p>Nom :<?= $headOrder['lastName'] ?></p>
   <p>Prénom :<?= $headOrder['firstName'] ?></p>
   <!-- Date de commande et statut actuel -->
   <p>Le <?= $headOrder['created_at'] ?></p>
   <!-- statuts possible = paid, checked, prepared, sent (Payée, Validée, Preparée, Expediée) -->
   <p>Statut actuel : <?= $headOrder['status'] ?></p>
</div>
<!-- LIGNES DE LA COMMANDE -->
<div class="rowsOrder">
   <table class="table table-striped table-bordered table-hover">
     <!-- En-tête de tableau -->
     <thead>
       <tr>
         <th>#</th>
         <th>Réf.</th>
         <th>Cat.</th>
         <th>Désignation</th>
         <th>Par</th>
         <th>PUHT</th>
         <th>Q</th>
         <th>PTHT</th>
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
         <td><?php echo $rowOrder['puht']; ?></td>
         <td><?php echo $rowOrder['amount']; ?></td>
         <td><?php echo $rowOrder['pht']; ?></td>

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
</div>
<!-- PIED DE COMMANDE -->
<div class="footerOrder">
   <!-- Radios buttons changement de statut -->
   <form id="formChangeStatus" class="form-subscribe row " action="<?php $this->url('admin_single_order_action', ['id' => $headOrder['id'], 'fromPage' => $page]); ?>" method="POST">

      <div class="form-group">
         <?= $statusBox ?>
      </div>

      <!-- Bouton d'envoi -->
      <input class="btn_ok" type="submit" name="submit" value="Mettre à jour">
      <!-- Retour vers listing -->
      <a href="<?= $this->url('admin_page_orders', ['page' => $page]) ?>"><button type="button" class="btn_cancel">Retour</button></a>

   </form>
   <!-- Totaux commande -->
   <div class="">
      <h5>TOTAL HT : <?= $footOrder['totalHt'] ?> €</h5>
      <h5>TOTAL TVA <?= $headOrder['vat_percentage'] ?>% : <?= $footOrder['totalTva'] ?> €</h5>
      <h5>TOTAL TTC : <?= $footOrder['totalTTC'] ?> €</h5>
   </div>

</div>

<?php $this->stop('main_content') ?>
