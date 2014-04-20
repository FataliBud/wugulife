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
     if(isset($_POST["foodid"]))
     {
     	 $foodid=trim($_POST["foodid"]);
     	 $_SESSION["foodid"]=$foodid;
     }
	
     $email=trim($_POST["email"]);
     $content=$_POST["msg"];
     $date=date("Y-m-j H:i:s",time());

     $sql=mysql_query("Insert into tb_foodcomm(foodid,content,username,email,commdate) values('". $_SESSION["foodid"]."','".$content."','".$username."','".$email."','".$date."')",$conn);
     // header("Location:fooddetails.php");
     // if($sql=true)
     // {
      	echo "<script>alert('发表成功！！！');history.back();</script>";
     // }
     // else
     // {
     //    echo "<script>alert('评论失败！');history.back();</script>";
    // }

?>