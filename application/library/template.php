<?php

if( $_SERVER['HTTP_HOST'] == "localhost")
{
  set_include_path("C:/xampp/htdocs/application/");
}
else 
{
  set_include_path("www.somewebsite/somepath/");
}

include_once "library/core.php";



class Template extends Core
{
	private $components = array();
	private $content = "";
	private $content_index = 0;
	
	public function setComponents($components = array())
	{
		$this->components = $components;
	}
	
	public function setContent($content = array())
	{
		$this->content = $content;
	}
	
	public function generate()
	{
		$component_index = 0;
		foreach($this->components as $component)
		{
			if($component_index == 0)
			{
				$this->content_index = 0;
			}
			
			$component_index++;
			
			if($component == $this->content)
			{
				$this->content_index = $component_index;
			}
			
			else
			{
				echo "Importing... " . $component;
				//import($component);
			}
			
		}
	}
}

$template = new Template();