<?php

   include("check_is_login.php");

   include("conn/conn.php");
   if($_POST["pwd"]!="")
   { 
   		$username=$_POST["name"];
   		$userpwd=md5($_POST["pwd"]);
   	    $sql=mysql_query("update tb_userinfo set userpwd='".$userpwd."' where username='".$username."'",$conn);
   	    if($sql==true)
   	    {
   	    	echo "<script language='javascript'>alert('密码修改成功！');history.back();</script>";
   	    }
   }
?>