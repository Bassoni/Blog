<?php
// le fichier PHP qui va appeler un fichier PHP qui contient du code HTML


include_once 'HomeControler.php';
include_once 'PostControler.php';
include_once 'signinControler.php';

$page='home'; 

if(array_key_exists('p', $_GET)&& isset($_GET['p'])){


	$page=$_GET['p'];


}



switch ($page) {
	case 'home':
		
		$controler= new HomeControler();
		$controler->index();

		break;
	case 'post':
		$id =$_GET['postId'];
		$controler= new PostControler();
		$controler->post($id);
		break;
	case 'addcomment':
		$controler= new PostControler();
		$controler->addComment();
		break;
	case 'signin':
		$controler= new SigninControler();

		if (!empty($_POST)) {
			$controler->signin();
		}
		$controler->showForm();

		break;

	default:
		echo "page $page introuvable";
		break;
}




