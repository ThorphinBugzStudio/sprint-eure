<?php

namespace Controller\Admin;

use \Controller\AppController;
use \Security\CleanTool;
use \Security\ValidationTool;
use \Model\ItemsFamilyModel;
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
  public function items()
  {
    $this->show('admin/items');
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
    $family = $model->findAll();
    $this->show('admin/add-item', array('family' => $family));
  }

  public function AddItemAction()
  {
    $clean = new CleanTool();
    $validation = new ValidationTool();
    $model = new ItemsFamilyModel;
    $family = $model->findAll();

    $post = $clean->cleanPost($_POST);

    if(!empty($_POST['submit']) && !empty($_FILES['image'])) {
      $famille     = $_POST['famille'];
      $designation = $post['designation'];
      $description = $post['description'];
      $quantité    = $post['quantite'];
      $prix        = $post['prix'];
      $image       = $_FILES['image'];

      if (isset($_POST['home'])) {
        $home = 1;
      } else {
        $home = 0;
      }

      $error['designation'] = $validation->textValid($designation, 'designation');
      $error['description'] = $validation->textValid($description, 'designation', 3, 500);
      $error['quantite']    = $validation->entier($quantité, 'quantité');
      $error['prix']        = $validation->numeric($prix, 'prix');

      $error['image']  = $validation->uploadValid($image, 2000000, array('.jpg','.jpeg','.png'), array('image/jpeg','image/png','image/jpg'));

      if ($validation->IsValid($error)){
        $dest_fichier = date('Y_m_d_H_i').'.'.pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['tmp_name'], 'images/'. $dest_fichier);

        $this->show('admin/add-item', array('family' => $family));
      } else
        {
          debug($_FILES['image']);
          $this->show('admin/add-item', array('family' => $family, 'error' => $error));
        }

    }
  }

}
