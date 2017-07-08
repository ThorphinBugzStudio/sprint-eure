<?php

namespace Controller\Admin;

use \Controller\AppController;

use \Model\UsersModel;

/**
 * Controller Administration des utilisateurs en back office.
 */
class UsersController extends AppController
{
  /**
   * Listing utilisateurs.
   *
   * @return void
   */
  public function users()
  {
      $users = new UsersModel();
      debug($users);

      $results = $users->findAll('id', 'ASC', 10, 0);

      $this->show('admin/users', ['results' => $results]);
  }

  /**
   * Détail / Formulaire d'un utilisateur.
   * CRUD.
   *
   * @return void
   */
  public function singleUser()
  {
    $this->show('admin/single-user');
  }

  /**
   * Traitement Détail / Formulaire d'un utilisateur.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  public function singleUserAction()
  {
    # code
  }

}
