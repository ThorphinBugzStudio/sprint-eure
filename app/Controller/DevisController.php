<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class DevisController extends AppController
{

public function devis()
{
  $this->show('devis/devisForm');
}

public function devisAction()
{
  //Traitement formulaire devis redirection sur home
}


}
