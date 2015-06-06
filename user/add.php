<?php 

require_once '../DB.php';

header('Content-type: application/x-javascript');

$user = json_decode($_GET["data"],true);

$cond = array();
$cond["account"] = $user["account"];

$record = DB::getInstance()->find(DB_NAME,TB_USER,"*",$cond);
if(count($record)){
	echo back_data(-1);
	return;
}

$ret = DB::getInstance()->insert(DB_NAME,TB_USER,$user);

$data = array();
$data["ret"] = $ret;

$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";