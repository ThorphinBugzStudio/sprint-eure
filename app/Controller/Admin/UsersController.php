<?php

namespace Controller\Admin;

use \Controller\AppController;

use \Services\Tools\Pagination;
use \Services\Tools\RadiosBox;
use Services\Tools\ToolHP;

use Security\CleanTool;
use Security\ValidationTool;
use W\Security\StringUtils;

use \Model\UsersModel;
use \Model\User_adressesModel;
use \Model\AvatarsModel;

/**
 * Controller Administration des utilisateurs en back office.
 */
class UsersController extends AppController
{
  /**
   * Listing utilisateurs.
   *
   * @return void
   */
  public function users($page = '')
  {
      // ADMIN ONLY
      // $this->allowTo('admin');

      $users = new UsersModel($where = "status <> 'deleted'");

      // Objet pour gerer la pagination -> Voir la classe dans Services\Tools
      $pagin = new Pagination('Admin users pages navigation', $this->generateUrl('admin_users'), $users->getNbId(), 5);

      // si l'url demande une page  : setting de pageStatus dans l'objet Pagination
      if (!empty($page)) { $pagin->setPageStatus($page); }

      // get des informations de pagination necessaires à la requete bdd
      $pageStatus = $pagin->getPageStatus();
      // get du html de la barre de navigation pour la pagination
      $navPaginBar = $pagin->getHtml();
      // debug($navPaginBar);

      $results = $users->findAll('id', 'ASC', $pageStatus['limit'], $pageStatus['offset']);

      $this->show('admin/users', ['results' => $results, 'navPaginBar' => $navPaginBar, 'actualPageId' => $pageStatus['actual']]);
  }

  /**
   * Soft delete d'un utilisateur en bdd.
   * ___D
   *
   * @return void
   */
  public function deleteUser($id, $fromPage)
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    $users = new UsersModel();

    $users->updateStatus($id, 'deleted');

