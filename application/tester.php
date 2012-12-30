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


function __autoload($class_name)
{
	$include_directories = array("library", "view", "action", "errors", "template");
	foreach($include_directories as $include_directory)
	{
		$path = $_SERVER['DOCUMENT_ROOT'] . "/application/" . $include_directory . "/" . $class_name . ".php";
		if(file_exists($path))
		{
			include($path);
		}
		
		else 
		{
			echo "The " . $class_name . " to directory " . $include_directory . " failed <br />";
		}
	}
}
$core = new Core();
$core->setVar("newname");
echo $core->var;

$core->var = "This is the other value";