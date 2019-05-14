<?php

include 'main.php';
include 'header.php';
include 'footer.php';
include 'database.php';
include 'page.php';

class Controler
{

 private $uri;

	 public function __construct($uri)
	 {
		 $this->uri = $uri ;
		 $this->aiguiller() ;
	 }


	private function aiguiller()
	{
		switch ($this->uri) {
			case '/PHP/Exo10BlogAjaxObjetTemplate/':
				$page = new Page(
						new Header('home','views/header.phtml','Acceuil Quiz Panic'),
						new Main('home','views/mainAccueil.phtml'),
						new Footer('home','views/footer.phtml')
					);
				break;
			case '/PHP/Exo10BlogAjaxObjetTemplate.php':
				$page = new Page(
						new Header('home','views/header.phtml','Acceuil Quiz Panic'),
						new Main('home','views/mainAccueil.phtml'),
						new Footer('home','views/footer.phtml')
					);
				break;	
			case '/PHP/Exo10BlogAjaxObjetTemplate/page2.php':
				// include 'page2jeux.phtml';
				$page = new Page(
					new Header('games','views/header.phtml','Nos Jeux Gerwin Software'),
					new Main('games','views/mainJeux.phtml'),
					new Footer('games','views/footer.phtml')
				);
				break;
			case '/PHP/Exo10BlogAjaxObjetTemplate/page3.php':
				$page = new Page(
					new Header('theGame','views/header.phtml','Quiz Panic'),
					new Main('theGame','views/mainQp.phtml'),
					new Footer('theGame','views/footer.phtml')
				);
				break;
			// case 'value':
			// 	# code...
			// 	break;
			
			default:
				print('error : 404 !');
				break;
		}



	} 
}