<?php
require_once("./libs/Smarty.class.php");

$scalar = "Hello Smarty!";
$sex["m"] = "men";
$sex["f"] = "woman";

$smarty = new Smarty();

$smarty->assign("scal", $scalar);
$smarty->assign("se", $sex);

$smarty->display("smarty1.tpl");
