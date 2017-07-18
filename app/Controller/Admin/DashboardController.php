<?php

namespace Controller\Admin;

use Controller\AppController;

use Services\Tools\Pagination;
use Services\Tools\ToolHP;

use Model\CommentsModel;
use Model\UsersModel;
use Model\ItemsModel;
use Model\OrdersModel;

/**
 * Controller Administration du Dashboard en back office.
 */
class DashboardController extends AppController {

  public function dashboard() {
      $this->allowTo('admin');

      $users = new UsersModel();
      $articles = new ItemsModel();
      $comments = new CommentsModel();
      $order = new OrdersModel();
      $lastUsers = $users->findAll('created_at', 'DESC', 5);
      $lastproduct = $articles->findAll('created_at', 'DESC', 5);
      $lastcomments = $comments->findAll('created_at', 'DESC', 5);
      $lastcommande = $order->findAll('created_at', 'DESC', 5);
      $allusers = $users->findAll('created_at', 'DESC');


      $countseven = $users->getsevenDayNewUser();


      $nbNewComment = $comments->nbcomment();
      $nbneworders = $order->nbneworders();

      $this->show('admin/dashboard', ['users' => $lastUsers, 'items' => $lastproduct, 'comments' => $lastcomments, 'orders' => $lastcommande, 'newcomments' => $nbNewComment, 'nborders' => $nbneworders, 'allusers' => $countseven]);
  }
}
