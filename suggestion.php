<?php
	 session_start();
	 include("conn/conn.php");
	  echo "<meta charset='utf-8'/>";
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
	 $subject=trim($_POST["subject"]);
     $content=$_POST["msg"];
     $date=date("Y-m-j H:i:s",time());

     $sql=mysql_query("Insert into tb_suggestion(username,email,subject,content,passtime) values('".$username."','".$email."','".$subject."','".$content."','".$date."')",$conn);
     // header("Location:fooddetails.php");
      if($sql==true)
      {
      	echo "<script>alert('发表成功！！！');history.back();</script>";
      }
      else
      {
           echo "<script>alert('评论失败！');history.back();</script>";
    }

?>