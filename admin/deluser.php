<?php

   include("check_is_login.php");

   include("conn/conn.php");
   if(isset($_GET["id"]))
   { 
   		$username=$_GET["id"];
		echo $username;
   	    $sql=mysql_query("delete from tb_userinfo where username='".$username."'",$conn);
   	    if($sql==true)
   	    {
   	    	echo "<script language='javascript'>alert('删除成功！');history.back();</script>";
   	    }
   }
?>