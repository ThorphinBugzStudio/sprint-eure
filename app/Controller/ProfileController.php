<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

/**
 * Controller Gestion du profile utilisateur par l'utilisateur.
 */
class ProfileController extends AppController
{
  /**
   * Page informations du profile.
   *
   * @return void
   */
  public function profile()
  {
    $this->show('users/user-profile');
  }

  /**
   * Formulaire de modification du profile.
   *
   * @return void
   */
  public function profileModify()
  {
    $this->show('users/profile-modify');
  }

  /**
   * Traitement du formulaire de modification du profile.
   * Redirection sur page informations du profile.
   *
   * @return void
   */
  public function profileModifyAction()
  {
    # code    
  }

}
