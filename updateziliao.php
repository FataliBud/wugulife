<?php
    session_start();
	include("conn/conn.php");
    echo "<meta charset='utf-8'/>";

	$username=trim($_POST["username"]);
//   $email=trim($_POST["email"]);
	$password=md5(trim($_POST["password"]));
	$filename=trim($_POST["currentpage"]);

	$sql=mysql_query("update tb_userinfo set username='".$username."',userpwd='".$password."' where username='".$_SESSION["username"]."'",$conn);	
	if($sql==null)
	{
		echo "<script>alert('修改失败！');history.back();</script>";
		exit();
	}
	else
	{	
            $_SESSION["username"]=$username;
			echo "<script>alert('修改成功！');history.go(-1);</script>";
			// echo basename(__FILE__);
			// $current=$_SERVER["REQUEST_URI"];
			// $filename=explode("/", $current);
			// $path=$filename[count($filename)-1];
			// echo $path;
			
            // echo $filename;
            //header("Location:$filename");
	}
?>