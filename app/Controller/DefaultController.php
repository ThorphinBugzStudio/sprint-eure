<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

class DefaultController extends AppController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

}
