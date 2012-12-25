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
include_once "library/template.php";

//$resource_loader->load("view_priority");



$template->setComponents(array("head", "header", "navigation", "content", "sidebar", "footer"));
$template->setContent("content");
$template->generate();

$view->get();