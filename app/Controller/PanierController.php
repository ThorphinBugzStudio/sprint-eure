<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class PanierController extends AppController
{

public function panier()
{
  $this->show('page_panier/panier');
}

public function panierAction()
{
  //Interractions panier client
}

}
