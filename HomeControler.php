<?php


/**
 * 
 */
class HomeControler
{
	
	function index()
	{		
		include_once 'PostModel.php';
		include 'UserSession.php';
		include 'FlashBag.php';

		$titre = "Le super blog de Yoshi";

		//les deux lignes qui suivent effectuent la connexion a la Base de données
		


		$postmodel = new PostModel;
		$posts = $postmodel->getAllPosts();

		$fb=new FlashBag;


	include 'accueil.phtml';
	}
}
