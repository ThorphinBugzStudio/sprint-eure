<?php

namespace Controller;

use \W\Controller\Controller;
use Model\AvatarsModel;
use W\Security\AuthentificationModel;
// ajout use pour tools communs à tous les controleurs
use \Services\Tools\ToolHp; // outil hervé

/**
 * Les controlleurs heritent de AppController plutot que de Controller.
 * Methodes communes à tous les controlleurs.
 */
class AppController extends Controller
{
    /**
     * Outil Hervé
     *
     * @var object
     */
    protected $hp;

    /**
     * Initialisation de AppController.
     */
    public function __construct()
    {
        // pas de __construct dans Controller donc osef de parent::__construct();
        $this->hp = new ToolHp();   // outil hervé
    }

    public function getUser()
  	{
      //Recup de l'utilisateur connecté comme à la normale
      $authenticationModel = new AuthentificationModel();
      $user = $authenticationModel->getLoggedUser();

      //stockage de l'id user ds $id
      $id = $user['id'];

      $avatar_model = new AvatarsModel();
      //on recup l'avatar
      $avatar = $avatar_model->getUserAvatar($id);
// ON ALIMENTE $user avec l'avatar ['img_name'] uniquement s'il y a un user connecté
      if(!empty($user))
      {
        $user['avatar'] = $avatar['img_name'];
      }

  		return $user;
  	}
}
