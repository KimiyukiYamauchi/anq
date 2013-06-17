<?php

require_once("./function.php");

if(error_check($_SESSION)){
	$url = "http://" . $_SERVER["HTTP_HOST"] 
		. dirname($_SERVER["SCRIPT_NAME"]) . "/input.php";
	header("Location: " . $url);
	exit;
}
