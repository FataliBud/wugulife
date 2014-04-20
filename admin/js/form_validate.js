 <!--添加用户验证-->
 //验证码
var code ; //在全局 定义验证码
function createCode()
{ 
  code = new Array();
  var codeLength = 4;//验证码的长度
  var checkCode = document.form.checkCode;
  checkCode.value = "";
  var selectChar = new Array(2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');
 
  for(var i=0;i<codeLength;i++) 
  {   
     var charIndex = Math.floor(Math.random()*32);   
     code +=selectChar[charIndex];
  }
  if(code.length != codeLength)
  {   
     createCode();
  }
  checkCode.value = code;
}

function  isEnglish(name)  //英文值检测
{  
	if(name.length  ==  0)
	return  false;
	for(i  =  0;  i  <  name.length;  i++)  {  
	if(name.charCodeAt(i)  >  128)
	return  false;
	}
	return  true;
}
function isMail(name)  //  E-mail值检测
{  
	if(!isEnglish(name))
    	return false;
	i = name.indexOf("@");
	j = name.lastIndexOf("@");
	if(i==-1)
    	return false;
	if(i!=j)
    	return false;
	if(i == name.length)
    	return false;
	m = name.indexOf(".");
	n = name.lastIndexOf(".");
	if(m==-1)
    	return false;
	if(m!=n)
    	return false;
	if(m == name.length)
    	return false;
	k=name.length;
	if(i<=1)
	    return false;
	else
	{
	  if((k-i)<=3)
	  {return false;
	  }	
	  else
	  {if((k-m)<=0)
	    {return false;}
	  }
	}
	return true;
}

function validate_form(form)     
{ 
 //验证用户名
	if(form.username.value=="")
	{
		alert("用户名不能为空！");
		return false;
	}
	
  //邮箱验证
   if(form.email.value=="")
   {
	   alert("邮箱不能为空！");
	   return false;
   }
   else
   {
	  if(!isMail(form.email.value))  
	  {  
        alert("您的电子邮件不合法！");
        return  false;
	  }
   }
	//密码
	if(form.userpwd.value=="")
	{
		alert("请输入密码！");
		return false;
	}
	else 
	{
	     if(form.userpwd.value.length<6)	
		 {
		    alert("密码不能小于6位！");
	     	return false;	 
		 }
	}
	//重置密码
	if(form.confirmuserpwd.value=="")
	{
		alert("请再次输入密码！");
		return false;
	}
	else
	{
		 if(form.userpwd.value!=form.confirmuserpwd.value)	
		 {
		    alert("两次密码输入不一致，请重新输入！");
	     	return false;	 
		 }
	}

	//验证码
   var inputCode = form.input.value.toUpperCase();
	if(inputCode.length <=0) 
	{   alert("请输入验证码！");   
	    return false;
	}
	else if(inputCode != code )
	{   alert("验证码输入错误！");   
	    createCode();  
		return false;
	}
	return true;
}   

//注册
function validate_reg(form)
{
	//验证用户名
	if(form.username.value=="")
	{
		alert("用户名不能为空！");
		return false;
	}
	
  //邮箱验证
   if(form.email.value=="")
   {
	   alert("邮箱不能为空！");
	   return false;
   }
   else
   {
	  if(!isMail(form.email.value))  
	  {  
        alert("您的电子邮件不合法！");
        return  false;
	  }
   }
	//密码
	if(form.userpwd.value=="")
	{
		alert("请输入密码！");
		return false;
	}
	else 
	{
	     if(form.userpwd.value.length<6)	
		 {
		    alert("密码不能小于6位！");
	     	return false;	 
		 }
	}
	//重置密码
	if(form.confirmuserpwd.value=="")
	{
		alert("请再次输入密码！");
		return false;
	}
	else
	{
		 if(form.userpwd.value!=form.confirmuserpwd.value)	
		 {
		    alert("两次密码输入不一致，请重新输入！");
	     	return false;	 
		 }
	}
	//qq
	if(form.qq.value=="")
	{
		alert("请输入qq号！");
		return false;
	}
	//tel
	if(form.tel.value=="")
	{
		alert("请输入电话号码！");
		return false;
	}
	//address
	if(form.address.value=="")
	{
		alert("请输入住址！");
		return false;
	}
}