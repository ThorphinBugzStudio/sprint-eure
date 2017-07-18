<?php

namespace Controller;

use Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

use Model\ItemsModel;
use Model\OrderRowsModel;

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

    // Recuperation et formatage des articles du panier presents en $_SESSION
    // debug($_SESSION);
    $caddie = explode('|', $_SESSION['caddie']);
    array_pop($caddie); // suppr dernier élément vide suite explode
    // debug($caddie);

    foreach ($caddie as $key)
    {
      if (!empty($key))
      {
      // Articles du caddie -> array php
      $articles[] = json_decode($key);
      }
    }
    debug($articles);

    // Alimentation view
    // recuperation des infos en bd : puht etc...
    $rowsOrder = null;
    $itemPanier = new ItemsModel();
    foreach ($articles as $article)
    {
      $rowOrder = $itemPanier->getItemPanier($article->id);
      $rowOrder['items_id'] = $article->id;
      $rowOrder['amount'] = $article->quantité;
      $rowOrder['pht'] = $rowOrder['puht'] * $article->quantité;
      // debug($rowOrder);

      $rowsOrder[] = $rowOrder;
    }
    
    $footOrder = ToolHP::CalculFootOrder($rowsOrder, 20.00);
    // debug($rowsOrder);
    // debug($footOrder);

    // Modes de paiements
    $modesPayBox = new RadiosBox('Modes de paiement', ['CB'       => 'cb',
                                                       'Chèque'   =>  'cheque',
                                                       'virement' => 'virement',
                                                       'Paypal'   => 'paypal'
                                                      ], 'paypal');   
     debug($modesPayBox);                                                       

    $this->show('page_panier/panier', ['rowsOrder'   => $rowsOrder,
                                       'footOrder'   => $footOrder,
                                       'modesPayBox' => $modesPayBox->getHtml()
    ]);
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
