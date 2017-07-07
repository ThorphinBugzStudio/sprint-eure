<?php

namespace Controller\Admin;

use \Controller\AppController;

/**
 * Controller Gestion des articles en back office.
 */
class ItemsController extends AppController
{

  /**
   * Listing des articles.
   *
   * @return void
   */
  public function items()
  {
    $this->show('admin/items');
  }

  /**
   * Détail d'un article.
   * CRUD.
   *
   * @return void
   */
  public function singleItem()
  {
    $this->show('admin/single-item');
  }

  /**
   * Traitement Formulaire d'un article.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  //modification d un article
  public function singleItemAction()
  {
    # code
  }

  //ajout d'un article
  public function AddItem()
  {

  }


}
