<?php
// le fichier PHP qui va appeler un fichier PHP qui contient du code HTML

class Header
{

	private $reference;
	private $template;
	private $title;


	public function getReference()
	{
		return $this ->reference ;
 	}
 	public function setReference($reference)
 	{
 		$this ->reference = $reference  ;
 	}


	public function getTemplate()
	{
		return $this ->template ;
 	}
 	public function setTemplate($template)
 	{
 		$this ->template = $template  ;
 	}

	public function getTitle()
	{
		return $this ->title ;
 	}
 	public function setTitle($title)
 	{
 		$this ->title = $title  ;
 	}

 	
 	private function init()
    {
        $db = new Database();
        $result = $db->queryOne("SELECT gerwin FROM page WHERE RefPage= '" .$this->reference . "' AND RefLng='fr'", array());
        $this->titre = $result['gerwin'];
    }


	 
	public function __construct($reference, $template,$title)
	{
		$this->reference = $reference ;
		$this->template = $template ;
		$this->title = $title;
	}

	public function afficher()
	{
		$reference = $this->reference;
		$title = $this->title;
		include($this->template);
	}

}