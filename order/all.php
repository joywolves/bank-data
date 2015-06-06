<?php

require_once '../DB.php';

header('Content-type: application/x-javascript');

function get_all(){
	$db = DB::getInstance();
	$ret = $db->find(DB_NAME,TB_ORDER,"*");
	return $ret;
}

$orders = get_all();

$json = json_encode($orders);
$back = $_GET["callback"];
echo "$back($json)";