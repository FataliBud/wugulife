<?php
	session_start();
	include("conn/conn.php");
    echo "<meta charset='utf-8'/>";
	$username=trim($_POST["username"]);
	$password=md5(trim($_POST["password"]));

	$sql=mysql_query("select `username`,`userpwd` from `tb_userinfo` where `username`='$username'",$conn);	
	$result=mysql_fetch_array($sql);
	if($result==false)
	{
		echo "<script>alert('用户名不存在！');history.back();</script>";
		exit();
	}
	else
	{
		if(strcmp($result["userpwd"],$password)!=0)
		{
			echo "<script>alert('密码不正确！'');history.go(-1);</script>";
			exit();
		}
		else
		{
			echo "<script>alert('登录成功！');history.back();</script>";
			// echo basename(__FILE__);
			// $current=$_SERVER["REQUEST_URI"];
			// $filename=explode("/", $current);
			// $path=$filename[count($filename)-1];
			// echo $path;
			$_SESSION["username"]=$username;
		}
	}
?>