<?php

	include("../conn/conn.php");
  	$response=array();
  	if(isset($_POST['email'])&&isset($_POST['password']))
  	{
  		$email=trim($_POST['email']);
  		$password=md5(trim($_POST["password"]));

  		$sql=mysql_query("select * from tb_userinfo where email='$email'");
  		$res=mysql_fetch_array($sql);
  		if($res)
  		{
  			if(strcmp($password,$res['userpwd'])==0)
  			{
  				$response['success']='1';
                $response["username"]=$res["username"];
  				$response['message']='登录成功！';
  				echo json_encode($response); 
  			}
  			else
  			{
  				$response['success']='0';
                 $response["username"]="";
  				$response['message']='密码不正确';
  				echo json_encode($response); 
  			}
  		}
  		else
  		{
  			$response['success']='0';
             $response["username"]="";
  			$response['message']='E-mail不存在！';
  			echo json_encode($response); 
  		}
  	}
    else
    {
        $response['success'] = '0'; 
         $response["username"]="";
  		$response['message'] = '网络异常，请稍后再试！'; 
  		echo json_encode($response); 
    }
?>