<?php

namespace Controller;

use Security\CleanTool;
use Security\ValidationTool;
use Model\UsersModel;
Use W\Security\AuthentificationModel;
use W\Security\StringUtils;
/**
 * Controller gestion des utilisateurs.
 */
class UsersController extends AppController
{
	/**
	 * Formulaire inscription.
	 *
	 * @return void
	 */
	public function inscription()
	{
		$this->show('users/inscription');
	}

	/**
	 * Traitement du formulaire d'inscription.
	 * Redirection sur login.
	 *
	 * @return void
	 */
	public function inscriptionAction()
	{
		$error = [];
		$success = false;
		$clean = new CleanTool();
		$valid = new ValidationTool();
		$model = new UsersModel();
		$auth = new AuthentificationModel();
		$strU = new StringUtils();


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

			if($valid->IsValid($error))
      {
				$success = true;
        $hashPassword = $auth->hashPassword($password);
        $token = $strU->randomString($length = 100);
        $date = new \DateTime();

        $insert_users = $model->insert(['username' => $pseudo,
                                       'lastName' => $lastname,
                                       'firstName' => $firstname,
																			   'email'  => $email,
                                       'password' => $hashPassword,
																			 'token' => $token,
																			 'role' => 'client',
																			 'created_at' => $date->format('Y-m-d H:i:s'),
                                       'status' => 'active' ]);



								$user_id = $model->getUserId($pseudo);

      	$model->setTable('user_adresses');

				$insert_useradress = $model->insert(['users_id' => $user_id['id'],
																						 'adress1' => $adress,
																					 'postal_code' => $postal_code,
																						   'town' => $city,
																						 	'country' => $country,
																							'adress_type' => 'facturation',
																						 	'created_at' => $date->format('Y-m-d H:i:s')]);


				$file_tmp = $avatar['tmp-name'];
				$file_name = $avatar['name'];
				$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
				$dest_fichier = date('y_m_d_H_i') . '_avatar.' . $file_extension;

				if(move_uploaded_file($file_tmp, ('./assets/img/avatars/') . $dest_fichier))
				{
					$model->setTable('avatars');

					$insert_avatar = $model->insert(['img_name' => $file_name,
																						'user_id' => $user_id['id'],
																					 'created_at' => $date->format('Y-m-d H:i:s')]);
																					 die($insert_avatar);
				}

      } else {
        $this->show('users/inscription',['error' => $error]);
			}

			$data = array(
				'error' => $error,
				'success' => $success,
				'pseudo' => $pseudo,
				'lastName' => $lastname,
				'firstName' => $firstname,
				'email'  => $email,
				'password' => $password,
				'adress' => $adress,
				'postal' => $postal_code,
				'country' => $country,
				'avatar' => $avatar,
				'password' => $password,
				'passwordconfirm' => $passwordconfirm
			);
			$this->showJson($data);
			die('here');

	}

	/**
	 * Formulaire connection.
	 *
	 * void
	 */

	public function login()
	{
		$this->show('users/login');
	}

	/**
	 * Traitement du formulaire de connection.
	 *
	 * @return void
	 */
	public function loginAction()
	{
		// redirection vers home
	}

	/**
	 * Traitement de la deconnection.
	 * Redirection vers home.
	 *
	 * @return void
	 */
	public function logout()
	{
		# code
	}

	/**
	 * Formulaire mot de passe perdu.
	 *
	 * @return void
	 */
	public function passwordLost()
	{
		$this->show('users/password-lost');
	}

	/**
	 * Traitement du formulaire de mot de passe perdu.
	 * Redirection vers login.
	 *
	 * @return void
	 */
	public function passwordLostAction()
	{
		# code
	}

	/**
	 * Formulaire mot de passe perdu.
	 *
	 * @return void
	 */
	public function passwordModify()
	{
		$this->show('users/password-modify');
	}

	/**
	 * Traitement du formulaire de mot de passe perdu.
	 * Redirection vers login.
	 *
	 * @return void
	 */
	public function passwordModifyAction()
	{
		# code
	}
}
