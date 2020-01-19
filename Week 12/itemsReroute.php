<?php
include "../connectionInclude.php";
include "../Model/RESTAPI.php";

global $conn;

//Grab requested method from URL
$requestMethod = $_SERVER["REQUEST_METHOD"];

//Switch case to determine what method is being called
switch ($requestMethod) 
{
	case "GET":
		if(!empty($_GET["id"]))
		{
			$id = intval($_GET["id"]);
			getItems($id);
		}
		else
		{
			getItems(0);
		}
		break;

	case "POST":
		insertItem();
		break;
	
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
}
?>