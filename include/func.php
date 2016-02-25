<?php 
	function go($url){
		header("location:".$url);
		exit;
	}
	function printr($status,$msg){
		exit(json_encode(array("status"=>$status,"msg"=>$msg)));
	}
?>