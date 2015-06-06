<?php

require_once '../DB.php';

header('Content-type: application/x-javascript');

#获取帐号数据
function find_account_record($account){
	$db = DB::getInstance();
	$ret = $db->find(DB_NAME,TB_USER,"*",array("account"=>$account));
	if(sizeof($ret)){
		return $ret[0];
	}
	return NULL;
}


#检查参数
if(!isset($_GET["account"]) || !isset($_GET["pass"])){
	echo back_data(-1);
	return;
}

#查看数据
$account = find_account_record($_GET["account"]);
if($account == NULL){
	echo back_data(-2);
	return;
}
#检查密码
if($account["pass"] != ($_GET["pass"])){
	echo back_data(-3);
	return;
}

$account["ret"] = 1;
echo back_data($account);
