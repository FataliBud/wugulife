<?php
	session_start();
	include("conn/conn.php");
echo "<meta charset='utf-8'/>";
	$email=trim($_POST["email"]);
	$password=md5(trim($_POST["password"]));
	$filename=trim($_POST["currentpage"]);

	$sql=mysql_query("select `username`,`userpwd` from `tb_userinfo` where `email`='$email'",$conn);	
	$result=mysql_fetch_array($sql);
	if($result==false)
	{
		echo "<script>alert('该邮箱未注册！');history.back();</script>";
		exit();
	}
	else
	{
		if($result["userpwd"]!=$password)
		{
			echo "<script>alert('密码不正确！');history.go(-1);</script>";
			exit();
		}
		else
		{
            $_SESSION["username"]=$result["username"];
			echo "<script>alert('登录成功！');history.go(-1);</script>";
			// echo basename(__FILE__);
			// $current=$_SERVER["REQUEST_URI"];
			// $filename=explode("/", $current);
			// $path=$filename[count($filename)-1];
			// echo $path;
			
            // echo $filename;
            //header("Location:$filename");
		}
	}
?>