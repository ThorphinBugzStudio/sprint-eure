<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Services\Tools\Pagination;

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
  public function users($page = '')
  {
      $users = new UsersModel();
      $pagin = new Pagination($users->countId(), 3);
      // debug($pagin);
      debug($page);

      if (!empty($page)) { $pagin->setPageStatus($page); }
      debug($pagin);
      $pageStatus = $pagin->getpageStatus();
      
      $results = $users->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);

      $this->show('admin/users', ['results' => $results, 'pageStatus' => $pageStatus]);
      
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
