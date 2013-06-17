<?php
require_once("./function.php");

init();

if(isset($_POST["modify"])){
	$url = "http://" . $_SERVER["HTTP_HOST"] . 
		dirname($_SERVER["SCRIPT_NAME"]) ."/input.php";
	header("Location: " . $url);
	exit;
}

if(isset($_POST["register"])){
	exit;
}

$smarty = new MySmarty();

$smarty->assign("sex_value", getSexList());
$smarty->assign("age_value", getAgeList());
$smarty->assign("animal_value", getAnimalList());

$smarty->display("confirm.tpl");
