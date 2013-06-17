<?php

//define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] 
//	."/php/phppro/smarty.yo"); 

require_once("../libs/Smarty.class.php");

class MySmarty extends Smarty{

	function MySmarty(){

		//$this->template_dir = ROOT_DIR . "/templates";
		//$this->compile_dir = ROOT_DIR . "/templates_c";
		$this->template_dir = "../templates";
		$this->compile_dir = "../templates_c";
//echo $this->template_dir."<br />\n";
//echo $this->compile_dir."<br />\n";

		$this->left_delimiter="{{";
		$this->right_delimiter="}}";

		$this->default_modifiers = array('escape');

		$this->Smarty();
	}
}
