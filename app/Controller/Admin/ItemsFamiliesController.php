<?php

namespace Controller\Admin;

use \Controller\AppController;

/**
 * Controller Gestion des categories d'articles en back office.
 */
class ItemsFamiliesController extends AppController
{
  
  /**
   * Listing des categories d'articles.
   *
   * @return void
   */
  public function itemsFamilies()
  {
    $this->show('admin/items-families');
  }

  /**
   * Détail d'une categorie d'article.
   * CRUD.
   *
   * @return void
   */
  public function singleItemFamily()
  {
    $this->show('admin/single-item-family');
  }

  /**
   * Traitement Formulaire d'une categorie d'article.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  public function singleItemFamilyAction()
  {
    # code
  }


}
