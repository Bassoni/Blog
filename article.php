<?php




// require_once 'PostModel.php';
// require_once 'CommentModel.php';

// // sert a recuperer ce qui se trouve dans l'url afin de savoir sur quel lien on a clicker pour ariver sur cette nouvelle page 
// // le contenu de  $_GET[' '] correspont a la ligne dans le fichier .phtml , qui défini le lien qui permet de se rendre a la page de l'article x  en lui donnant les information tel que : <a id="linkarticle<?= $post['Id']; //Pointd'interogation>" href="article.php?postId=<?= $post['Id']; //Pointd'interogation>"></br>Lire la suite-></a>
// $id =$_GET['postId'];

// if (array_key_exists('goodOrNot', $_GET) && array_key_exists('goodOrNeedToFill', $_GET)) {
// 	$goodOrNot =$_GET['goodOrNot'];
// 	$goodOrNeedToFill =$_GET['goodOrNeedToFill'];
// }else{
// 	$goodOrNot =0;
// 	$goodOrNeedToFill ='Vous avez deja posté un commentaire';
// }



// $postmodel = new PostModel;
// $post = $postmodel->getOnePost($id);




//  $sql = 'SELECT Nickname, Content, CreatedAt, Love FROM Comment WHERE PostId = ? ORDER BY CreatedAt DESC';
         

// $commentModel = new CommentModel;
// $comments = $commentModel->getCommentsByPostId($id);
 


// include 'article.phtml';
