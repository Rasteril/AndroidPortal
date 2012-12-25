<?php
echo " I have been imported!";
if( $_SERVER['HTTP_HOST'] == "localhost")
{
  set_include_path("C:/xampp/htdocs/application/");
}
else 
{
  set_include_path("www.somewebsite/somepath/");
}

include_once "library/core.php";

/**
	This is a RESOURCE LOADER
	The function of the resource loader is to.. load resoruces. 
	
	Different scripts with different priority levels are able to load only certain scripts. 
	
	With the implementation of the class on a script, you can choose the priority level, but also add some custom scripts, if you desire. 
*/
class ResourceLoader extends Core
{
	public $resource_priorities = array
	(
		"core_priority" => array
		(
			"database.php"
		),
		
		"view_priority" => array
		(
			"core.php"
		)
	);
	
	public function load($priority_level, $custom = array(""))
	{
		print_r( array_keys($this->resource_priorities));
		if (array_key_exists($priority_level, $this->resource_priorities))
		{
			echo "this has been walalla";
			foreach($this->resource_priorities as $key => $value)
			{
				foreach($value as $resource)
				{
					echo $resource;
					echo "wow";
				}
			}
			
			if($custom != "")
			{
				foreach($custom as $custom_resource)
				{
					import($custom_resoruce);
				}
			}
		}
	}
}

global $resource_loader;
$resource_loader = new ResourceLoader();

	