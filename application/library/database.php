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

class Database
{
	public function connect($database_username, $database_password, $database_host, $database_name)
	{
		mysql_connect($database_host, $database_username, $database_password);
		mysql_select_db($database_name);
	}
	
	public function query($query)
	{
		mysql_query($query);
	}
	
	public function result($query)
	{
		mysql_result($query,0);
	}
}

$database = new Database();
$database->connect
(
	"root",
	"", // password field is empty
	"localhost",
	"android_portal"
);
