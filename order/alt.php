<?php 

require_once '../DB.php';

header('Content-type: application/x-javascript');

if(!isset($_GET["id"])){
	die("not record id");
}

$cond = array();
$cond["id"] = $_GET["id"];
//1:agree 2:disagree
if(!isset($_GET["statue"])){
	die("not statue to set");
}

$change = array();
$change["statue"] = $_GET["statue"];

$db = DB::getInstance();

$db->update(DB_NAME,TB_ORDER,$change,$cond);

$data = $db->find(DB_NAME,TB_ORDER,"*",$cond);

if(!count($data)){
	$data = null;
}else{
	$data = $data[0];
}

$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";