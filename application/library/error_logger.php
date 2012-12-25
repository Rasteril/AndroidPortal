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

class ErrorLogger
{
	public $log_file = "C:/xampp/htdocs/application/error_log.txt";
	public function log($message)
	{
		$script_name = $_SERVER["PHP_SELF"];
		$date = date('d/m/Y h:i:s a', time());
		$log_message = "ERROR!! " . PHP_EOL . " Message: " . $message . PHP_EOL . " in file: " . $script_name . PHP_EOL . " Date & Time: " . $date . PHP_EOL . PHP_EOL;	
		
		
		
		file_put_contents($this->log_file, $log_message, FILE_APPEND);
	}
}

global $error_logger;
$error_logger = new ErrorLogger();

