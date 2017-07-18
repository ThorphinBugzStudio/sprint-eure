<?php

namespace Controller;

use Model\ItemsModel;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

/**
 * Controller Page panier.
 * A reformuler une fois le tuto assimilé / vu.
 */
class PanierController extends AppController
{

  /**
   * Formulaire Panier.
   *
   *
   * @return void
   */
  public function panier()
  {
    //tableau qui récupère les données stringified du js
    $array = json_decode($_GET['jsondata']);
    debug($_GET);
    $this->show('page_panier/panier');
  }

  /**
   * Traitement du formulaire panier.
   *
   * @return void
   */
  public function panierAction()
  {
    # code
  }

  public function addArticleToPanier($id)
  {
    $itemsM = new ItemsModel();

    $article = $itemsM->find($id);

    $data = ['id' => $article['id'],
           'puht' => $article['puht'],
    'designation' => $article['designation']];

    $this->showJson($data);
  }


}
