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

      debug($_SESSION);
      

   // $panier = json_decode($_COOKIE['caddie']);
   // debug($panier);

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

  /**
   * Retourne article en JSON.
   * Script pour Ajax dans panier.js
   *
   * @param int $id 
   * @return JSON
   */
  public function addArticleToPanier($id)
  {
    $itemsM = new ItemsModel();

    $article = $itemsM->find($id);

    $data = ['id' => $article['id'],
           'puht' => $article['puht'],
    'designation' => $article['designation']];

    $this->showJson($data);
  }

  /**
   * Set $_Session avec le panier js
   * Script pour Ajax dans panier.js
   *
   * @return void
   */
  public function panierToSession()
  {
    // session_start();

    $_SESSION['caddie'] = $_POST['caddie'];

    die('ok');
  }

  /**
   * Get $_Session pour alimentation panier js
   * Script pour Ajax dans panier.js
   *
   * @return JSON
   */
  public function panierFromSession()
  {
    $data = $_SESSION['caddie'];

    $this->showJson($data);
  }

}
