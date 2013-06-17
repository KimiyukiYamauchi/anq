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
	$db = db_connect();

	$name_val = $_SESSION["name"];
	$sex_val = $_SESSION["sex"];
	$age_val = $_SESSION["age"];
	$animal_val = $_SESSION["animal"];
	$comment_val = $_SESSION["comment"];
	$del_flag = '0';
	$create_datetime = date("Y-m-d H:i:s");

	$_SESSION = array();

	$sth = $db->prepare(
		'INSERT INTO anq_t(name, sex, age, animal, 
		comment, del_flag, create_datetime) VALUES(?,?,?,?,?,?,?)');
	if(MDB2::isError($sth)){
		die($sth->getMessage());	
		exit;
	}

	$res = $sth->execute(array($name_val, $sex_val, $age_val, 
		$animal_val, $comment_val, $del_flag, $create_datetime));
	if(MDB2::isError($res)){
		die($res->getMessage());	
		print "エラーが発生しました。再度、アンケートフォームよりご登録ください<br />";
		exit;
	}

	$smarty = new MySmarty();
	$smarty->display("complete.tpl");
	exit;
}

$smarty = new MySmarty();

$smarty->assign("sex_value", getSexList());
$smarty->assign("age_value", getAgeList());
$smarty->assign("animal_value", getAnimalList());

$smarty->display("confirm.tpl");
