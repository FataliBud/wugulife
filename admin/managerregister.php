<meta charset="utf-8"/>
<?php
	include("conn/conn.php");

	$username=trim($_POST["username"]);
	$qq=trim($_POST["qq"]);
	$userpwd=md5(trim($_POST["userpwd"]));
	$sex=trim($_POST["sex"]);
	$tel=trim($_POST["tel"]);
	$address=trim($_POST["address"]);
	$email=trim($_POST["email"]);

	$obj=new addUser($username,$qq,$userpwd,$email,$sex,$tel,$address);
	$obj->addUsers();

	class addUser
	{
		private $username;
		private $qq;
		private $sex;
		private $tel;
		private $address;
		private $userpwd;
		private $email;
		private $regtime;
		public function addUser($username,$qq,$userpwd,$email,$sex,$tel,$address)
		{
			$this->username=$username;
			$this->qq=$qq;
			$this->sex=$sex;
			$this->tel=$tel;
			$this->address=$address;
			$this->userpwd=$userpwd;
			$this->email=$email;
			$this->regtime=date("Y-m-j H:i:s",time());
		}

		function addUsers()
		{
			include("conn/conn.php");
			$sql=mysql_query("select * from tb_manager where `managername`='".$this->username."'",$conn);
			$res = mysql_fetch_array($sql);
			if($res==false)
			{
				$sql1=mysql_query("insert into `tb_manager`(`managername`,`managerqq`,`managerpwd`,`manageremail`,`managersex`,`managertel`,`manageraddr`,`managerregtime`) values('".$this->username."','".$this->qq."','".$this->userpwd."','".$this->email."','".$this->sex."','".$this->tel."','".$this->address."','".$this->regtime."')",$conn);
				//mysql_insert_id($sql1);
				echo "<script language='javascript'>alert('注册成功！');window.location.href='index.php';</script>";
			}
		}
	}
?>