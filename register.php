<meta charset="utf-8"/>
<?php
	include("conn/conn.php");

	$username=trim($_POST["username"]);
	$email=trim($_POST["email"]);
	$userpwd=md5(trim($_POST["password"]));

	$obj=new addUser($username,$userpwd,$email);
	$obj->addUsers();

	class addUser
	{
		private $username;
		private $userpwd;
		private $email;
		private $regtime;
		public function addUser($username,$userpwd,$email)
		{
			$this->username=$username;
			$this->userpwd=$userpwd;
			$this->email=$email;
			$this->regtime=date("Y-m-j H:i:s",time());
		}

		function addUsers()
		{
			include("conn/conn.php");
			$sql=mysql_query("select * from tb_userinfo where `username`='".$this->username."'",$conn);
			$res = mysql_fetch_array($sql);
			if($res==false)
			{
				$sql1=mysql_query("insert into `tb_userinfo`(`username`,`userpwd`,`email`,`regtime`) values('".$this->username."','".$this->userpwd."','".$this->email."','".$this->regtime."')",$conn);
				//mysql_insert_id($sql1);
				echo "<script language='javascript'>alert('注册成功！');history.go(-1);</script>";
			}
		}


	}
?>