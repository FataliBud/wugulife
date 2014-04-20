<?php 

//array for JSON response  

//var_dump(json_decode($json));
//var_dump($_POST['json']);
//var_dump($_POST);  
$response = array(); 

include("../conn/conn.php"); 
// check for required fields 
if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])) 
{ 
   
     $name = trim($_POST['name']);
     $password =md5(trim($_POST['password']));
     $email= trim($_POST['email']);
     $regtime=date("Y-m-j H:i:s",time());
   
     $sql=mysql_query("select * from tb_userinfo where email='$email'",$conn);
    $res=mysql_fetch_array($sql);
    if($res!=false)
    {
    
    	
        $response['success'] = '0'; 

        $response['message'] = '您已注册，请直接登录！'; 
  
        // // echoing JSON response 


       echo json_encode($response);
    
    }
    else
    {
    	   
   		 $result = mysql_query("INSERT INTO tb_userinfo(username,userpwd,email,regtime) VALUES('$name','$password','$email','$regtime')"); 


  		// echo $result; 

            // check if row inserted or not   
         if ($result) 
        { 
    
    
            // successfully inserted into database 
    
            $response['success'] = '1'; 
    
            $response['message'] = '注册成功，请登录！'; 
      
            // // echoing JSON response 
    
    
           echo json_encode($response); 
    
         } 
          else 
         { 
    
    
    
            // // failed to insert row 
             $response['success'] = '0'; 
    
            $response['message'] = '抱歉，注册失败！'; 
    
              
            // // echoing JSON response 
            echo json_encode($response);
    
    
         } 
        
    
    }
 
   
  } 
    else 
  { 


    // required field is missing 

   $response['success'] = '0'; 

   $response['message'] = '网络异常，请稍后再试！'; 
     
   //echoing JSON response 
   
   //$response = array('message' =>'success');

    echo  json_encode($response); 
   //print_r(json_decode(json_encode($response),true));
     //$response1=array('view' =>$response, );
    // echo  json_encode($response1); 

    } 
?> 
