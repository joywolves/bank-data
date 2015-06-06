<?php 

require_once '../DB.php';

header('Content-type: application/x-javascript');


$cond = array();
$cond["id"] = $_GET["id"];

$ret = DB::getInstance()->remove(DB_NAME,TB_USER,$cond);

$data = array();
$data["ret"] = $ret;

$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";