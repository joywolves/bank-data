<?php

require_once '../DB.php';

header('Content-type: application/x-javascript');

function get_all(){
	$db = DB::getInstance();
	$ret = $db->find(DB_NAME,TB_USER,"*");
	return $ret;
}

$users = get_all();

$json = json_encode($users);
$back = $_GET["callback"];
echo "$back($json)";