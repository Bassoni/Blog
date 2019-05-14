<?php



class Page
{

    private $header;
    private $main;
    private $footer;

    public function getHeader()
	{
		return $this ->header ;
 	}
 	public function setHeader($header)
 	{
 		$this ->header = $header  ;
 	}


	public function getMain()
	{
		return $this ->main ;
 	}
 	public function setMain($main)
 	{
 		$this ->main = $main  ;
 	}

 	public function getFooter()
	{
		return $this ->footer ;
 	}
 	public function setFooter($footer)
 	{
 		$this ->footer = $footer  ;
 	}

    public function __construct($header, $main, $footer)
    {

        $this->header = $header;
        $this->main = $main;
        $this->footer = $footer;
        $this ->afficher();

    }

    public function afficher()
    {
        $this->header->afficher();
        $this->main->afficher();
        $this->footer->afficher();
    }
}