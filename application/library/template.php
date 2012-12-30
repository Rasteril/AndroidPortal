<?php

class Template extends Core
{
	private $components = array(); 
	private $content = "";
	
	public function setComponents($components = array())
	{
		$this->components = $components;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
	}	
	
	private function includeComponent($component)
	{
		include $this->appRoot() . "template/" . $component . ".template.php";
	}
	
	private function includeContent($content)
	{
		if(file_exists($this->appRoot() . "view/" . $content . ".php"))
		{
			include_once "view/" . $content . ".php";
		}
		else
		{
			include "errors/404.php";
		}
	}
	
	public function generate()
	{
		print_r($this->components);
		foreach($this->components as $component)
		{
			
			if($component == "_content")
			{
				$this->includeContent($this->content);
			}
			
			else
			{
				$this->includeComponent($component);
				echo "the component has been included <br />";
			}
		}
	}
}