<?php


// require_once 'CommentModel.php';

// //les deux lignes qui suivent effectuent la connexion a la Base de données

// 	//$_Post est une variable dite SuperGlobale (native de php) il s'agit d'un Tableau qui stock toute les données qui sont entrée dans les cases du formulaire
// 	if (!empty($_POST)) {
// 		$nickname=$_POST['nickname'];
// 		$content=$_POST['content'];
// 		$id=$_POST['postId'];
// 		$love=$_POST['love'];

// 		$goodOrNot=0;

// 		if((!empty($content)) && (!empty($nickname))){
// 			$goodOrNeedToFill='Merci '.$nickname .' pour votre commentaire';

// 			$goodOrNot=1;

// 			$sql='INSERT INTO Comment(Nickname, Content, PostID, Love) VALUES (?,?,?,?)';

// 			$addComment= new CommentModel();
// 			$addComment->addComment($nickname, $content, $id, $love);

// 		}
				
// 	}


// 	// afficher la l'information des erreur sql
// 	//var_dump($query->errorInfo()); 

// header('Location: index.php?p=post&postId='.$id .'&goodOrNot='.$goodOrNot .'&goodOrNeedToFill='.$goodOrNeedToFill);

// exit;