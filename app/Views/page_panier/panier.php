<?php $this->layout('layout', ['title' => 'Panier']) ?>

<?php $this->start('main_content') ?>

<!-- En TETE DU PANIER A VALIDER / PAYER -->
<div class="headOrder">
   <!-- numero de commande -->

</div>
<!-- LIGNES DU PANIER -->
<div class="rowsOrder mt-4">
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
         <th>Prix total HT</th>
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


<!-- Totaux panier -->
<div class="text-align-right">
  <hr class="hrPage mt-1">
  <h5 class="pageBasket_total mb-0">Total HT : <span><?= $footOrder['totalHt'] ?> € </span></h5>
  <h5 class="pageBasket_total mb-0">Total TVA <i>(20.00%)</i> : <span><?= $footOrder['totalTva'] ?> €</span></h5>
  <hr class="hrPage">
  <h5 class="pageBasket_total pageBasket_total_TTC mb-0">Total TTC : <span><?= $footOrder['totalTTC'] ?> €</span></h5>
  <hr class="hrPage">
</div>


<!-- PIED DE PANIER -->
<div class="footerOrder">
   <!-- Radios buttons Mode de paiement -->
   <form id="formPay" class="form-subscribe row " action="<?php $this->url('panier_client_action'); ?>" method="POST">

      <div class="form-group paiement mt-4">
         <?= $modesPayBox ?>
      </div>

      <div class="row btn_pageBasket text-align-center my-2">
        <!-- Bouton d'envoi -->
        <input class="btn_ok" type="submit" name="submit" value="Payer">
        <!-- Retour vers accueil -->
        <a href="<?= $this->url('default_home') ?>"><button type="button" class="btn_cancel">Retour</button></a>
      </div>
   </form>

</div>


<?php $this->stop('main_content') ?>
