<?php



class View extends Core
{
	private $default_view = "home";
	public $testervar = "testervar default";
	
	public function getType()
	{
		if($_GET)
		{
			return $_GET['view'];
		}
		
		else
		{
			return $this->default_view;
		}
	}
	
	public function viewTester()
	{
		echo "this si the viewteste";
	}

}
