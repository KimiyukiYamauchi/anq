<?php
require_once("./function.php");

init();

if(isset($_POST["confirm"])){
	// エラーチェックとエラーメッセージ出力
	$_SESSION["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
	$_SESSION["sex"] = isset($_POST["sex"]) ? $_POST["sex"] : "";
	$_SESSION["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
	$_SESSION["animal"] = isset($_POST["animal"]) ? $_POST["animal"] : "";
	$_SESSION["comment"] = isset($_POST["comment"]) ? $_POST["comment"] : "";

	$error_list = error_check($_SESSION);

	if(!$error_list){
		// エラーがなければ、確認画面へ遷移
		$url = "http://" . $_SERVER["HTTP_HOST"] 
			.dirname($_SERVER["SCRIPT_NAME"]) . "/confirm.php";
		header("Location: " . $url);
		exit;
	}
}

$smarty = new MySmarty();

$smarty->assign("sex_value", getSexList());
$smarty->assign("age_value", getAgeList());
$smarty->assign("animal_value", getAnimalList());
$smarty->assign("error_list", $error_list);

$smarty->display("input.tpl");
