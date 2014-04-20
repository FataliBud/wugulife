<?php
    session_start();
    include("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta name="baidu-tc-verification" content="06517a80e929ae7275e017a3113c8d67" />
<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>五谷人生</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="styles/skitter.styles.css" media="all" rel="stylesheet" />
<link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
<!--[if lt IE 9]>
<link href="styles/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script><!--不要换顺序-->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="js/jquery.skitter.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script> 
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/supersubs.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/form_validate.js"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	//Menu
	jQuery("ul.sf-menu").supersubs({ 
	minWidth		: 12,		// requires em unit.
	maxWidth		: 27,		// requires em unit.
	extraWidth		: 3	// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
						   // due to slight rounding differences and font-family 
	}).superfish();  // call supersubs first, then superfish, so that subs are 
					 // not display:none when measuring. Call before initialising 
					 // containing tabs for same reason.
					 
	jQuery(document).ready(function() {
		jQuery(".box_skitter_large").skitter({
			animation: "random",
			interval: 3000,
			numbers: false, 
			numbers_align: "right", 
 			hideTools: true,
			controls: false,
			focus: false,
			focus_position: true,
			width_label:'340px', 
			enable_navigation_keys: true,   
 			progressbar: false
		});
	});				  
					 
});

 <!--登陆验证-->
    	function login(form){
        	if(form.email.value == ""){
        		alert("邮箱不能为空！");
        		return false;
        	}
        	if(form.password.value == ""){
        		alert("密码不能为空！");
        		return false;
        	}
    	}
		

</script>

</head>

<body>

<!--登陆界面-->
<div class="modal hide fade" id="login"><!---首先要用带modal类的div把整个对话框包围起来，并

为其定义id"login"，用hide将对话框隐藏，-->
    <div class="modal-header"><!--然后用带类"modal-header"的div将页头包围住--> 
      <a href="#" class="close" data-dismiss="modal">

    ×</a><!--正常情况下隐藏起来，用来关闭对话框-->
      <h4>用户登录</h4>
    </div>
    <div class="modal-body"><!--用带类modal-body的div将form主体包围起来-->
      <form class="form-horizontal" action="login.php" method="post" onsubmit="return login(this);">
        <div class="control-group">
          <label class="control-label">邮箱</label>
          <div class="controls">
            <input type="text" name="email">
            <p class="help-block">请输入您的邮箱</p>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">密码</label>
          <div class="controls">
            <input type="password" name="password">
            <p class="help-block">请输入您的密码</p>
          </div>
        </div>
         <input type="hidden"  name="currentpage" value="<?php echo basename(__FILE__);?>"/>
       <div class="modal-footer"><!--用带类modal-footer的div将页尾包围起来-->
           <button type="submit" class="btn btn-primary" >登录</button>
       </div>
     </form>
  </div>
</div>
    
  
  <!--注册-->
  <div class="modal hide fade" id="rigister">
  <div class="modal-header"><!--然后用带类"modal-header"的div将页头包围住--> 
      <a href="#" class="close" data-dismiss="modal">

    ×</a><h4>用户注册</h4> <!--正常情况下隐藏起来，用来关闭对话框-->
     </div>
     <div class="modal-body"><!--用带类modal-body的div将form主体包围起来-->
   <form class="form-horizontal" action="register.php" onsubmit="return validate_form(this);" method="post" name="form">

      <div class="control-group">
        <label class="control-label" for="username">用户名</label>
        <div class="controls">
          <input name="username" type="text">
          <p class="help-block">请输入您想要注册的用户名</p>
        </div>
      </div>
       <div class="control-group">
        <label class="control-label" for="email">邮箱</label>
        <div class="controls">
          <input name="email" type="text">
          <p class="help-block">请输入注册邮箱(必填)</p>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">密码</label>
        <div class="controls">
          <input name="password" type="password">
          <p class="help-block">请输入设置的密码6至12位</p>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="confirmpass">密码确认</label>
        <div class="controls">
          <input name="confirmpass" type="password">
          <p class="help-block">请再次输入设置的密码</p>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">验证码</label>
        <div class="controls">
          <input type="text" name="input" style="width:80px"/>&nbsp;<input type="button" name="checkCode" class="code" style="width:60px" value="点击获取" onClick="createCode()" /> <a href="#" onClick="createCode()">看不清楚</a>
          <p class="help-block">请输入验证码</p>
        </div>
      </div>
       <div class="control-group">
        <div class="controls">
          <input name="submit" type="submit"  class="btn btn-primary" value="注册"/>
        </div>
      </div>
   </form>  
  </div>
   <div class="modal-footer"><!--用带类modal-footer的div将页尾包围起来-->
 </div>
