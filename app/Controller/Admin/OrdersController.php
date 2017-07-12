<?php

namespace Controller\Admin;

use \Controller\AppController;

use Services\Tools\Pagination;
use Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

use Model\UsersModel;
use Model\OrdersModel;
use Model\OrderRowsModel;
use Model\VatRateModel;

/**
 * Controller Gestion des commandes en back office.
 */
class OrdersController extends AppController
{
  /**
   * Nbombre de lignes par page pour objet Pagination
   * @var integer
   */
  private $nbreperpage = 4;

  /**
   * Listing des commandes
   *
   * @return void
   */
  public function orders($page = '')
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    $orders = new OrdersModel($where = "status = 'temp' OR status = 'validated' OR status = 'paid' OR status = 'deleted'");
    $users = new UsersModel();
    $vatRates = new VatRateModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin users pages commandes', $this->generateUrl('admin_orders'), $orders->getNbId(), $this->nbreperpage);

    // si l'url demande une page  : setting de pageStatus dans l'objet Pagination
    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $resultsBruts = $orders->findAll('created_at', 'DESC', $pageStatus['limit'], $pageStatus['offset']);
    foreach ($resultsBruts as $resultBrut)
    {
      $resultBrut['username'] = $users->find($resultBrut['users_id'])['username'];
      $resultBrut['vatrate'] = $vatRates->find($resultBrut['vat_rate_id'])['vat_percentage'];

      $results[] = $resultBrut;
    }

    $this->show('/admin/orders', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);

  }

  /**
   * Détail d'une commande.
   * RD + Gestion du statut de commande.
   *
   * @return void
   */
  public function singleOrder()
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    $this->show('admin/single-order');
  }

  /**
   * Traitement Détail d'une commande.
   * Recuperation via POST du type d'action sur le statut.
   *
   * @return void
   */
  public function SingleOrderAction()
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    # code
  }


}
