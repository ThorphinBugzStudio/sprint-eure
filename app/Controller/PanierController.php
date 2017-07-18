<?php

namespace Controller;

use Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

use Security\CleanTool;

use Model\ItemsModel;
use Model\OrdersModel;
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
    // ADMIN OU CLIENT LOGé
    $this->allowTo(['admin','client']);

    // Alimentation view
    $rowsOrder = $this->getRowsCaddy();
    
    $footOrder = ToolHP::CalculFootOrder($rowsOrder, 20.00);
    // debug($rowsOrder);
    // debug($footOrder);

    // Modes de paiements
    $modesPayBox = new RadiosBox('Modes de paiement', ['CB'       => 'cb',
                                                       'Chèque'   =>  'cheque',
                                                       'virement' => 'virement',
                                                       'Paypal'   => 'paypal'
                                                      ], 'paypal');   
    // debug($modesPayBox);                                                       

    $this->show('page_panier/panier', ['rowsOrder'   => $rowsOrder,
                                       'footOrder'   => $footOrder,
                                       'modesPayBox' => $modesPayBox->getHtml()
    ]);
  }

  /**
   * Recuperation et formatage des articles du panier presents en $_SESSION
   *
   * @return array
   */
  private function getRowsCaddy()
  {
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
    // debug($articles);

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

    return $rowsOrder;

  }

  /**
   * Traitement du formulaire panier.
   *
   * @return void
   */
  public function panierAction()
  {
    // ADMIN OU CLIENT LOGE
    $this->allowTo(['admin','client']);
    // debug($_POST);

    $orders = new OrdersModel();
    $orderRows = new OrderRowsModel();

    $rowsOrder = $this->getRowsCaddy();
    $user = $this->getUser();
    // debug($rowsOrder);
    // debug($user);
    
    // Si post vide ou valeurs non conforme des radiosbuttons :
    // -> Gros bidouillage ! -> 403 !
    if (!empty($_POST['submit']) && !(
          $_POST['optionsRadiosModes_de_paiement'] != 'cb' &&
          $_POST['optionsRadiosModes_de_paiement'] != 'cheque' &&
          $_POST['optionsRadiosModes_de_paiement'] != 'virement' &&
          $_POST['optionsRadiosModes_de_paiement'] != 'paypal'))
    {
      // Traitement du formulaire
      /**
       * NORMALEMENT INSERER LA COMMANDE AVEC STATUT validated
       * PUIS ENVOYER SUR MODULE DE TRAITEMENT DES PAIEMENTS // ADRESSE DE LIVRAISON ET AUTRES OPTIONS
       * 
       * UNE FOIS LE PAIEMENT VALIDé PAR LE MODULE PASSER LA COMMANDE EN STATUT paid
       * PLUS VALIDATION EN BACK PAR ADMIN SUR MODE DE PAIEMENT NON AUTOMATIQUES CHQ / VIRT ETC...
       * 
       * CI DESSOUS INSERTION DIRECTE AVEC STATUT paid
       */

      
      // Insert Order
      $insertOrder = $orders->insert(['users_id'     => $user['id'],
                                      'vat_rate_id' => 1,
                                      'created_at'   => ToolHP::nowSql(),
                                      'status'       => 'paid'
                                     ], true);
      // debug($insertOrder);
      // Insert Order Rows
      foreach ($rowsOrder as $rowOrder) 
      {
        $insertRow = $orderRows->insert(['orders_id'  => $insertOrder['id'],
                                         'items_id'  => $rowOrder['items_id'],
                                         'amount'     => $rowOrder['amount'],
                                         'puht'       => $rowOrder['puht'],
                                         'pht'        => $rowOrder['pht'],
                                         'created_at' => ToolHP::nowSql()
                                        ], true);
        // debug($insertRow);
      }

      // Message flash
      $this->flash('Votre paiement est bien reçu et votre commande sera traitée dans les plus brefs délais', 'success');

      // suppression caddy en session
      unset($_SESSION['caddie']);

      $this->redirectToRoute('default_home');

    }
    else
    {
      // Comment $_POST pourrait il etre vide ?
      $this->flash('Stop bidouiller !', 'danger');
      $this->showForbidden();
      die();
    }    

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
