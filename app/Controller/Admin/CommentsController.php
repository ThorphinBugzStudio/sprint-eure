<?php

namespace Controller\Admin;

use Controller\AppController;

use Services\Tools\Pagination;
use Services\Tools\ToolHP;

use Model\CommentsModel;
use Model\UsersModel;

/**
 * Controller Administration des utilisateurs en back office.
 */
class CommentsController extends AppController
{
   /**
    * Nbombre de lignes par page pour objet Pagination
    * @var integer
    */
   private $nbreperpage = 5;

  /**
   * Listing des commentaires.
   * approve ou delete via generation url et interception par route.
   * _R__
   *
   * @return void
   */
  public function comments($page = null)
  {
      // ADMIN ONLY
      // $this->allowTo('admin');

      $comments = new CommentsModel($where = "status != 'deleted'");
      $users = new UsersModel();

      // debug($comments);

      // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
      $pagin = new Pagination('Admin comments pages navigation', $this->generateUrl('admin_comments'), $comments->getNbId(), $this->nbreperpage);

      // si l'url demande une page  : setting de pageStatus dans l'objet Pagination
      if (!empty($page)) { $pagin->setPageStatus($page); }

      // get des informations de pagination necessaires à la requete bdd
      $pageStatus = $pagin->getPageStatus();
      // get du html de la barre de navigation pour la pagination
      $navPaginBar = $pagin->getHtml();
      // debug($navPaginBar);

      $resultsBruts = $comments->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);
      $results = array();
      foreach ($resultsBruts as $resultBrut)
      {
         $resultBrut['username'] = $users->find($resultBrut['users_id'])['username'];
         $results[] = $resultBrut;
      }

      $this->show('admin/comments', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

  /**
   * Traitement approbation d'un commentaire.
   * Appel de la methode via route.
   *
   * @return void
   */
  public function commentApprove($id, $fromPage)
  {
    # code
  }

  /**
   * Traitement suppression d'un commentaire.
   * Appel de la methode via route.
   *
   * @return void
   */
  public function commentDelete($id, $fromPage)
  {
     // ADMIN ONLY
    // $this->allowTo('admin');

    $comments = new CommentsModel();

    $comments->updateStatus($id, 'deleted');

    $this->redirectToRoute('admin_page_comments', ['page' => $fromPage]);
  }

}
