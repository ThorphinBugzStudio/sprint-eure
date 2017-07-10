<?php

namespace Controller;

use Security\CleanTool;
use Security\ValidationTool;
use Model\UsersModel;
Use W\Security\AuthentificationModel;
use Model\AvatarsModel;
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


		if(!empty($_POST['submit']) && !empty($_FILES['avatar']))
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

			if($model->usernameExists($pseudo))
			{
				$error['pseudo'] = 'Votre pseudo est déjà utilisé';

			}

			if($model->emailExists($email))
			{
				$error['email'] = 'Cet email est déjà utilisé';
			}

			if($valid->IsValid($error))
			{
				$success = true;
				$hashPassword = $auth->hashPassword($password);
				$token = $strU->randomString($length = 100);
				$date = new \DateTime();
				$avatarMod = new AvatarsModel();

	//insertion nouveau user
				$insert_users = $model->insert(['username' => $pseudo,
				'lastName' => $lastname,
				'firstName' => $firstname,
				'email'  => $email,
				'password' => $hashPassword,
				'token' => $token,
				'role' => 'client',
				'created_at' => $date->format('Y-m-d H:i:s'),
				'status' => 'active' ]);

 //recup l'user id et stockage de la valeur ds $userId
				$user_id = $model->getUserId($pseudo);
				$userId = $user_id['id'];


				//insertion de l'image
								$dossier = './assets/img/avatars/';
								$file_tmp = $avatar['tmp_name'];
								$file_name = $avatar['name'];
								$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
								$dest_fichier = date('y_m_d_H_i') . '_avatar.' . $file_extension;


								if(move_uploaded_file($file_tmp, $dossier . $dest_fichier))
								{
									$model->setTable('avatars');

									$insert_avatar = $model->insert(['img_name' => $file_name,
									'user_id' => $userId,
									'created_at' => $date->format('Y-m-d H:i:s')]);
								}

				//update de l'avatarId ds la table user
								$model->setTable('users');

							$avatarId = $avatarMod->getAvatarId($userId);

							$model->update(['username' => $pseudo,
							'lastName' => $lastname,
							'firstName' => $firstname,
							'email'  => $email,
							'avatars_id' => $avatarId['id'],
							'password' => $hashPassword,
							'token' => $token,
							'role' => 'client',
							'created_at' => $date->format('Y-m-d H:i:s'),
							'status' => 'active' ] , $userId);


				$model->setTable('user_adresses');

				$insert_useradress = $model->insert(['users_id' => $userId,
				'adress1' => $adress,
				'postal_code' => $postal_code,
				'town' => $city,
				'country' => $country,
				'adress_type' => 'facturation',
				'created_at' => $date->format('Y-m-d H:i:s')]);


				$this->flash('Bienvenue ' . $pseudo . '. Veuillez vous connecter ', 'success');
				$this->redirectToRoute('login');

			} else {
				$this->show('users/inscription',['error' => $error]);
			}
		}
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
		$error = [];
		$model = new UsersModel();
		$clean = new CleanTool();
		$valid = new ValidationTool();
		$auth = new AuthentificationModel();

		if(!empty($_POST['submit']))
		{
			$post = $clean->cleanPost($_POST);

			$pseudo_mail = $post['pseudo-mail'];
			$password = $post['password'];

			$error['pseudo-mail'] = $valid->textValid($pseudo_mail, 'pseudo ou un email',6,70);
			$error['password'] = $valid->textValid($password, 'mot de passe', 6, 100);

			if($valid->IsValid($error))
			{
				$user = $model->getUserByUsernameOrEmail($pseudo_mail);

				$userPseudo = $user['username'];
				$userEmail = $user['email'];
				$userPassword = $user['password'];

				if(!empty($user))
				{
					if($auth->isValidLoginInfo($userPseudo, $userPassword)== 0 || $auth->isValidLoginInfo($userEmail, $userPassword)== 0)
					{
						$auth->logUserIn($user);
						$this->flash('Bienvenue ' . $userPseudo . ' ,heureux de vous revoir ', 'success');
						$this->redirectToRoute('default_home');

					} else {
						$error['pseudo-mail'] = 'Vos identifiants sont inconnus';
						$this->show('users/login', ['error' => $error]);
					}
				} else {
					$error['pseudo-mail'] = 'Vos identifiants sont inconnus';
					$this->show('users/login', ['error' => $error]);
				}
			} else {
				$this->show('users/login', ['error' => $error]);
			}
		}
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
		$auth = new AuthentificationModel();

		$auth->logUserOut();
		$this->flash('Vous êtes déconnecté', 'success');
		$this->redirectToRoute('default_home');
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
		$error = [];
		$valid = new ValidationTool();
		$clean = new CleanTool();
		$model = new UsersModel();


		if(!empty($_POST['submit']))
		{
			$post = $clean->cleanPost($_POST);
			$email = $post['emailconfirm'];

			$error['emailconfirm'] = $valid->textValid($email,'email',6,70);
			$error['invalid-email'] = $valid->emailValid($email);


			if($valid->IsValid($error))
			{
				$user = $model->emailExists($email);
				if(!empty($user))
				{
					$success = true;
					$codedemail = urlencode($user['email']);
					$codedtoken = urlencode($user['token']);
    ///???? créer une url contenant le token et l'email encodés
					$link = '<a href="'.$this->generateUrl($routeName, $params = array(), $absolute = false).'?email='.$codedemail.'&token='.$codedtoken.'" style="color:tomato;">Modifier votre mot de passe</a>';

					$this->show('users/password-lost',['success' => $success, 'link' => $link]);

				} else {
					$error['emailconfirm'] = 'Email inconnu dans la BDD';
					$this->show('users/password-lost',['error' => $error]);
				}
			} else {
				$this->show('users/password-lost',['error' => $error]);
			}
		}
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
