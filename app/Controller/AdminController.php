<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class AdminController extends AppController
{

  public function usersAdmin()
  {
    $this->show('admin/adminUsers');
  }
}
