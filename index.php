<?php

function __autoload($class_name)
{
	$include_directories = array("library", "view", "action", "errors", "template");
	foreach($include_directories as $include_directory)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . "/application/" . $include_directory . "/" . $class_name . ".php";
		if(file_exists($path))
		{
			include($path);
			//echo "> > > The " . $class_name . " to directory " . $include_directory . " SUCCEEDED <br />";
		}
		
		else 
		{
			//echo "The " . $class_name . " to directory " . $include_directory . " failed <br />";
		}
	}
}

$core = new Core();

class Index extends Core
{
	function __construct($core)
	{
		$this->view->viewTester();

		$this->template->setComponents(array("head","header","navigation", "_content", "footer"));
		$this->template->setContent($this->view->getType());
		$this->template->generate();
		
		echo $this->template->content;
		
		$this->database->connect
		(
			"root",
			"", // password field is empty
			"localhost",
			"android_portal"
		);
	}
}

$index = new Index($core);

