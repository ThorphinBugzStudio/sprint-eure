<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Security\CleanTool;
use \Services\Tools\Pagination;
use \Services\Tools\RadiosBox;
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
    // ADMIN ONLY
    $this->allowTo('admin');

    $items = new ItemsModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin items pages navigation', $this->generateUrl('admin_items'), $items->getNbId(), 8);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results = $items->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);
    $categorie = $items->nomcategorie();
    $this->show('admin/items', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual'], 'categorie' => $categorie]);
  }

  /**
   * Détail d'un article.
   * CRUD.
   *
   * @return void
   */
  public function singleItem($id)
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $items = new ItemsModel();
    $itemsToUpdate = $items->find($id);
    $model = new ItemsFamilyModel;
    $family = $model->notdelete();

    $statusBox = new RadiosBox('Statut', ['Actif' => 'active',
                                          'delete' => 'deleted'
                                        ], $itemsToUpdate['status']);
    $statusBox->getHtml();
    $this->show('admin/single-item', ['statusBox' => $statusBox->getHtml(), 'item' =>$itemsToUpdate, 'family'=>$family]);
    }

    /**
    * Traitement Formulaire d'un article.
    * Recuperation via POST du type d'action CRUD.
    *
    * @return void
    */
    //modification d un article
  public function singleItemAction($id)
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $clean = new CleanTool;
    $validation = new ValidationTool;
    $items = new ItemsModel();
    $model = new ItemsFamilyModel;
    $itemsToUpdate = $items->find($id);
    $post = $clean->cleanPost($_POST);
    $family = $model->notdelete();

    $statusBox = new RadiosBox('Statut', ['Actif' => 'active',
                                          'delete' => 'deleted'
                                         ], $itemsToUpdate['status']);
    $statusBox->getHtml();

    if(!empty($_POST['submit'])) {
      $famille     = $_POST['famille'];
      $designation = $post['designation'];
      $description = $post['description'];
      $quantité    = $post['quantite'];
      $prix        = $post['prix'];
      $image       = $_FILES['image'];
      $dossier     = 'assets/img/uploaded_articles/';
      $status      = $_POST['optionsRadiosStatut'];
      $nomIm       = $post['img_name'];

      if (isset($_POST['home'])) {
        $home = 1;
      } else {
        $home = 0;
      }

//verification des erreurs de chaque champs
      $error['designation'] = $validation->textValid($designation, 'designation');
      $error['description'] = $validation->textValid($description, 'description', 3, 1000);
      $error['quantite']    = $validation->entier($quantité, 'quantité');
      $error['prix']        = $validation->numeric($prix, 'prix');


      if(empty($_FILES['image']['name'])){
        if ($validation->IsValid($error)) {

          $data = array(
                'items_family_id' => $famille,
                'designation' => $designation,
                'description' => $description,
                'packaging' => $quantité,
                'puht' => $prix,
                'home' => $home,
                'status' => $status,
                'img_name' => $nomIm,
                'modified_at' => date('Y_m_d_H_i_s'),
              );


              $items->update($data, $id, $stripTags = true);
              $this->redirectToRoute('admin_page_items', ['page' => 1]);

        }
         else
          {
            $this->show('admin/single-item', ['statusBox' => $statusBox->getHtml(), 'family'=>$family, 'error' => $error, 'item' =>$itemsToUpdate,]);
          }
      } else{

      $error['image']  = $validation->uploadValid($image, 2000000, array('.jpg','.jpeg','.png'), array('image/jpeg','image/png','image/jpg'));


      if ($validation->IsValid($error)) {
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
              'modified_at' => date('Y_m_d_H_i_s'),
            );

        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $img_name)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {
            $items->update($data, $id, $stripTags = true);
            $this->redirectToRoute('admin_page_items', ['page' => 1]);
         }
      }
       else
        {
          $this->show('admin/single-item', ['statusBox' => $statusBox->getHtml(), 'family'=>$family, 'error' => $error, 'item' =>$itemsToUpdate,]);
        }
      }
    }
  }

  public function singleItemDelete($id, $fromPage)
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $items = new ItemsModel();

    $items->updateStatus($id, 'deleted');

    $this->redirectToRoute('admin_page_items', ['page' => $fromPage]);
  }


  //ajout d'un article
  public function AddItem()
  {
    // ADMIN ONLY
    $this->allowTo('admin');

    $model = new ItemsFamilyModel;
    $family = $model->notdelete();
    $this->show('admin/add-item', array('family' => $family));
  }

  public function AddItemAction()
  {
    // ADMIN ONLY
    $this->allowTo('admin');

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
      $status = "active";

      if (isset($_POST['home'])) {
        $home = 1;
      } else {
        $home = 0;
      }

      $itemexist = $modelItem->doubloncheck($designation, 'designation', 'designation', 'items_family_id');

      if ($itemexist > 0) {
        $error['exist'] = 'cet article existe déjà dans cette categorie. ';
      }

//verification des erreurs de chaque champs
      $error['designation'] = $validation->textValid($designation, 'designation');
      $error['description'] = $validation->textValid($description, 'description', 3, 1000);
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

  public function categorieItem($id, $page = ''){
    // ADMIN ONLY
    $this->allowTo('admin');

    $items = new ItemsModel();

    // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
    $pagin = new Pagination('Admin items pages navigation', $this->generateUrl('admin_categorie_item', ['id' =>  $id]), $items->countIdcat($id), 4);

    if (!empty($page)) { $pagin->setPageStatus($page); }

    // get des informations de pagination necessaires à la requete bdd
    $pageStatus = $pagin->getPageStatus();
    // get du html de la barre de navigation pour la pagination
    $navPaginBar = $pagin->getHtml();
    // debug($navPaginBar);

    $results = $items->findAllWhere($id, 'id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);
    $categorie = $items->nomcategorie();
    $this->show('admin/items', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual'], 'categorie' => $categorie]);
  }

}
