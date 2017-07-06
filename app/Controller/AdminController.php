<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class AdminController extends AppController
{

  public function usersAdmin()
  {
    $this->show('admin/adminUsers');
  }


public function singleUser()
{
  $this->show('admin/adminSingleUser');
}

public function singleUserAction()
{
  // traitement crud d'un seul user
}

public function adminComments()
{
  $this->show('admin/adminComments');
}

public function adminCommentApprove()
{
  //
}

public function adminCommentDelete()
{

}

public function adminOrders()
{
  $this->show('admin/adminOrders');
}

public function adminSingleOrder()
{
  $this->show('admin/adminSingleOrder');
}

public function adminSingleOrderAction()
{
  //traitemebnt des différents status d'une commande
}

public function adminItems()
{
  $this->show('admin/adminItems');
}
public function adminSingleItem()
{
  $this->show('admin/adminSingleItem');
}

public function adminSingleItemAction()
{

}

public function adminItemsFamilies()
{
  $this->show('admin/adminItemsFamilies');
}

public function adminSingleItemFamily()
{
  $this->show('admin/adminSingleItemFamily');
}

public function adminSingleItemFamilyAction()
{

}


}
