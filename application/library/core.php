<?php

class Core 
{
	public $var = "default_value";
	function __get($property_name)
	{
		$include_directories = array("library", "view", "action", "errors", "template");
		if(!property_exists(__CLASS__, $property_name))
		{	
			foreach($include_directories as $include_directory)
			{
				$path = $this->appRoot() . $include_directory . "/" . $property_name . ".php";
				if(file_exists($path))
				{
					return new $property_name;
					break; // exit the loop when the porperty if found
				}
				
				else 
				{
					
				}
			}
		}
	}
	
	function __set($property_name = null, $property_value)
	{
		echo "done here";
		echo gettype($property_name);
		
	}
	
	public function appRoot()
	{
		return $_SERVER['DOCUMENT_ROOT'] . "/application/";
	}
	
	public function setvar($name)
	{
		$this->var = $name;
	}
	
	
}

class Someclass extends Core
{
	public function classmethod()
	{
		$this->otherclass->method();
	}
}

