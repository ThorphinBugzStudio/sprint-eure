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

  public function Allcatalog()
  {
    $items = new ItemsModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin items pages navigation', $this->generateUrl('catalog_All'), $items->getNbId(), 8);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results  = $items->findAllproduct('status','active','created_at', 'DESC', 8);

    $this->show('catalog/catalog_All', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

}
