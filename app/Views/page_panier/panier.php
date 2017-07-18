<?php $this->layout('layout', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>

<!-- En TETE DU PANIER A VALIDER / PAYER -->
<div class="headOrder">
   <!-- numero de commande -->

</div>
<!-- LIGNES DU PANIER -->
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
<!-- PIED DE PANIER -->
<div class="footerOrder">
   <!-- Radios buttons Mode de paiement -->
   <form id="formPay" class="form-subscribe row " action="<?php $this->url('panier_client_action'); ?>" method="POST">

      <div class="form-group">
         <?= $modesPayBox ?>
      </div>

      <!-- Bouton d'envoi -->
      <input class="btn_ok" type="submit" name="submit" value="Payer">
      <!-- Retour vers accueil -->
      <a href="<?= $this->url('default_home') ?>"><button type="button" class="btn_cancel">Retour</button></a>

   </form>
   <!-- Totaux panier -->
   <div class="">
      <h5>TOTAL HT : <?= $footOrder['totalHt'] ?> €</h5>
      <h5>TOTAL TVA 20.00% : <?= $footOrder['totalTva'] ?> €</h5>
      <h5>TOTAL TTC : <?= $footOrder['totalTTC'] ?> €</h5>
   </div>

</div>


<?php $this->stop('main_content') ?>