</div>
    
<!--修改资料界面-->
 <?php 
	if(isset($_SESSION["username"]))
    {
        $sql=mysql_query("select * from tb_userinfo where username='".$_SESSION["username"]."'",$conn);
	    $res=mysql_fetch_array($sql);
        if($res!=false)
	    {
     ?>
        <div class="modal hide fade" id="update">
           <div class="modal-header"><!--然后用带类"modal-header"的div将页头包围住--> 
              <a href="#" class="close" data-dismiss="modal">
        
            ×</a><!--正常情况下隐藏起来，用来关闭对话框-->
              <h4>资料修改</h4>
            </div>
            <div class="modal-body"><!--用带类modal-body的div将form主体包围起来-->
              <form class="form-horizontal" action="updateziliao.php" method="post" onsubmit="return validateupdate(this)">
                <div class="control-group">
                    <label class="control-label" for="username">用户名</label>
                    <div class="controls">
                        <input name="username" type="text" value="<?php echo $_SESSION["username"]; ?>"/>
                    </div>
                </div>  
                <div class="control-group">
                  <label class="control-label">邮箱</label>
                  <div class="controls">
                      <input type="text" name="email" readonly disabled value="<?php echo $res["email"]; ?>"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">密码</label>
                  <div class="controls">
                      <input type="password" name="password" value="<?php echo $res["userpwd"]; ?>"/>
                  </div>
                </div>
                 <input type="hidden"  name="currentpage" value="<?php echo basename(__FILE__);?>"/>
               <div class="modal-footer"><!--用带类modal-footer的div将页尾包围起来-->
                   <button type="submit" class="btn btn-primary" >确定</button>
               </div>
             </form>
          </div>
        </div>
    
    <?php
        }//end if
    }
 ?>

    
<!--个人中心 -->
    <div id="nav1">
        <ul id="topnav1" class="sf-menu">
            <?php 
				if(isset($_SESSION["username"]))
                {
                    echo "<li>欢迎您，<font color='red'>".$_SESSION["username"]."</font></li>"; 
                }else{
    				echo "<li><a id='links' href='#login' data-toggle='modal'>登录</a></li>";
                }
            ?>
            
          
             <li><a id="linksR" href="#rigister" data-toggle="modal">注册</a></li>
               <?php 
				if(isset($_SESSION["username"]))
                {?>
             <li><a href="#">个人中心</a>      
                <ul>
                    <li><a id="linksR" href="#update" data-toggle="modal">修改个人资料</a></li>
                    <li><a href="logout.php">退出</a></li>
                </ul>
            </li>
                <?php } ?>
        </ul>
    </div>      
                                  
                    
<div id="outer-container">
	<div id="container">
    	<div id="top">
        	<div id="logo"><a href="index.php"><img src="images/logo.png" alt="五谷人生"  

