<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class UsersController extends AppController
{
	public function inscription()
	{
		//afficher la page inscription.php
		$this->show('users/inscription');
	}

	public function inscriptionAction()
	{
		//traitement du formulaire et redirection sur login
	}

	public function login()
	{
		$this->show('users/login');
	}

	public function loginAction()
	{
		//traitement du form login et redirection vers home
	}

	public function logout()
	{
		//comme sn nom l'indique redirection vers home
	}

	public function passwordLost()
	{
		$this->show('users/passwordLost');
	}

	public function passwordLostAction()
	{
		//traitement du form passwordLost et redirection vers login
	}

	public function passwordModify()
	{
		$this->show('users/passwordModify');
	}

	public function passwordModifyAction()
	{
		//traitement du form passwordModifyAction et redirection vers login
	}
}
