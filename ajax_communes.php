<?php

include 'Database.php';

$cp=$_GET['cp'];

	//LIKE permet de rechercher une portion de text  ou permet de faire une recherche textuelle
$sql = 'SELECT ville_id, ville_nom_reel FROM communes_france WHERE ville_code_postal LIKE ? ORDER BY ville_nom_reel';

    //$query est l'objet qui represente la requete
    // demande de préparer la requete


  $database = new Database(); 
  $villes= $database ->queryAll($sql, ['%'.$cp.'%']);


	// il faut absolument ne pas laisser de var_dump apres une requete avec ajax car sinon cela peut entrainer des erreur
	// var_dump($cp);

	echo json_encode($villes);
	exit;
