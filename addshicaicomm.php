<?php
	 session_start();
	 include("conn/conn.php");
?>
<html>
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta charset="UTF-8" />
<?php
	 if(trim($_POST["name"])!="")
	 {
	 	$username=trim($_POST["name"]);
	 }
	 elseif(isset($_SESSION["username"])!=false)
	 {
	 	$username=$_SESSION["username"];
	 }
	 else
	 {
	 	$username="***";
	 }
	 
     $email=trim($_POST["email"]);
     $content=$_POST["msg"];
     $date=date("Y-m-j H:i:s",time());
     //测试用例
     // if(isset($_SESSION["factoryid"])==true)
     // {
     // 	echo $_SESSION["factoryid"];
     // }

     //  if(isset($_SESSION["shicaiid"])==true)
     // {
     // 	echo $_SESSION["shicaiid"];
     // }

     
     $sql=mysql_query("Insert into tb_shicaicomm(shicaiid,username,content,email,commdate,factoryid) values('".$_SESSION["shicaiid"]."','".$username."','".$content."','".$email."','".$date."','".$_SESSION["factoryid"]."')",$conn);
     // header("Location:fooddetails.php");
     echo "<script>alert('评论成功！您辛苦了~~');history.back();</script>";

?>