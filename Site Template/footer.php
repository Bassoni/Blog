<?php
// le fichier PHP qui va appeler un fichier PHP qui contient du code HTML

class Footer
{

	private $reference;
	private $template;


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

	

	public function __construct($reference, $template)
	{
		$this ->reference = $reference ;
		$this ->template = $template ;
	}

	public function afficher()
	{
		$reference = $this ->reference;
		include($this ->template);
	}


}