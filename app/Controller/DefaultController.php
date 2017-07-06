<?php

namespace Controller;

// use \W\Controller\Controller; // Inutile puisque heritage de AppController dans le meme espace de nom

/**
 * Controller par défaut.
 */
class DefaultController extends AppController
{

	/**
	 * Page d'accueil par défaut
	 * 
	 * @return void
	 */
	public function home()
	{
		$this->show('default/home');
	}

	/**
	 * Page Comment faire
	 *
	 * @return void
	 */
	public function howTo()
  	{
    	$this->show('default/how-to');
  	}

}
