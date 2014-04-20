
<?php
	
	session_start();
    header("Content-Type: text/html; charset=utf-8");
	if(isset($_SESSION["managername"]))
	{
		if($_SESSION["managername"]=="")
		{
			echo "<script language='javascript'>alert('您没有登陆，不能进行操作，请登陆！');window.location.href='sign-in.php';</script>";
			exit();
		}	
	}
	else
	{
		echo "<script language='javascript'>alert('您没有登陆，不能进行操作，请登陆！');window.location.href='sign-in.php';</script>";
		exit();
	}
	
?>