<?php

class Database extends Core
{
	public function connect($database_username, $database_password, $database_host, $database_name)
	{
		mysql_connect($database_host, $database_username, $database_password);
		mysql_select_db($database_name);
		
	}
	
	public function query($query)
	{
		return mysql_query($query);
	}
	
	public function result($query)
	{
		return mysql_result($query,0);
	}
}

