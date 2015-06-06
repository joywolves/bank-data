<?php


function back_data($data){
	if(is_int($data)){
		$data = array("ret"=>$data);
	}
	$json = json_encode($data);
	$back = $_GET["callback"];
	return "$back($json)";
}
