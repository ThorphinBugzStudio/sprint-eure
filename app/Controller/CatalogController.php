<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class CatalogController extends AppController
{
  public function catalog()
  {
    $this->show('catalog/catalog');
  }
}