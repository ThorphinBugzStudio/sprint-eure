<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Services\Tools\Pagination;
use \Services\Tools\RadiosBox;

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
      // ADMIN ONLY
      // $this->allowTo('admin');

      $users = new UsersModel($where = "status <> 'deleted'");

      // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
      $pagin = new Pagination('Admin users pages navigation', $this->generateUrl('admin_users'), $users->getNbId(), 5);

      // si l'url demande une page  : setting de pageStatus dans l'objet Pagination
      if (!empty($page)) { $pagin->setPageStatus($page); }

      // get des informations de pagination necessaires à la requete bdd
      $pageStatus = $pagin->getPageStatus();
      // get du html de la barre de navigation pour la pagination
      $navPaginBar = $pagin->getHtml();
      // debug($navPaginBar);

      $results = $users->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);

      $this->show('admin/users', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

  /**
   * Soft delete d'un utilisateur en bdd.
   *
   * @return void
   */
  public function deleteUser($id, $fromPage)
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    $users = new UsersModel();

    $users->updateStatus($id, 'deleted');

    $this->redirectToRoute('admin_page_users', ['page' => $fromPage]);
  }

  /**
   * Détail / Formulaire d'un utilisateur.
   * CRUD.
   *
   * @return void
   */
  public function singleUser($id)
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

   $users = new UsersModel();
   $userToUpdate = $users->find($id);
   // debug($userToUpdate);

   $rolesBox = new RadiosBox('Role', ['Client' => 'client',
                                      'Administrateur' => 'admin'
                                     ], $userToUpdate['role']);

   $statusBox = new RadiosBox('Statut', ['Actif' => 'active',
                                         'Inactif' => 'inactive'
                                        ], $userToUpdate['status']);
   $r = $rolesBox->getHtml();
   $s = $statusBox->getHtml();

   $this->show('admin/single-user', ['rolesBox' => $rolesBox->getHtml(), 'statusBox' => $statusBox->getHtml()]);
  }

  /**
   * Traitement Détail / Formulaire d'un utilisateur.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  public function singleUserAction()
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    # code
  }

}
