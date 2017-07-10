<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Security\CleanTool;
use \Services\Tools\Pagination;
use \Services\Tools\RadiosBox;
use \Security\ValidationTool;
use \Model\ItemsFamilyModel;

/**
 * Controller Gestion des categories d'articles en back office.
 */
class ItemsFamiliesController extends AppController
{

  /**
   * Listing des categories d'articles.
   *
   * @return void
   */
//affichage de toute les categorie avec mise en page
  public function itemsFamilies($page = '')
  {
    $family = new ItemsFamilyModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin families pages navigation', $this->generateUrl('admin_items_families'), $family->getNbId(), 5);

    // si l'url demande une page  : setting de pageStatus dans l'objet Pagination
    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results = $family->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);

    $this->show('admin/items-families', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

  /**
   * Détail d'une categorie d'article.
   * CRUD.
   *
   * @return void
   */
// formulaire de modification d'une categorie
  public function singleItemFamily($id)
  {
    $family = new ItemsFamilyModel();
    $famillyToUpdate = $family->find($id);

    $statusBox = new RadiosBox('Statut', ['Actif' => 'active',
                                          'delete' => 'deleted'
                                         ], $famillyToUpdate['status']);
    $statusBox->getHtml();
    $this->show('admin/single-item-family', ['statusBox' => $statusBox->getHtml(), 'family' =>$famillyToUpdate['family']]);
  }

  /**
   * Traitement Formulaire d'une categorie d'article.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
//application des modification de la categorie
  public function singleItemFamilyAction($id)
  {
    $clean = new CleanTool;
    $validation = new ValidationTool;
    $model = new ItemsFamilyModel;
    $famillyToUpdate = $model->find($id);
    $post = $clean->cleanPost($_POST);

    $statusBox = new RadiosBox('Statut', ['Actif' => 'active',
                                          'delete' => 'deleted'
                                         ], $famillyToUpdate['status']);
    $statusBox->getHtml();

    if(!empty($_POST['submit'])) {
      $famille     = $post['family'];
      $status      = $_POST['optionsRadiosStatut'];

      $error['family'] = $validation->textValid($famille, 'categorie');

      if ($validation->IsValid($error)){

        $data = array(
              'family' => $famille,
              'status' => $status,
              'modified_at' => date('Y_m_d_H_i_s'),
            );
       $model->update($data, $id, $stripTags = true);
       //$this->show('admin/single-item-family', ['statusBox' => $statusBox->getHtml()]);
       $this->redirectToRoute('admin_page_items_families', ['page' => 1]);
    } else
     {
       $this->show('admin/single-item-family',  array('error' => $error , 'statusBox' => $statusBox->getHtml(), 'family' => $famillyToUpdate['family']));
     }
   }
  }

//suppression d'une famille/categorie
  public function singleItemFamilyDelete($id, $fromPage)
  {

    $family = new ItemsFamilyModel();

    $family->updateStatus($id, 'deleted');

    $this->redirectToRoute('admin_page_items_families', ['page' => $fromPage]);
  }

//affichage du formulaire d'ajout de famille/categorie
  public function addItemFamily(){
    $this->show('admin/add_Items_Familly');
  }

//fonction d'ajout de famille/categorie
  public function addItemFamilyAction(){
    $clean = new CleanTool;
    $validation = new ValidationTool;
    $model = new ItemsFamilyModel;

    $post = $clean->cleanPost($_POST);

    if(!empty($_POST['submit'])) {
      $famille     = $post['family'];
      if (isset($_POST['status'])) {
        $status = "delete";
      } else {
        $status = "active";
      }

      $familyexist = $model->doubloncheck($famille, 'family');

      if ($familyexist > 0) {
        $error['exist'] = 'cette categorie existe déjà';
      }

      $error['family'] = $validation->textValid($famille, 'categorie');

      if ($validation->IsValid($error)){

        $data = array(
              'family' => $famille,
              'status' => $status,
              'created_at' => date('Y_m_d_H_i_s'),
            );
       $model->insert($data, $stripTags = true);
       $this->show('admin/add_Items_Familly');
    } else
     {
       $this->show('admin/add_Items_Familly', array('error' => $error));
     }
   }
 }


 }
