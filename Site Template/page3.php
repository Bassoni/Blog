<?php

include 'controler.php';

// $sql ='SELECT Post.Id,Title,Content,CreatedAt,Image,CategoryId,Name FROM Post INNER JOIN Category ON Post.CategoryId=Category.Id';



// 	//$query est l'objet qui represente la requete
// 	// demande de préparer la requete
// 	$query=$pdo->prepare($sql); //objet PDOstatement

// 	// demande de préparer la requete
// 	$query->execute();


// 	// afficher la l'information des erreur sql
// 	//var_dump($query->errorInfo()); 


// 	//$post
// 	//récupération de toute les données de la requete qui est par defaut un Tableau
// 	$posts=$query->FetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC retire les lignes doubles


// 	//il est possible de spécifier le contenu que l'on souhaite récuperer avec les parametre de FetchAll( )
// 	/*$posts=$query->FetchAll(PDO::FETCH_ASSOC);*/


$ctrl= new Controler($_SERVER['REQUEST_URI']);

