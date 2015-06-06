<?php 

require_once '../DB.php';

header('Content-type: application/x-javascript');

$user = json_decode($_GET["data"],true);

$cond = array();
$cond["account"] = $user["account"];

$record = DB::getInstance()->find(DB_NAME,TB_USER,"*",$cond);
if(count($record) && $record[0]["id"] != (int)$user["id"]){
	echo back_data(-1);
	return;
}

$cond = array();
$cond["id"] = $user["id"];

$change = array();
$change["type"] = $user["type"];
$change["account"] = $user["account"];
$change["pass"] = $user["pass"];
$change["name"] = $user["name"];

$ret = DB::getInstance()->update(DB_NAME,TB_USER,$change,$cond,true);

$data = array();
$data["ret"] = $ret;

$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";