/></a></div><!-- end #logo -->


            <div id="nav">

                <ul id="topnav" class="sf-menu">
                    <li><a href="index.php"  class="current">首页</a></li>
                    <li><a href="#">自我测评</a>
                        <ul>
                            <li><a href="tizhicheck.php">体质自检</a></li>
                            <li><a href="symptomscheck.php">症状自检</a></li>
                         
                        </ul>
                    </li>
                    
                 
                    <li><a href="#">膳食推荐</a>
                        <ul>
                            <li><a href="acknowledge.php">食疗知识</a></li>
                            <li><a href="foodshare.php">膳食共享</a></li>                            
                        </ul>
                    </li>
                    <li><a href="foodmaterial.php">食材购买</a></li>
                    <li><a href="about.php">关于我们</a></li>
                </ul><!-- #topnav -->
            </div><!-- #nav -->	
        </div><!-- end #top -->
        
       <div id="header">
        	<div id="slider-container">
            	
                <div class="box_skitter box_skitter_large">
                    <ul><!--根据点击量展示优质膳食-->
        				<!--2014-4-2 修改-->
                        <?php
							//include("contentshow.php");  //因没有符合页面大小的膳食图片
						
						?>
                       <!-- <li>
<a href="fooddetails.php?foodid=<?php //echo $showid[0];?>"><img src="<?php //echo $showimage[0];?>" alt="" width="1020" height="451" /></a>
                            <div class="label_text">
<h3 class="colortext uppercase"><?php //echo $showname[0];?></h3>
<span><?php //echo $showdesc[0];?></span>
                            </div>
                        </li>-->
                        <li>
                            <a href=""><img src="images/content/slide2.jpg" alt="" /></a>
                            <div class="label_text">
                                <h3 class="colortext uppercase">五味人生，你能hold住？</h3>
                                <span>不是每一种食品都是养生美食，不是每一种材质都能做出精密膳食！</span>
                            </div>
                        <li>
                            <a href=""><img src="images/content/slide1.jpg" alt="" /></a>
                            <div class="label_text">
                                <h3 class="colortext uppercase">食疗是一种习惯</h3>
                                <span>请珍惜你的生活，合理膳食有助于身体的健康！</span>
                            </div>
                        </li>
                        <li>
                            <a href=""><img src="images/content/slide3.jpg" alt="" /></a>
                            <div class="label_text">
                                <h3 class="colortext uppercase">养生是一种美德</h3>
                                <span>不要让生活偷走了你的美！</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="shadow-img-slider"></div>
            </div><!-- end #slider-container -->
        </div><!-- end #header -->

        
        <div id="after-header">
        	<h1>五谷人生 <span class="colortext">温馨提醒：</span> 

<span class="colortext"></span><br/>五谷杂粮是最好的食疗瘦身基础食物，也是最全面的能量来源。</h1>
        </div><!-- end #after-header -->
        
        <div id="before-content" class="patternbox">
        	<div class="shadow"></div>
        	<div class="container940">
            	<ul class="customlist">
                	<li>
                        <img src="images/icons/icon1.png" alt="" class="alignleft" />
                        <h3 

class="valignmiddle">五味 </h3>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;草生五色，五色之变，不可胜视，草生五味，五味之美，不可胜极。嗜欲不同，各有所通。天食人以五气，地食人以五味。五气入鼻，藏于心肺，上使五色修明，音声能彰。五味入口，藏于肠胃，味有所藏，以养五气。气和而生，津液相成，神乃自生。 </span>
                    </li>
                	<li>
                        <img src="images/icons/icon2.png" alt="" class="alignleft" />
                        <h3 

class="valignmiddle">五色</h3>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天有五气，食人入鼻，藏于五脏，上华面颐，肝青心赤，脾藏色黄，肺白肾黑，五脏之常。脏色为主，时色为客，春青夏赤，秋白冬黑，长夏四季，色黄常则，客胜主善，主胜客恶。</span>
                    </li>
                	<li class="last">
                        <img src="images/icons/icon3.png" alt="" class="alignleft" /><h3 

