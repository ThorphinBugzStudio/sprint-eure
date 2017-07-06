<?php

namespace Controller;

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

}
