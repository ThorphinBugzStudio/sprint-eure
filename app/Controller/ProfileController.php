<?php

namespace Controller;

use W\Model\Model;
use Model\UsersModel;
use Model\User_adressesModel;
use Model\AvatarsModel;
use Security\CleanTool;
use Security\ValidationTool;
use W\Security\AuthentificationModel;
use W\Security\StringUtils;

/**
 * Controller Gestion du profile utilisateur par l'utilisateur.
 */
class ProfileController extends AppController
{
  /**
   * Page informations du profile.
   *
   * @return void
   */
  public function profile()
  {
    $adress = new User_adressesModel();
    $avatar = new AvatarsModel();

    $user = $this->getUser();
    $user_avatar = $avatar->getUserAvatar($user['id']);

    $user_adress = $adress->getUserAdress($user['id']);

    $this->show('users/user-profile', ['user_adress' => $user_adress,
                                        'user_avatar' => $user_avatar]);
  }

  /**
   * Formulaire de modification du profile.
   *
   * @return void
   */
  public function profileModify($id)
  {
    $adress = new User_adressesModel();
    $avatar = new AvatarsModel();
    $user = $this->getUser();

    $user_avatar = $avatar->getUserAvatar($user['id']);

    $user_adress = $adress->getUserAdress($user['id']);

    if($id == $user['id'])
    {
      $this->show('users/profile-modify', ['user_adress' => $user_adress,
                                           'user_avatar' => $user_avatar]);
    } else {
      $this->showNotFound();
    }


  }

  /**
   * Traitement du formulaire de modification du profile.
   * Redirection sur page informations du profile.
   *
   * @return void
   */
  public function profileModifyAction()
  {
    $error = [];
    $success = false;
    $clean = new CleanTool();
    $valid = new ValidationTool();
    $model = new UsersModel();
    $auth = new AuthentificationModel();
    $strU = new StringUtils();


    if(!empty($_POST['submit']))
    {


      $post = $clean->cleanPost($_POST);

      $firstname = $post['firstname'];
      $lastname = $post['lastname'];
      $email = $post['email'];
      $adress = $post['adress'];
      $postal_code = $post['postal-code'];
      $city = $post['city'];
      $country = $post['country'];
      $pseudo = $post['pseudo'];
      $password = $post['password'];
      $password_confirm = $post['password-confirm'];
      $avatar = $_FILES['avatar'];

      $error['firstname'] = $valid->textValid($firstname, 'nom',3,60);
      $error['lastname'] = $valid->textValid($lastname, 'prénom',3,60);
      $error['email'] = $valid->emailValid($email);
      $error['adress'] = $valid->textValid($adress,'adresse',10,100);
      $error['postal-code'] = $valid->numeric($postal_code, 'code postal');
      $error['postal-code'] = $valid->textValid($postal_code, 'code postal',5,5);
      $error['city'] = $valid->textValid($city, 'nom de ville', 3, 100);
      $error['country'] = $valid->textValid($country, 'nom de pays', 3, 100);
      $error['pseudo'] = $valid->textValid($pseudo, 'pseudo', 3, 45);
      $error['password'] = $valid->textValid($password, 'mot de passe', 6, 40);
      $error['password'] = $valid->passwordError($password,$password_confirm,6,40);
      $error['avatar'] = $valid->uploadValid($avatar,2000000,['.jpg','.jpeg','.png'],['image/jpeg','image/png','image/jpg']);
debug($error);
die('here');
      if($valid->IsValid($error))
      {
        $this->redirectToRoute('user_profile');
      } else {
        $this->show('users/profile-modify', ['error' => $error]);
      }
    } else {
      $this->showNotFound();
    }
 }
}
