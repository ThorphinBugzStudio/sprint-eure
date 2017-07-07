<?php

namespace Controller;
use Model\CommentsModel;
use Security\ValidationTool;

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
		$model = new CommentsModel();

		$comments = $model->last5Comments();
		//debug($comments);
		$this->show('default/home',['comments' => $comments]);
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
		$model = new CommentsModel();
		$verifs = new ValidationTool();
		$error = [];

		if(!empty($_POST['submit']))
		{
			$username = $_SESSION['username'];
			$comment = trim(strip_tags($_POST['comment']));

			$error['comment'] = $verifs->textValid($comment, 'commentaire',10,500);

			if($verifs->IsValid($error))
			{

				$created_at = date('Y-m-d G:i:s');
				$model->insert(['users_id' => $_SESSION['user_id'],
												'comment' => $comment,
												'created_at' => $created_at ]);

												$model = new CommentsModel();
												$comments = $model->last5Comments();

												$this->flash('Commentaire en attente de moderation', 'success');
												$this->show('default/home',['comments' => $comments]);
			}
		}
	}

}
