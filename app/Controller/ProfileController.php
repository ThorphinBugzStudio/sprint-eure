<?php

namespace Controller;

use W\Model\Model;


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
    $user = $this->getUser();

    $this->show('users/user-profile', ['user' => $user]);
  }

  /**
   * Formulaire de modification du profile.
   *
   * @return void
   */
  public function profileModify()
  {
    $user = $this->getUser();
    $this->show('users/profile-modify', ['user' => $user]);
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
