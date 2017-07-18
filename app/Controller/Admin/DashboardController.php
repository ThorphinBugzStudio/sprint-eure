<?php

namespace Controller\Admin;

use Controller\AppController;

use Services\Tools\Pagination;
use Services\Tools\ToolHP;

use Model\CommentsModel;
use Model\UsersModel;

/**
 * Controller Administration du Dashboard en back office.
 */
class DashboardController extends AppController {

  public function dashboard() {
      // ADMIN ONLY
      $this->allowTo('admin');
      $this->show('admin/dashboard');
  }
}
