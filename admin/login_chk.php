<?php
	session_start();
	//include("conn/conn.php");
    
	$managername=trim($_POST["managername"]);
	$managerpwd=md5(trim($_POST["managerpwd"]));
    
	$obj=new checkUser($managername,$managerpwd);
	$var=$obj->check();
	// if($var==true)
	// {
	// 	//$_SESSION["managername"]=$managername;    //这种方法也可以将变量保存到session中，主要看是否开启了session
		
	// }
 

	class checkUser{
		private $managername;
		private $managerpwd;

		public function checkUser($managername,$managerpwd)
		{
			$this->managername=$managername;
			$this->managerpwd=$managerpwd;
		}

		function check()
		{
			if($this->managername=="" or $this->managername==null)
			{
				echo "<script language='javascript'>alert('用户名不能为空！');window.location.href='login.php';</script>";
				exit();
			}
			else
			{   
				include("conn/conn.php");
				$sql=mysql_query("select * from tb_manager where managername='".$this->managername."'",$conn);
				$res=mysql_fetch_array($sql);
				if($res==false)
				{
					echo "<script language='javascript'>alert('您没有权限登陆！');window.location.href='index.php';</script>";
					exit();
				}
				elseif($this->managerpwd=="" or is_null($this->managerpwd)==true)
				{
					echo "<script language='javascript'>alert('密码不能为空！');</script>";
					exit();
				}
				else
				{
					if(strcmp($this->managerpwd,$res["managerpwd"])!=0)   //若果密码错误
					{
						echo "<script language='javascript'>alert('密码或用户名错误！');window.location.href='sign-in.php';</script>";
						exit();
					}
					else
					{
						$_SESSION["managername"]=$res["managername"];
						header("Location:index.php");
						return true;
					}
				}
			}
			return false;
		}
	}
?>