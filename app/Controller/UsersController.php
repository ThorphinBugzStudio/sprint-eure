<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

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
		# code
	}

	/**
	 * Formulaire connection.
	 *
	 * @return void
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
