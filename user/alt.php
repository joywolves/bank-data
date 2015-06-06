<?php 

require_once '../DB.php';

header('Content-type: application/x-javascript');

function handle_data($data){
	unset($data["id"]);
	unset($data["type"]);
	return $data;
}


if(!isset($_GET["id"])){
	die("not record id");
}

$cond = array();
$cond["id"] = $_GET["id"];

if(!isset($_GET["type"])){
	die("not type to handle");
}

$ret = null;
$type = $_GET["type"];
switch ($type) {
	case 'add':
	case 'alt':
		$change = handle_data($_GET);
		$ret = DB::getInstance()->update(DB_NAME,TB_USER,$change,$cond,true);
		break;
	case 'del':
		$ret = DB::getInstance()->remove(DB_NAME,TB_USER,$cond)
		break;
	default:
		$ret = -1;
		break;
}

$data = [];
$data["ret"] = $ret;
$data["type"] = $type;

$json = json_encode($data);
$back = $_GET["callback"];
echo "$back($json)";