<?php

if( $_SERVER['HTTP_HOST'] == "localhost")
{
  set_include_path("C:/xampp/htdocs/application/");
}
else 
{
  set_include_path("www.somewebsite/somepath/");
}

class Core 
{
	public function import($resource)
	{

		$check_directories = array("library", "template");
		for($i = 0; $i <= count($check_directories) - 1; $i++)
		{
			if(file_exists($check_directories[$i] . "/" . $resource . ".php"))
			{
				include ($check_directories[$i] . "/" . $resource . ".php");
			}
			
			else
			{
				
			}	
		}
		
	}
	
	/* this whole thing kinda doesn't make sense
	public function baseUrl($type, $resource)
	{
		$base_url = "";
		$server_url = "/".$_SERVER['HTTP_HOST'];
		$cwd = str_replace("\\","/",getcwd());
		$error = false;
		
		
		switch($type)
		{
			
			case 'css':
			{
				$base_url = $server_url;
				$base_url .= "/css/";
			} break;
			
			case 'img':
			{
				$base_url = $server_url;
				$base_url .= "/img/";
			} break;
			
			case 'js':
			{
				$base_url = $cwd;
				$base_url .= "/js/";
			} break;
			
			case 'resource':
			{
				$base_url = $server_url;
				$base_url .= "/application/";
			} break;
			
			case 'root_script':
			{
				$base_url = $cwd;
				$base_url .= "/";
			} break;
			
			
			case 'script':
			{
				$base_url = $cwd;
			}
			
			default:
			{ 
				$base_url = "[_NO_BASE_URL_TYPE_MATHCHING_]";
				$error = true;
			} break;
		}
		
		if($error)
			return $base_url;
		else
			return $base_url . $resource;
	}*/
}

$core = new Core();
