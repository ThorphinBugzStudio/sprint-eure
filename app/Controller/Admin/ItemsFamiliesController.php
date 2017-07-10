<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Security\CleanTool;
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
  public function itemsFamilies()
  {
    $this->show('admin/items-families');
  }

  /**
   * Détail d'une categorie d'article.
   * CRUD.
   *
   * @return void
   */
  public function singleItemFamily()
  {
    $this->show('admin/single-item-family');
  }

  /**
   * Traitement Formulaire d'une categorie d'article.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  public function singleItemFamilyAction()
  {
    # code
  }

  public function addItemFamily(){
    $this->show('admin/add_Items_Familly');
  }

  public function addItemFamilyAction(){
    $clean = new CleanTool;
    $validation = new ValidationTool;
    $model = new ItemsFamilyModel;

    $post = $clean->cleanPost($_POST);

    if(!empty($_POST['submit'])) {
      $famille     = $post['family'];
      if (isset($_POST['status'])) {
        $status = "dispo";
      } else {
        $status = "deleted";
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
