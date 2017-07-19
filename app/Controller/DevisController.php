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
  $error = [];
  $clean = new CleanTool();
  $valid = new ValidationTool();
  $model = new UsersModel();

  $user = $this->getUser();

  if(!empty($_POST['submit']))
  {

    $post = $clean->cleanPost($_POST);

    $email = $post['email'];
    $message = $post['message'];
    $fichier = $_FILES['stlfile'];

    $error['email'] = $valid->emailValid($email);
    $error['message'] = $valid->textValid($message,'contenu',3,500);
    $error['stlfile'] = $valid->uploadValidStl($fichier,100000000,['.stl'],['application/octet-stream','application/sla','application/vnd.ms-pki.stl','application/x-navistyle','application/wavefront-stl']);

    if(empty($this->getUser()))
    {
      $error['email'] = 'Vous devez être inscrit pour faire votre demande de devis';
    }

    if($valid->IsValid($error))
    {

      $this->flash('Votre demande a bien été prise en compte '.$user['username'].', nous nous engageons à vous répondre dans un délai de 10 jours','success');
      $this->redirectToRoute('default_home');

    } else {

      $this->show('devis/devis-form', ['error' => $error]);
    }

  }
}


}
