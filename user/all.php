<?php

require_once '../DB.php';

header('Content-type: application/x-javascript');


$data = null;
if(isset($_GET["id"])){
	$cond = array();
	$cond["id"] = $_GET["id"];
	$data= DB::getInstance()->find(DB_NAME,TB_USER,"*",$cond);
	if(!count($data)){
		$data = null;
	}else{
		$data = $data[0];
	}
}else{
	$data = DB::getInstance()->find(DB_NAME,TB_USER,"*");
}


$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";