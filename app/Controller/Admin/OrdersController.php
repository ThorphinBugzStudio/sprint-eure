<?php

namespace Controller\Admin;

use \Controller\AppController;

use Services\Tools\Pagination;
use Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

use Security\CleanTool;

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
  public function orders($page = null)
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $orders = new OrdersModel($where = "status = 'paid' OR status = 'checked' OR status = 'prepared'");
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
    $results = array();
    foreach ($resultsBruts as $resultBrut)
    {
      $resultBrut['username'] = $users->find($resultBrut['users_id'])['username'];
      $resultBrut['vatrate'] = $vatRates->find($resultBrut['vat_rate_id'])['vat_percentage'];

      switch ($resultBrut['status'])
      {
         case 'paid':
            $resultBrut['status'] = 'Payée';
            break;
         case 'checked':
            $resultBrut['status'] = 'Validée';
            break;
         case 'prepared':
            $resultBrut['status'] = 'Preparée';
            break;
         case 'sent':
            $resultBrut['status'] = 'Expediée';
            break;
      }

      $results[] = $resultBrut;
    }

    $this->show('/admin/orders', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);

  }

  /**
   * Détail d'une commande.
   * _RU_ + Gestion du statut de commande.
   *
   * @return void
   */
  public function singleOrder($id, $fromPage)
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $orders = new OrdersModel();
    $orderRows = new OrderRowsModel();

    $headOrder = $orders->getHeadOrder($id);
    $headOrder['created_at'] = ToolHp::dateSqlToForm($headOrder['created_at'], 'd/m/Y');
    $rowsOrder = $orderRows->getRowsOrder($id);
    $footOrder = ToolHP::CalculFootOrder($rowsOrder, $headOrder['vat_percentage']);
   //  debug($headOrder);
    // debug($rowsOrder);
   //  debug($footOrder);

    $statusBox = new RadiosBox('Statut', ['Payée'    => 'paid',
                                          'Validée'  => 'checked',
                                          'Préparée' => 'prepared',
                                          'Expediée' => 'sent'
                                         ], $headOrder['status']);
   //  debug($statusBox);

    $this->show('admin/single-order', ['headOrder' => $headOrder,
                                       'rowsOrder' => $rowsOrder,
                                       'footOrder' => $footOrder,
                                       'statusBox' => $statusBox->getHtml(),
                                       'page'      => $fromPage
    ]);

  }

   /**
    * Traitement Détail d'une commande.
    * Changement statut d'une commande.
    * statuts possible = paid, checked, prepared, sent (Payée, Validée, Preparée, Expediée)
    *
    * @return void
    */
   public function SingleOrderAction($id, $fromPage)
   {
   // ADMIN ONLY
   $this->allowTo('admin');

      $orders = new OrdersModel();
      $clean = new CleanTool();

      $orderToUpdate = $orders->find($id);

      // Si post vide ou valeurs non conforme des radiosbuttons :
      // -> Gros bidouillage ! -> 403 !
      if (!empty($_POST['submit']) && !empty($orderToUpdate) && !(
            $_POST['optionsRadiosStatut'] != 'paid' &&
            $_POST['optionsRadiosStatut'] != 'checked' &&
            $_POST['optionsRadiosStatut'] != 'prepared' &&
            $_POST['optionsRadiosStatut'] != 'sent'))
      {
         // Traitement du formulaire
         $post = $clean->cleanPost($_POST);

         // Update
         $updateOrder = $orders->update(['status' => $post['optionsRadiosStatut'],
                                         'modified_at' => ToolHP::nowSql()
                                        ], $orderToUpdate['id'], true);

         // Message flash
         $this->flash('Statut de la commande n° '.$id.' mis à jour avec succès', 'success');

         $this->redirectToRoute('admin_page_orders', ['page' => $fromPage]);

      }
      else
      {
         // Comment $_POST pourrait il etre vide ?
         $this->flash('Stop bidouiller !', 'danger');
         $this->showForbidden();
         die();
      }
   }

}
