<?php
	$conn=mysql_connect("localhost","root","");
	mysql_select_db("app_wugulife",$conn) or die("".mysql_errno());
	mysql_query("set character set utf8");
	mysql_query("set names utf8");
	$timezone="Asia/Shanghai";
//	header("Content-Type: text/html; charset=utf-8");
	date_default_timezone_set($timezone); 
?>