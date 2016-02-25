<?php 
	ob_start();
	session_start();
	$aeskey = "xVZ37gxnFPdih6vKwfpjDg8hRB0E1xFiiUgiHp40kTVGZymSDAX2wiqvv9e574qyjXysnvg970SK7lbM8WKE5KPLJ8HbJxB2luYUgkNaIcRRnXOhD8yP0C8I";
	require_once("include/func.php");
	require_once("include/main.class.php");
	$Shop = new MainShop();
?>