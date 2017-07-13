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
RADIO BUTTONS changement de statut
TOTAL HT
TVA - taux de tva : montant de TVA
TOTAL TTC

<?php $this->stop('main_content') ?>
