<?php

namespace Controller;

use \Model\ItemsModel;
use \Model\ItemsFamilyModel;
use \Services\Tools\Pagination;
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

  public function detail($id)
  {
    $items = new ItemsModel();

    $result = $items->find($id);
    if(empty($result)){
      $this->redirectToRoute('catalog_404');
    } else {
      $this->show('catalog/article',  ['result' => $result] );
    }
  }

  public function allcatalog($page = '')
  {
    $items = new ItemsModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('items pages navigation', $this->generateUrl('catalog_all'), $items->getNbId(), 8);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);
    $results = $items->findAllproduct('status','active','created_at', 'DESC', $pageStatus['limit'], $pageStatus['offset']);
    $categorie = $items->nomcategorie();
    $this->show('catalog/catalog_all', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual'], 'categorie' => $categorie]);
  }

  public function familycatalog($id, $page = ''){
    $items = new ItemsModel();
    $family = new ItemsFamilyModel();
    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('items categorie pages navigation', $this->generateUrl('catalog_categorie_item', ['id' =>  $id]), $items->countIdcat($id), 4);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results = $items->findAllWhere($id, 'id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);
    $categorie = $items->nomcategorie();
    $nomcat = $family->find($id);
    if(empty($results)){
      $this->redirectToRoute('catalog_404');
    } else {
    $this->show('catalog/catalog_all', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual'], 'categorie' => $categorie, 'nomcat' => $nomcat]);
  }
  }

  public function erreur404() {
     $this->show('w_errors/404');
  }

}
