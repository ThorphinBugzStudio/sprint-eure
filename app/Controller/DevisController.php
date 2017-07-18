<?php

namespace Controller;
use Model\UsersModel;
use Security\CleanTool;
use Security\ValidationTool;
use W\Security\AuthentificationModel;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

/**
 * Controller Page de demande de devis.
 * Upload de fichier 3D.
 */
class DevisController extends AppController
{

/**
 * Formulaire de demande de devis.
 *
 * @return void
 */
public function devis()
{
  $this->show('devis/devis-form');
}

/**
 * Traitement du formulaire de demande de devis.
 * Redirection sur home.
 *
 * @return void
 */
public function devisAction()
{
  $clean = new CleanTool();
  $valid = new ValidationTool();

  if(!empty($_POST['submit']))
  {

    $post = $clean->cleanPost($_POST);

    $email = $post['email'];
    $message = $post['message'];
    $file = $_FILES['stlfile'];

    $valid->uploadValid($file,10000000,['.stl'],$extensionsmime))

    debug($post);
    debug($file);
  }
}


}
