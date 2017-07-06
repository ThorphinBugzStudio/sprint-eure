<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class ProfileController extends AppController
{
  public function profile()
  {
    $this->show('users/userProfile');
  }

  public function profileModify()
  {
    $this->show('users/profileModify');
  }

  public function profileModifyAction()
  {
    //soumission form update profile utilisateur
  }

  


}
