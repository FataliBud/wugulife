<?php
	include("../conn/conn.php");
	$response= array();

	if (isset($_POST['email'])&&isset($_POST['suggestion'])) 
	{
		$email=trim($_POST['email']);
		$content=$_POST['suggestion'];
		if($email!="")
		{
			$sql=mysql_query("select * from tb_userinfo where email='$email'",$conn);
			$res=mysql_fetch_array($sql);
			if($res!=false)
			{
				$username=$res["username"];
			}
			else
			{
				$username="android".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9);
				//$email="wugu***@***.life";
			}
		}
		else
		{
			$username="android".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9);
			$email="wugu***@***.life";
		}
		$subject="android用户".$username."留言";
		$date=date("Y-m-j H:i:s",time());
		$sql=mysql_query("Insert into tb_suggestion(username,email,subject,content,passtime) values('".$username."','".$email."','".$subject."','".$content."','".$date."')",$conn);
		 if($sql)
		 {
		 	$response['success'] = '1'; 
        	$response['message'] = '感谢您给我们提供的建议！'; 
        	// // echoing JSON response 
       		echo json_encode($response);
		 }
		 else
		 {
		 	$response['success'] = '0'; 
        	$response['message'] = '服务器异常，请稍后再试！'; 
        	// // echoing JSON response 
       		echo json_encode($response);
		 }
	}
	else
	{
		 $response['success'] = '0'; 
  		 $response['message'] = '网络异常，请稍后再试！';  
   		//echoing JSON response 
  		 //$response = array('message' =>'success');
		 echo  json_encode($response); 
	}
?>
