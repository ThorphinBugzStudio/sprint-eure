<?php $this->layout('back_layout', ['title' => 'admin Single Order']) ?>

<?php $this->start('main_content') ?>

<h1>Details d'une commande</h1>

<!-- En TETE DE LA COMMANDE -->
Commande n°
émise par
Le
STATUS
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
