<?php

function init() {
	//MySmartyクラスの読み込み
//	require_once($_SERVER["DOCUMENT_ROOT"]. "/../libs/MySmarty.class.php");
	//require_once("./libs/Smarty.class.php");
	require_once("MySmarty.class.php");
	
	//セッションを開始する
	session_start();
	session_regenerate_id(true);

}

//性別のリスト（配列）を返す関数
function getSexList() {
	$sex_value = array(
		"1" => "男性",
		"2" => "女性"
	);
	return $sex_value;
}

//年代のリスト（配列）を返す関数
function getAgeList() {
	$age_value = array(
		"1" => "10代",
		"2" => "20代",
		"3" => "30代",
		"4" => "40代",
		"5" => "50代",
		"6" => "60代以上"
	);
	return $age_value;
}

//動物のリスト（配列）を返す関数
function getAnimalList() {
	$animal_value = array(
		"1" => "いぬ",
		"2" => "ねこ",
		"3" => "らいおん",
		"4" => "きりん",
		"5" => "とら",
		"6" => "うさぎ",
		"7" => "さる",
		"8" => "ぺんぎん",
		"9" => "うま",
		"10" => "ぞう"
	);
	return $animal_value;
}

function error_check($check_data){

	$error_list = array();

	if(!isset($check_data["name"]) || 
		trim($check_data["name"]) === ""){
		$error_list[] = "名前を入力してください";
	}elseif(mb_strlen($check_data["name"]) > 100){
		$error_list[] = "名前は100文字以内で入力してください。";
	}

	if(!isset($check_data["sex"]) || $check_data["sex"] == ""){
		$error_list[] = "性別を選択してください。";
	}elseif(!array_key_exists($check_data["sex"], getSexList())){
		$error_list[] = "正しい性別を選択してください。";
	}

	if(!isset($check_data["age"]) && $check_data["age"] !== ""){
		if(!array_key_exists($check_data["age"], getAgeList())){
			$error_list[] = "正しい年代を選択してください。";
		}
	}

	if(!isset($check_data["animal"]) ||
		 !is_array($check_data["animal"])){
		$error_list[] = "好きな動物は最低１つを選択してください。";
	}else{
		foreach($check_data["animal"] as $check_value){
			if(!array_key_exists($check_value, getAnimalList())){
				$error_list[] = "正しい動物を選択してください。";
				break;
			}
		}
	}

	if(!isset($check_data["comment"]) 
		|| $check_data["comment"] === ""){
		$error_list[] = "コメントを入力してください。";
	}elseif(trim($check_data["comment"]) === ""){
		$error_list[] = "コメントを入力してください。";
	}elseif(mb_strlen($check_data["comment"] > 1000)){
		$error_list = "コメントは1000文字以内で入力してください。";
	}

	return $error_list;
}

function db_connect(){
	require_once("MDB2.php");

	$dns = "mysql://dbuser:pass@localhost/phplesson?charset=utf8";

	$db = MDB2::connect($dns);

	if(PEAR::isError($db)){
		print "MDB2 Connect Error";
		die($db->getMessage());
	}
	
	return $db;
}

?>