    $this->redirectToRoute('admin_page_users', ['page' => $fromPage]);
  }

  /**
   * Détail / Formulaire d'un utilisateur.
   * _R__
   *
   * @return void
   */
  public function singleUser($id, $fromPage)
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

    $users = new UsersModel();
    $userFactAdress = new User_adressesModel();
    $userAvatar = new AvatarsModel();

    $userToUpdate = $users->find($id);
    $adress = $userFactAdress->getUserAdress($id);
    $avatar = $userAvatar->getUserAvatar($id);
    // debug($userToUpdate);

    $rolesBox = new RadiosBox('Role', ['Client'         => 'client',
                                       'Administrateur' => 'admin'
                                      ], $userToUpdate['role']);

    $statusBox = new RadiosBox('Statut', ['Actif'   => 'active',
                                          'Inactif' => 'inactive'
                                          ], $userToUpdate['status']);

    $this->show('admin/single-user', ['userToUpdate' => $userToUpdate,
                                      'adress'       => $adress,
                                      'avatar'       => $avatar,
                                      'rolesBox'     => $rolesBox->getHtml(),
                                      'statusBox'    => $statusBox->getHtml(),
                                      'page'         => $fromPage
                                      ]);
  }

  /**
   * Traitement Détail / Formulaire d'un utilisateur.
   * Recuperation via POST du type d'action __U_.
   *
   * @return void
   */
  public function singleUserAction($id, $fromPage)
  {
    // ADMIN ONLY
    // $this->allowTo('admin');

		$users = new UsersModel();
    $userFactAdress = new User_adressesModel();
    $userAvatar = new AvatarsModel();

    $userToUpdate = $users->find($id);
    $adressToUpdate = $userFactAdress->getUserAdress($id);
    $avatarToUpdate = $userAvatar->getUserAvatar($id);

		$clean = new CleanTool();
		$valid = new ValidationTool();
		$strU = new StringUtils();
		// $auth = new AuthentificationModel();
    
    $error = [];
		// $success = false;

    // Si post vide ou valeurs non conforme des radiosbuttons :
    // -> Gros bidouillage ! -> 403 !
    if(!empty($_POST['submit']) && !($_POST['optionsRadiosRole'] != 'client' && $_POST['optionsRadiosRole'] != 'admin') && !($_POST['optionsRadiosStatut'] != 'active' && $_POST['optionsRadiosStatut'] != 'inactive'))
		{
      // Traitement du formulaire
      $post = $clean->cleanPost($_POST);

      // debug($post);
			$firstname = $post['firstname'];
			$lastname = $post['lastname'];
			$pseudo = $post['pseudo'];
			$email = $post['email'];
			$adress = $post['adress'];
			$postal_code = $post['postal-code'];
			$city = $post['city'];
			$country = $post['country'];
			$avatar = $post['avatar'];
      $role = $post['optionsRadiosRole'];
      $status = $post['optionsRadiosStatut'];

      $error['firstname'] = $valid->textValid($firstname, 'nom',3,60);
			$error['lastname'] = $valid->textValid($lastname, 'prénom',3,60);
			$error['pseudo'] = $valid->textValid($pseudo, 'pseudo', 3, 45);
			$error['email'] = $valid->emailValid($email);
			$error['adress'] = $valid->textValid($adress,'adresse',10,100);
			$error['postal-code'] = $valid->numeric($postal_code, 'code postal');
			$error['postal-code'] = $valid->textValid($postal_code, 'code postal',5,5);
			$error['city'] = $valid->textValid($city, 'nom de ville', 3, 100);
			$error['country'] = $valid->textValid($country, 'nom de pays', 3, 100);
			// voir si possible de file exist
      // si temps voir affichage image de l'avatar dans le formulaire en plus du nom du fichier
      // si temps voir upload de nouvelle image dans formulaire
      $error['avatar'] = $valid->textValid($avatar,'nom de l\'image', 3, 100);

      // test si lorsque le pseudo saisi existe déjà il est egal à celui renseigné pour l'utilisateur en bdd
      // si ce n'est pas le cas, le pseudo saisi est utilisé pour un autre user -> Error
      if ($users->getUserByUsernameOrEmail($pseudo) && ($pseudo != $userToUpdate['username'] )) 
      {
        $error['pseudo'] = 'Ce pseudo est déjà utilisé pour un autre utilisateur';        
      }
      
      // test si lorsque l'email saisi existe déjà il est egal à celui renseigné pour l'utilisateur en bdd
      // si ce n'est pas le cas, l'email saisi est utilisé pour un autre user -> Error
      if ($users->getUserByUsernameOrEmail($email) && ($email != $userToUpdate['email'] )) 
      {
        $error['email'] = 'Cet email est déjà utilisé pour un autre utilisateur';        
      }

      // Actions suivant erreurs
      if ($valid->IsValid($error)) 
      {
        // Pas d'erreurs -> update bdd et redirect sur listing users
        $token = $strU->randomString($length = 100);

        // Update User
        $updateUser = $users->update(['username'    => $pseudo,
                                      'lastName'    => $lastname,
                                      'firstName'   => $firstname,
                                      'email'       => $email,
                                      'token'       => $token,
                                      'modified_at' => ToolHP::nowSql(),
                                      'role'        => $role,
                                      'status'      => $status
                                     ], $userToUpdate['id'], true);

        // Update Adresse
        $updateAdress = $userFactAdress->update(['adress1'     => $adress,
                                                 'postal_code' => $postal_code,
                                                 'town'        => $city,
                                                 'country'     => $country,
                                                 'modified_at' => ToolHP::nowSql()
                                                ], $adressToUpdate['id'], true);
        // Update Avatar
        $updateAvatar = $userAvatar->update(['img_name'    => $avatar,
                                             'modified_at' => ToolHP::nowSql()
                                            ], $avatarToUpdate['id'], true);

        // debug($updateUser);
        // debug($updateAdress);
        // debug($updateAvatar); die();

        // MESSAGE FLASH SUCCESS 

        $this->redirectToRoute('admin_page_users', ['page' => $fromPage]);

      }
      else 
      {
        // Erreurs -> réaffichage formulaire avec erreurs
        # code...
      }


      debug($error); die();
      
      
      $u = $users->getUserByUsernameOrEmail($pseudo);

      debug($users->emailExists($email)); die();

      $e = $users->getUserByUsernameOrEmail($email);
    }
    else 
    {
      // Comment $_POST pourrait il etre vide ?
      die('403 !');
      
    }









  }

}
