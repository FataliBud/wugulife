<?php
	session_start();
    include("conn/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>五谷人生</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/inner.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<link href="styles/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script> 
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/supersubs.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
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
					 
});
</script>
</head>
<body>
<div id="outer-container">
    <div id="container">
        <div id="top">
            <div id="logo"><a href="index.php"><img src="images/logo.png" alt=""  

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
        
        <div id="header" class="innerpage">
        	<div class="shadow"></div>
        	<div class="container940">
        		<h1 class="pagetitle">联系我们</h1>
                <div class="pagedesc">给我们说说你的想法和建议吧.</div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content" class="withsidebar">
        	<div id="main">
            	<div id="maincontent">
                    <h2 class="title_pattern uppercase"><span>与我们联系</span></h2>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;如果你有好的建议请与我们联系吧！以下是我们的联系方式，右边也可以找到哦！^ω^ </p>
                    
                    <div class="separator line"></div>
                    
                    
                    <div id="contactform">
                      <form id="contact" action="suggestion.php" method="post">
                        <fieldset>
                          <label for="name" id="name_label">用户名:</label>
                          <input type="text" name="name" id="name"  value="" class="text-input" /><br/>
                          <label for="email" id="email_label">E-mail:</label>
                          <input type="text" name="email" id="email"  value="" class="text-input" /><br/>
                          <label for="subject" id="subject_label">主题:</label>
                          <input type="text" name="subject" id="subject"  value="" class="text-input" /><br/>
                          <label for="msg" id="msg_label">内容:</label>
                          <textarea cols="60" rows="10" name="msg" id="msg" ></textarea> <br class="clear" />
                          <input type="submit" name="submit" class="butcontact" id="submit_btn" value="提交"/>
                        </fieldset>
                      </form>
                      <br class="clear" />
                      <span class="error" id="name_error">Please enter name !</span>
                      <span class="error" id="email_error">Please enter email address !</span>
                      <span class="error" id="email_error2">Please enter valid email address !</span>
                      <span class="error" id="msg_error">Please enter message !</span>
                      
                    </div><!-- end #contactform -->
                    
                     <div class="clear"></div><!-- clear float -->
                </div><!-- end #maincontent -->
                <div id="sidebar">
                	<ul>
                    	<li class="widget-container">
                        	<h2 class="widget-title">联系方式</h2>
                            <div class="textwidget">
                           <p>
                           E-mail：<a href="mailto:zjw@xllian.com">zjw@xllian.com</a><br/>
                           <a href="android/wugulife.apk"><strong>下载手机安卓版</strong></a><br/>
                           电话： +62 500 800 123<br/>
                            在线客服：7411074<br/>
                            <br/>
                            </p>
                            </div>
                        </li>
                    	<li class="widget-container">我们的位置
                            <div class="textwidget">
                            <iframe style="width:270px; height:250px; border:0; margin:0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Jalan+Kemanggisan+Utama,+Jakarta,+Indonesia&amp;sll=37.0625,-95.677068&amp;sspn=46.092115,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Jalan+Kemanggisan+Utama,+Jakarta+Barat,+Jakarta,+Indonesia&amp;ll=-6.189793,106.7908&amp;spn=0.016639,0.034246&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Jalan+Kemanggisan+Utama,+Jakarta,+Indonesia&amp;sll=37.0625,-95.677068&amp;sspn=46.092115,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Jalan+Kemanggisan+Utama,+Jakarta+Barat,+Jakarta,+Indonesia&amp;ll=-6.189793,106.7908&amp;spn=0.016639,0.034246&amp;z=14&amp;iwloc=A" style="text-align:left; color:#555">查看更大的地图</a></small>
                            </div>
                        </li>
                    </ul>
                </div><!-- end #sidebar -->
                
                <div class="clear"></div><!-- clear float -->
            </div><!-- end #main -->
		</div><!-- end #content -->
        
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
                                <li><a href="#"><img src="images/content/pic7.jpg" alt="" 

class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic8.jpg" alt="" 

class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img 

src="images/content/pic9.jpg" alt="" class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic10.jpg" alt="" 

class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic11.jpg" alt="" 

class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img 

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
                    Copyright &copy;2014 <a href="index.php">五谷人生</a>.  All Rights Reserved.
                </div>
               <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #after-footer -->
        
    </div><!-- end #container -->
</div><!-- end #outer-container -->
        
</body>
</html>