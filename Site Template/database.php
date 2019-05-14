<?php

class Database
{
	private $host;

	private $dbName;

	private $user;

	private $pass;




	public function getHost()
	{
		return $this->host;
	}

	public function setHost($host)
	{
		$this->host=$host;
	}

	public function getDbName()
	{
		return $this->dbName;
	}

	public function setDbName($dbName)
	{
		$this->dbName=$dbName;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setUser($user)
	{
		$this->user=$user;
	}

	public function getPass()
	{
		return $this->pass;
	}

	public function setPass($pass)
	{
		$this->pass=$pass;
	}



	public function __construct($host, $dbName, $user, $pass) {
		$this->host = $host;
		$this->dbname = $dbName;
		$this->user = $user;
		$this->pass = $pass;
	}

	private function getPDOConnection()
	{
		$pdo = new PDO('mysql:host=' . $this->host . $this->dbName, $this->user, $this->pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
		$pdo -> exec('SET NAMES UTF8');

		return $pdo;
	}

	private function executeQuery($sql, array $params = [])
	{
		$pdo = $this->getPDOConnection();
		$query = $pdo -> prepare($sql);
		$query -> execute($params);
		return $query;
	}

	public function queryAll($sql, array $params=[])
	{
		$query = $this->executeQuery($sql, $params);
		return $query -> FetchAll();
	}

	public function queryOne($sql, array $params=[])
	{
		$query = $this->executeQuery($sql, $params);
		return $query -> Fetch();
	}

	public function queryAction($sql, array $params = []) //requet d'action, inserer commentaire ou autre
	{
		$this->executeQuery($sql, $params);
	}

}