class="valignmiddle">五气</h3>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;天以五气食人者，臊气入肝，焦入心，香气入脾，腥气入肺，腐气入肾也。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;《素问·六节脏象论》：“五气更立，各有所胜。”<br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;《素问·阴阳应象大论》：“人有五脏化五气，以生喜怒悲忧恐。”  </span>
                    </li>
                </ul>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #before-content -->
        
				<div id="content">
        	<div id="main">
                <h2 class="title_pattern uppercase"><?php include("season.php"); ?>季保养</h2>
            <?php
             	    $sql=mysql_query("select * from tb_articles where  type='".$type."' order by articleid desc",$conn);
   					$res=mysql_fetch_array($sql);
					$j=0;
					while($res!=false)
					{
						    $articleid[$j]=$res["articleid"];
							$articletitle[$j]=$res["articletitle"];
							$headline[$j]=substr($res["content"],0,90);
							$passtime[$j]=$res["passtime"];
							$res=mysql_fetch_array($sql);
							$j++;
					}
					$random1=rand(0,$j-1);
					$random2=rand(0,$j-1);
					while($random2==$random1)
					{ 
					    $random2=rand(0,$j-1);
					}
					$random3=rand(0,$j-1);
					while($random3==$random2 || $random3==$random1)
					{ 
					    $random3=rand(0,$j-1);
					}
					$random4=rand(0,$j-1);
					while($random4==$random2 || $random4==$random1 || $random4==$random3)
					{ 
					    $random4=rand(0,$j-1);
					}  
			?>
            
                <ul id="recentpost">
                    <li>
                        <img src="images/content/pic1.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <div class="entry-date">发表时间 ：<?php echo $passtime[$random1]; ?></div>
                        <h5 class="colortext"><a href="articleshow.php?articleid=<?php echo $articleid[$random1]; ?>"><?php echo $articletitle[$random1]; ?></a></h5>
                        <span><?php echo $headline[$random1]; ?>...</span>
                    </li>
                    <li>
                        <img src="images/content/pic2.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <div class="entry-date">发表时间 ：<?php echo $passtime[$random2]; ?></div>
                        <h5 class="colortext"><a href="articleshow.php?articleid=<?php echo $articleid[$random2]; ?>"><?php echo $articletitle[$random2]; ?></a></h5>
                        <span><?php echo $headline[$random2]; ?>...</span>
                    </li>
                    <li>
                        <img src="images/content/pic3.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <div class="entry-date">发表时间 ：<?php echo $passtime[$random3]; ?></div>
                        <h5 class="colortext"><a href="articleshow.php?articleid=<?php echo $articleid[$random3]; ?>"><?php echo $articletitle[$random3]; ?></a></h5>
                        <span><?php echo $headline[$random3]; ?>...</span>
                    </li>
                    <li class="last">
                        <img src="images/content/pic4.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <div class="entry-date">发表时间 ：<?php echo $passtime[$random4]; ?></div>
                        <h5 class="colortext"><a href="articleshow.php?articleid=<?php echo $articleid[$random4]; ?>"><?php echo $articletitle[$random4]; ?></a></h5>
                        <span><?php echo $headline[$random4]; ?>...</span>
                    </li>
                </ul>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end #main -->
		</div><!-- end #content -->
        
        <div id="after-content" class="patternbox">
        	<div class="container940">
            	<a href="tizhicheck.php" class="button large">体质自检</a>
            	<h2>您的健康就是我们的责任！</h2>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #after-content -->
        
        
		<div id="footer">
        <div id="footer-pattern">
        
			<div class="container940">
            	<div id="footcol1">
                	<ul>
                    	<li class="widget-container">
                            <h2 class="widget-title">最热药材</h2>
                            <?php include ("hotestshicai.php");?>
                        </li>
                    </ul>
                </div>
                <div id="footcol2">
                	<?php
            if(isset($_SESSION["type"])==true)
            {
                    $type=$_SESSION["type"];
                    $sql4=mysql_query("select * from tb_articles where  type='".$type."' order by articleid desc",$conn);
                    $res4=mysql_fetch_array($sql4);
                    $j=0;
                    while($res4!=false)
                    {
                            $articleid[$j]=$res4["articleid"];
                            $articletitle[$j]=$res4["articletitle"];
                            $res4=mysql_fetch_array($sql4);
                            $j++;
                    }
                    $ran1=rand(0,$j-1);
                    $ran2=rand(0,$j-1);
                    while($ran2==$ran1)
                    { 
                        $ran2=rand(0,$j-1);
                    }
                    $ran3=rand(0,$j-1);
                    while($ran3==$ran2 || $ran3==$ran1)
                    { 
                        $ran3=rand(0,$j-1);
                    }
                    $ran4=rand(0,$j-1);
                    while($ran4==$ran2 || $ran4==$ran1 || $ran4==$ran3)
                    { 
                        $ran4=rand(0,$j-1);
                    }  
                    $ran5=rand(0,$j-1);
                    while($ran5==$ran2 || $ran5==$ran1 || $ran5==$ran3 || $ran5==$ran4)
                    { 
                        $ran5=rand(0,$j-1);
                    }  
            }
            ?>
                    <ul>
                        <li class="widget-container">
                            <h2 class="widget-title">热门文章</h2>
                            <ul>
                                <li><a href="articleshow.php?articleid=<?php echo $articleid[$ran1]; ?>"><?php echo $articletitle[$ran1]; ?></a></li>
                                <li><a href="articleshow.php?articleid=<?php echo $articleid[$ran2]; ?>"><?php echo $articletitle[$ran2]; ?></a></li>
                                <li><a href="articleshow.php?articleid=<?php echo $articleid[$ran3]; ?>"><?php echo $articletitle[$ran3]; ?></a></li>
                                <li><a href="articleshow.php?articleid=<?php echo $articleid[$ran4]; ?>"><?php echo $articletitle[$ran4]; ?></a></li>
                                <li><a href="articleshow.php?articleid=<?php echo $articleid[$ran5]; ?>"><?php echo $articletitle[$ran5]; ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol3">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title">团队成员</h2>
                            <ul id="flickr">
                            	<li ><a href="#"><img width="51px" height="51px" src="images/content/pic7.jpg" alt="" 

