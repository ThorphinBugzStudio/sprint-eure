<?php

namespace Controller;

use \Model\ItemsModel;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

/**
 * Controller catalogue d'article.
 */
class CatalogController extends AppController
{
  /**
   * Page d'affichage du catalogue d'article en vente.
   * Alimentation du panier / selection categorie.
   *
   * @return void
   */
  public function catalog()
  {
    $items = new ItemsModel();

    $topProduct   = $items->findAllproduct('home','1','modified_at', 'ASC', 4);
    $lastProduct  = $items->findAllproduct('status','active','created_at', 'DESC', 4);
    $categorie = $items->nomcategorie();
    $this->show('catalog/catalog',  ['categorie' => $categorie, 'topProduct' => $topProduct, 'lastProduct' => $lastProduct]);
  }
}
