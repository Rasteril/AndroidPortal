<?php

$available_dev_hosts = array("portal.dev","www.androidportal.dev","androidportal.dev");
if( in_array($_SERVER['HTTP_HOST'], $available_dev_hosts))
{
	set_include_path("C:/Developer/Projects/AndroidPortal/application/");
}
else 
{
	set_include_path("www.somewebsite/somepath/");
}

include_once "library/core.php";

include_once "library/view.php";
include_once "library/database.php";

//declaring object instances to solve the include in function problem. TODO: fix this.
$core = new Core();
$database = new Database();
$view = new View();

class Page extends Core
{
	private $view;
	private $database;
	private $page;
	function __construct($view, $database)
	{
		$this->view = $view;
		$this->database = $database;
		$this->page = $this->getPage();
	}
	
	private function getPage() 
	{
		return $_GET['page'];
	}
	public function checkPage()
	{
		$query = $this->database->query("SELECT `content` FROM `pages` WHERE `name` = '" . $this->page . "'");
		
		if($query)
		{
			echo $this->database->result($query);
		}
		
		else
		{
			echo "THERE HAS BEEN AN ERROR";
		}
		
	}
}

global $page;
$page = new Page($view, $database);

$page->checkPage();