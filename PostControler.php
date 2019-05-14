<?php



/**
 * 
 */
class PostControler
{
	
	function post($id)
	{
		
		require_once 'PostModel.php';
		require_once 'CommentModel.php';

		// sert a recuperer ce qui se trouve dans l'url afin de savoir sur quel lien on a clicker pour ariver sur cette nouvelle page 
		// le contenu de  $_GET[' '] correspont a la ligne dans le fichier .phtml , qui défini le lien qui permet de se rendre a la page de l'article x  en lui donnant les information tel que : <a id="linkarticle<?= $post['Id']; //Pointd'interogation>" href="article.php?postId=<?= $post['Id']; //Pointd'interogation>"></br>Lire la suite-></a>
		

		if (array_key_exists('goodOrNot', $_GET) && array_key_exists('goodOrNeedToFill', $_GET)) {
			$goodOrNot =$_GET['goodOrNot'];
			$goodOrNeedToFill =$_GET['goodOrNeedToFill'];
		}else{
			$goodOrNot =0;
			$goodOrNeedToFill ='Vous avez deja posté un commentaire';
		}



		$postmodel = new PostModel;
		$post = $postmodel->getOnePost($id);


		 $sql = 'SELECT Nickname, Content, CreatedAt, Love FROM Comment WHERE PostId = ? ORDER BY CreatedAt DESC';
		         

		$commentModel = new CommentModel;
		$comments = $commentModel->getCommentsByPostId($id);
		 


		include 'article.phtml';

	}



	function addComment()
	{

		require_once 'CommentModel.php';

		//les deux lignes qui suivent effectuent la connexion a la Base de données

		//$_Post est une variable dite SuperGlobale (native de php) il s'agit d'un Tableau qui stock toute les données qui sont entrée dans les cases du formulaire
		if (!empty($_POST)) {
			$nickname=$_POST['nickname'];
			$content=$_POST['content'];
			$id=$_POST['postId'];
			$love=$_POST['love'];

			$goodOrNot=0;

			if((!empty($content)) && (!empty($nickname))){
				$goodOrNeedToFill='Merci '.$nickname .' pour votre commentaire';

				$goodOrNot=1;

				$sql='INSERT INTO Comment(Nickname, Content, PostID, Love) VALUES (?,?,?,?)';

				$addComment= new CommentModel();
				$addComment->addComment($nickname, $content, $id, $love);

			}
					
		}

			// afficher la l'information des erreur sql
			//var_dump($query->errorInfo()); 

		header('Location: index.php?p=post&postId='.$id .'&goodOrNot='.$goodOrNot .'&goodOrNeedToFill='.$goodOrNeedToFill);

		exit;

	}




}