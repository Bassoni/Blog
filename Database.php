<?php

class Database{

	const DB_HOST = 'localhost';
	const DB_NAME = 'blog';
	const DB_USER = 'root';
	const DB_PASSWORD ='';

	function getPDOConnection()
	{

		// création de l'objet PDO ('DSN Data Source Name' , 'User', ' chaine vide car mots de passe est vide')
		$pdo = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME ,self::DB_USER , self::DB_PASSWORD ,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]); 

		//avec cette ligne en plus  pour creer la conexion PDO
		$pdo->exec('SET NAMES UTF8');

		return $pdo;
	}


    function queryAll($sql, array $params=[])
    {
        // $pdo = getPDOConnection();
        // $query = $pdo -> prepare($sql);
        // $query -> execute($params);
        $query=$this->executeQuery($sql, $params);
        return $query -> FetchAll(PDO::FETCH_ASSOC);
    }

    function queryOne($sql, array $params=[])
    {
        // $pdo = getPDOConnection();
        // $query = $pdo -> prepare($sql);
        // $query -> execute($params);
        $query=$this->executeQuery($sql, $params);
        return $query -> Fetch();
    }
            //ici params 'est un tableau qui correspont a tout les element de la requetes sql'
    function queryAction($sql, $params)
    {
        // $pdo = getPDOConnection();
        // $query = $pdo -> prepare($sql);
        // $query -> execute($params);
        $query=$this->executeQuery($sql, $params);
    }



    function executeQuery($sql,array $params=[]){

    	$pdo = $this->getPDOConnection();
        $query = $pdo -> prepare($sql);
        $query -> execute($params);
        return $query;

    }


}


