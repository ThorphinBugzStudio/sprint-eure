<?php

namespace Controller\Admin;

use \Controller\AppController;

/**
 * Controller Administration des utilisateurs en back office.
 */
class CommentsController extends AppController
{
  
  /**
   * Listing des commentaires.
   * approve ou delete via generation url et interception par route.
   *
   * @return void
   */
  public function comments()
  {
    $this->show('admin/comments');
  }

  /**
   * Traitement approbation d'un commentaire.
   * Appel de la methode via route.
   *
   * @return void
   */
  public function commentApprove()
  {
    # code
  }

  /**
   * Traitement suppression d'un commentaire.
   * Appel de la methode via route.
   *
   * @return void
   */
  public function commentDelete()
  {
    # code
  }

}