class="frame" /></a></li>
                                <li><a href="#"><img width="51px" height="51px" src="images/content/pic8.jpg" alt="" 

class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img 

width="51px" height="51px" src="images/content/pic9.jpg" alt="" class="frame" /></a></li>
                                <li><a href="#"><img width="51px" height="51px" src="images/content/pic10.jpg" alt="" 

class="frame" /></a></li>
                                <li><a href="#"><img width="51px" height="51px" src="images/content/pic11.jpg" alt="" 

class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img width="51px" height="51px"

src="images/content/pic12.jpg" alt="" class="frame" /></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol4">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title"><a href="contact.php">联系我们</a></h2>
                            <div class="textwidget">
                            <p>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们是openMind的团队。
                            </p>
                           <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果你对我们的服务有任何不满意或者您有任何宝贵意见，请反馈给我们，我们及时帮您解决我们的服务给您所带来的不便。</p>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail:<a href="mailto:zjw@xllian.com">zjw@xllian.com</a> 

</span>
                            </div>
                        </li>
                    </ul>
                </div>
           
            <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
            
        </div><!-- end #footer-pattern -->  
		</div><!-- end #footer -->
        
        <div id="after-footer">
        	<div class="container940">
                <div id="sn">
                	<ul>
                    	<li><a href="#"><img src="images/icons/sina.png" alt="" /></a></li>
                       <!-- <li><a href="#"><img src="images/icons/stumbleupon.png" alt="" 

/></a></li>-->
                        <li><a href="#"><img src="images/icons/twitter.png" alt="" 

/></a></li>
                        <li><a href="#"><img src="images/icons/tencent.png" alt="" 

/></a></li>
                        <li><a href="#"><img src="images/icons/qzone.png" alt="" 

/></a></li>
                    </ul>
                </div>
                <div id="footertext">
                    Copyright &copy;2014 五谷人生.  All Rights Reserved.
                </div>
               <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #after-footer -->
        
	</div><!-- end #container -->
</div><!-- end #outer-container -->
		
</body>
</html>

