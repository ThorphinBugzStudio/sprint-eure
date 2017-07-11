<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Security\CleanTool;
use \Services\Tools\Pagination;
use \Security\ValidationTool;
use \Model\ItemsFamilyModel;
use \Model\ItemsModel;
/**
 * Controller Gestion des articles en back office.
 */
class ItemsController extends AppController
{

  /**
   * Listing des articles.
   *
   * @return void
   */
  public function items($page = '')
  {
    $items = new ItemsModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin items pages navigation', $this->generateUrl('admin_items'), $items->getNbId(), 5);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results = $items->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);
    $this->show('admin/items', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

  /**
   * Détail d'un article.
   * CRUD.
   *
   * @return void
   */
  public function singleItem()
  {
    $this->show('admin/single-item');
  }

  /**
   * Traitement Formulaire d'un article.
   * Recuperation via POST du type d'action CRUD.
   *
   * @return void
   */
  //modification d un article
  public function singleItemAction()
  {
    # code
  }

  //ajout d'un article
  public function AddItem()
  {
    $model = new ItemsFamilyModel;
    $family = $model->notdelete();
    print_r($family);
    $this->show('admin/add-item', array('family' => $family));
  }

  public function AddItemAction()
  {
    $clean = new CleanTool;
    $validation = new ValidationTool;
    $model = new ItemsFamilyModel;
    $modelItem = new ItemsModel;
    $family = $model->findAll();

    $post = $clean->cleanPost($_POST);

    if(!empty($_POST['submit']) && !empty($_FILES['image'])) {
      $famille     = $_POST['famille'];
      $designation = $post['designation'];
      $description = $post['description'];
      $quantité    = $post['quantite'];
      $prix        = $post['prix'];
      $image       = $_FILES['image'];
      $dossier = 'assets/img/uploaded_articles/';
      $status = "";

      if (isset($_POST['home'])) {
        $home = 1;
      } else {
        $home = 0;
      }

      $itemexist = $modelItem->doubloncheck($designation, $famille, 'designation', 'items_family_id');

      if ($itemexist > 0) {
        $error['exist'] = 'cet article existe déjà dans cette categorie. ';
      }

//verification des erreurs de chaque champs
      $error['designation'] = $validation->textValid($designation, 'designation');
      $error['description'] = $validation->textValid($description, 'designation', 3, 500);
      $error['quantite']    = $validation->entier($quantité, 'quantité');
      $error['prix']        = $validation->numeric($prix, 'prix');
      $error['image']  = $validation->uploadValid($image, 2000000, array('.jpg','.jpeg','.png'), array('image/jpeg','image/png','image/jpg'));


      if ($validation->IsValid($error)){
        $img_name = date('Y_m_d_H_i').'_'.$designation.'.'.pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

        $data = array(
              'items_family_id' => $famille,
              'designation' => $designation,
              'description' => $description,
              'packaging' => $quantité,
              'puht' => $prix,
              'home' => $home,
              'status' => $status,
              'img_name' => $img_name,
              'created_at' => date('Y_m_d_H_i_s'),
            );
        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $img_name)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {
              $modelItem->insert($data, $stripTags = true);
              $this->show('admin/add-item', array('family' => $family), $_POST="");
         }

      }
       else
        {
          $this->show('admin/add-item', array('family' => $family, 'error' => $error));
        }

    }
  }

}
