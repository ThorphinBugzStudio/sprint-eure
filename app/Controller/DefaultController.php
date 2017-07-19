<?php

namespace Controller;
use Model\CommentsModel;
use Security\ValidationTool;
use Model\ItemsModel;

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
		$user = $this->getUser();

		$items = new ItemsModel();

		$model = new CommentsModel();

		$comments = $model->last5Comments();

		$results = $items->findAllproductactive('home', '1', $orderBy = 'created_at', $orderDir = 'DESC', $limit = 5);

		$this->show('default/home',['user' => $user,'comments' => $comments, 'results' => $results]);
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

		/**
		 * Soumettre un nouveau commentaire
		 * @return [type] [description]
		 */

	public function commentsAction()
	{
		$error = [];
		$model = new CommentsModel();
		$verifs = new ValidationTool();

		$comments = $model->last5Comments();

		$user = $this->getUser();

		if(!empty($_POST['submit']))
		{
			$user = $this->getUser();
			$username = $user['username'];
			$user_id = $user['id'];
			$created_at = date('Y-m-d G:i:s');


			$comment = trim(strip_tags($_POST['comment']));

			$error['comment'] = $verifs->textValid($comment, 'commentaire',10,500);

			if($verifs->IsValid($error))
			{
				$model->insert(['users_id' => $user_id,
												'comment' => $comment,
												'created_at' => $created_at ]);

												$this->flash('Commentaire en attente de moderation', 'success');
												$this->redirectToRoute('default_home');
			} else {
				$this->show('default/home',['user' => $user , 'error' => $error , 'comments' => $comments, 'actualComment' => $comment]);
			}
		}
	}

}
