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
num ligne
réf article
cat article
désignation
conditionnement
PUHT
Q
PTUH
<!-- PIED DE COMMANDE -->
RADIO BUTTONS changement de statut
TOTAL HT
TVA - taux de tva : montant de TVA
TOTAL TTC

<?php $this->stop('main_content') ?>
