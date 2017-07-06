<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class HowToController extends AppController
{

  public function howTo()
  {
    $this->show('howTo/howTo');
  }

}
