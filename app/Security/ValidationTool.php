<?php
// app/Security/ValidationTools.php
namespace Security;

class ValidationTool
{
	protected $errors = array();


	public function IsValid($errors)
	{
		foreach ($errors as $key => $value) {
			if(!empty($value)) { // a verifier ++
				return false;
			}
		}
		return true;
	}

	/**
	 * emailValid
	 * @param email $email
	 * @return string $error
	 */

	public function emailValid($email)
	{
		$error = '';
		if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
			$error = 'Adresse email invalide.';
		}
			elseif(strlen($email) > 50) {
			$error = 'Votre adresse e-mail est trop longue.';
		}
		return $error;
	}

	/**
	 * textValid
	 * @param POST $text string
	 * @param title $title string
	 * @param min $min int
	 * @param max $max int
	 * @param empty $empty bool
	 * @return string $error
	 */

	public function textValid($text, $title, $min = 3,  $max = 50, $empty = false)
	{

		$error = '';
		if(!empty($text)) {
			$strtext = strlen($text);
			if($strtext > $max) {
				$error = 'Votre ' . $title . ' est trop long';
			} elseif($strtext < $min) {
				$error = 'Votre ' . $title . ' est trop court';
			}
		} else {
			if(!$empty) {
				$error = 'Veuillez renseigner un ' . $title . '.';
			}
		}
		return $error;

	}

	/**
	 * uploadValid
	 * @param $_FILES['image'] array
	 * @param $sizeMax int  => $sizeMax = 2000000;
   * @param $extensions array => $extensions = array( '.jpg','.jpeg', '.png');
	 * @param $extensionsmime array => $extensionsmime = array('image/jpeg','image/png','image/jpg');
	 * @return string $error
	 */


	public function uploadValid($file,$sizeMax,$extensions,$extensionsmime)
	{
		$error = '';

		if(!empty($file)) {
			if ($file['error'] > 0) {
				if ($file['error'] != 4) {
					$error = 'Problem: ' . $file['error'] . '<br />';
				}else {
					$error = 'Aucun fichier n\'a été téléchargé';
				}
			} else {
				$file_name = $file['name']; // le nom du fichier
				$file_size = $file['size']; // la taille ( peu fiable depend du navigateur)
				$file_tmp  = $file['tmp_name'];  // le chemin du fichier temporaire
				$file_type = $file['type'];  // type MIME (peu fiable, depend du navigateur)

				// Taille du fichier
				// $sizeMax = 2000000;
				if($file_size > $sizeMax || filesize($file_tmp) > $sizeMax){ //limite le fichier a 2mo
					$error = 'Le fichier est trop gros (max '. $sizeMax/1000000 .'mo)';
				}
				else {
						$i_point = strrpos($file_name,'.');
						$fileExtension = substr($file_name, $i_point ,strlen($file_name) - $i_point);

						if (!in_array($fileExtension, $extensions)) {
							$error = 'Veuillez télécharger une image de type jpg, jpeg ou png ';
						} else {

							// alternative, sécurité +++++
							$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
							$mime = finfo_file($finfo, $file_tmp);
							finfo_close($finfo);

							if (!in_array($mime, $extensionsmime)) {
								$error = 'Veuillez télécharger une image de type jpg, jpeg ou png ';
							}
						}
					}
				}
		}
		return $error;
	}

	public function numeric($nb, $nom) {
		$error = '';
		if(!empty($nb)) {
			if (!is_numeric($nb) )
				{
					$error = 'Veuillez ne saisir que des chiffres';
				}
			} else {
				$error = 'Veuillez renseigner le '.$nom ;
			}
			return $error;
	}

	public function entier($nb, $nom) {
		$error = '';
		if(!empty($nb)) {
			if (!ctype_digit($nb) )
				{
					$error = 'Veuillez ne saisir que des chiffres';
				}
			} else {
				$error = 'Veuillez renseigner la '.$nom ;
			}
			return $error;
	}

	function passwordError($password,$password_confirm,$min,$max)
	{
	  $error='';
	  if(!empty($password))
	  {
	    if(!empty($password_confirm)){
	    } else {
	      $error = 'Veuillez confirmer votre mot de passe';
	    }
	    if($password!==$password_confirm){
	      $error = 'Les mots de passe ne correspondent pas';
	    }
	    if(strlen($password)<$min){
	      $error = 'Votre mot de passe est trop court (6 caractères minimum)';
	    }
	    if(strlen($password)>$max){
	      $error = 'Votre mot de passe est trop long (255 caractères maximum)';
	    }
	  } else {
	    $error = 'Veuillez entrer un mot de passe';
	  }
	  return $error;
	}


}
