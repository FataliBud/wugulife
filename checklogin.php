<?php
	// session_start();
if(isset($_SESSION["username"])==false) //|| $_SESSION["username"]=="")
	 {
    echo "<meta charset='utf-8'/>";
         echo "<script language='javascript'>alert('您未登录，请在首页登录！');history.back();</script>";
         exit();
	 }
	 
?>