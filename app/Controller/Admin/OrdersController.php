<?php

namespace Controller\Admin;

use \Controller\AppController;

/**
 * Controller Gestion des commandes en back office.
 */
class OrdersController extends AppController
{
  /**
   * Listing des commandes
   *
   * @return void
   */
  public function orders()
  {
    $this->show('admin/orders');
  }

  /**
   * Détail d'une commande.
   * RD + Gestion du statut de commande.
   *
   * @return void
   */
  public function singleOrder()
  {
    $this->show('admin/single-order');
  }

  /**
   * Traitement Détail d'une utilisateur.
   * Recuperation via POST du type d'action sur le statut.
   *
   * @return void
   */
  public function SingleOrderAction()
  {
    # code
  }  


}
