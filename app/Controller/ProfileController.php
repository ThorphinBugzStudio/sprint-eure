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
    // $auth = new AuthentificationModel();

    $user = $this->getUser();
    // $auth->refreshUser();
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
    $avatarmodel = new AvatarsModel();
    $adressmodel = new User_adressesModel();
    $date = new \DateTime();

    $user = $this->getUser();


    $user_avatar = $avatarmodel->getUserAvatar($id);


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


      $error['firstname'] = $valid->textValid($firstname, 'nom',3,60);
      $error['lastname'] = $valid->textValid($lastname, 'prénom',3,60);
      $error['email'] = $valid->emailValid($email);
      $error['adress'] = $valid->textValid($adress,'adresse',10,100);
      $error['postal-code'] = $valid->numeric($postal_code, 'code postal');
      $error['postal-code'] = $valid->textValid($postal_code, 'code postal',5,5);
      $error['city'] = $valid->textValid($city, 'nom de ville', 3, 100);
      $error['country'] = $valid->textValid($country, 'nom de pays', 3, 100);
      $error['pseudo'] = $valid->textValid($pseudo, 'pseudo', 3, 45);


      if($pseudo != $user['username'])
      {
        if($model->usernameExists($pseudo))
        {
          $error['pseudo'] = 'Ce pseudo est déjà utilisé';
        }
      }

      if($email != $user['email'])
      {
        if($model->emailExists($email))
  			{
  				$error['email'] = 'Cet email est déjà utilisé';
  			}
      }

      if($valid->IsValid($error))
      {
        $userId = $user['id'];

        //update user
        $model->setTable('spe_users');
        $user_update_sql = $model->update([ 'username' => $pseudo,
				                              'lastName' => $lastname,
				                             'firstName' => $firstname,
				                                'email'  => $email,
				                           'modified_at' => $date->format('Y-m-d H:i:s')], $userId);
                                  //  debug($user_update_sql);
                                  //  die('here');
        //update adresse
        $adressToUp = $adressmodel->getUserAdress($userId);
        $adressId = $adressToUp['id'];
        $model->setTable('spe_user_adresses');
        // $table= $model->getTable();
        // die($table);
        $user_adress_update_sql = $model->update([ 'adress1' => $adress,
				                                             'postal_code' => $postal_code,
                                                            'town' => $city,
                                      				           'country' => $country,
                                                     'modified_at' => $date->format('Y-m-d H:i:s')],$adressId);



        //Si le nom de l'avatar n'est pas vide on l'update sinn on y touche pas!!!!!
        //$avatar contient par défaut 4 errors...donc j'utilise ['name']
        if(!empty($_FILES['avatar']['name']))
        {
          $model->setTable('spe_avatars');
          // $table= $avatarmodel->getTable();
          // die($table);
          $avatar = $_FILES['avatar'];

          $error['avatar'] = $valid->uploadValid($avatar,2000000,['.jpg','.jpeg','.png'],['image/jpeg','image/png','image/jpg']);

          if($valid->IsValid($error))
          {

            //update de l'avatar
            $dossier = './assets/img/avatars/';
            $file_tmp = $avatar['tmp_name'];
            $file_name = $avatar['name'];
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $dest_fichier = date('y_m_d_H_i') . '_avatar.' . $file_extension;
            $file_name = $dest_fichier;



            if(move_uploaded_file($file_tmp, $dossier . $dest_fichier))
            {
              $avatarToUp = $avatarmodel->getAvatarId($userId);
              $avatarId = $avatarToUp['id'];

              $user_avatar_update_sql = $avatarmodel->update([ 'img_name' => $file_name,
                                                            'modified_at' => $date->format('Y-m-d H:i:s')],$avatarId);
            }
          } else {
            $this->show('users/profile-modify', ['error' => $error]);
          }
        }
        //deconnexion de  l'utilisateur et message flash
          $auth->logUserOut();
          $this->flash('Votre profil a bien été mis à jour. Veuillez vous reconnecter', 'success');
          //redirection vers login
          $this->redirectToRoute('login');



      } else {
        $this->show('users/profile-modify', ['error' => $error ,'user_avatar' => $user_avatar]);
      }
    } else {
      $this->show('users/profile-modify', ['error' => $error, 'user_avatar' => $user_avatar]);
    }
 }
}
