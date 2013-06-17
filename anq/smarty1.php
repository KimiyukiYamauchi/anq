<?php
require_once("MySmarty.class.php");

$scalar = "Hello Smarty";
$sex["m"] = "men";
$sex["f"] = "woman";

$smarty = new MySmarty();

$smarty->assign("scal", $scalar);
$smarty->assign("se", $sex);

$smarty->display("smarty1.tpl");
