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
        		<h1 class="pagetitle">关于我们</h1>
        		<div class="pagedesc">让您更了解我们，我们竭诚为您服务~~！！.</div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content" class="withsidebar">
        	<div id="main">
            	<div id="maincontent">
                    <h2 class="title_pattern uppercase"><span>团队文化</span></h2>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们是openMind团队，于2014年3月份组建，建设团队的目的是将PHP在湖北中医药大学长期发展下去，并且得到应用。因此，在团队创建之初，邀请了对网站建设和PHP编程感兴趣的同学加入到团队。
                    <div class="one_half firstcols">
                    	<ul class="outside">
                        	<li>不畏惧，不胆怯，不退缩</li>
                            <li>心若向阳，便无悲伤</li>
                            <li>勇于创新，敢于实践</li>
                            <li>坚信天道酬勤，杜绝杞人忧天</li>
                        </ul>
                    </div>
                    
                    <div class="one_half lastcols">
                    	<ul class="outside">
                        	<li>不做作，不骄傲，不自负</li>
                            <li>真诚待人，认真做事</li>
                            <li>团结互助，和睦友善</li>
                            <li>相信自己，才能开启成功之门</li>
                        </ul>
                    </div>
                    
                    <div class="separator"></div>
                    
                    <h2 class="title_pattern uppercase">坚持理念</h2>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;openMind是开放思想的意思，第一个单词的首字母“o”小写，代表要低调，第二个单词的首字母“M”大写，代表要大度豁达，同时，对于团队内部的每一个人，要求低调做人，高调做事。在我们学校，对于PHP的学习相对较薄弱，
                        然而，大多中小型企业更喜欢用PHP，其原因就是简单、易用。很多人都说，PHP的安全性不好，但是实践证明，没有一种语言是绝对安全的，也没有一种语言是不安全的。<br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;openMind致力于PHP的开发，希望能够将PHP在湖北中医药大学继续发扬，将团队一直延续下去。</p>
                    <p class="colortext">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;青“葱”岁月，我们相信生活会美好，我们相信天道酬勤，我们也相信我们的团队能走向光明。 </p>
                    <img src="images/content/pic13.jpg" alt="" class="frame" />
                    <span class="shadowimg610"></span>
                    
                    <p><center>青春的岁月<br/>
						我们身不由己<br>
                        只因这胸中<br/>
                        燃烧的梦想<br/>
                        青春的岁月<br/>
                        放浪的生涯<br/>
                        就任这时光<br/>
                        奔腾如流水<br/>
                        体会这狂野<br/>
                        体会孤独<br/>
                        体会这欢乐
                        <pre>                                    ——许巍《完美生活》 </pre>
                        </center>
                    </p>
                    
                    
                     <div class="clear"></div><!-- clear float -->
                </div><!-- end #maincontent -->
                <div id="sidebar">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title">我们的成果</h2>
                            <ul>
                            	<li><a href="http://liunianzhl.duapp.com/">流年最花落</a></li>
                                <li><a href="http://www.xllian.com">杏林之恋</a></li>
                                <li><a href="#">汉和设计</a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </li>
                    	<li class="widget-container">
                        	<h2 class="widget-title">我们提供：</h2>
                            <ul>
                            	<li><a href="symptomscheck.php">症状自测</a></li>
                                <li><a href="tizhicheck.php">体质自测</a></li>
                                <li><a href="#">各种保健膳食</a></li>
                                <li><a href="#">食材购买渠道</a></li>
                            </ul>
                        </li>
                    	<li class="widget-container">
                        	<h2 class="widget-title">热门标签：</h2>
                            <span class="tag"><span class="left"></span><span class="middle"><a href='#'>食疗养生</a></span><span class="right"></span></span>
                            <span class="tag"><span class="left"></span><span class="middle"><a href='#'>中医保健</a></span><span class="right"></span></span>
                            <span class="tag"><span class="left"></span><span class="middle"><a href='#'>膳食人生</a></span><span class="right"></span></span>
                            <span class="tag"><span class="left"></span><span class="middle"><a href='#'>五谷人生</a></span><span class="right"></span></span>
                            <span class="tag"><span class="left"></span><span class="middle"><a href='#'>食疗保健</a></span><span class="right"></span></span>
                            <div class="clear"></div>
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
                    Copyright &copy;2014 五谷人生.  All Rights Reserved.
                </div>
               <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #after-footer -->
        
    </div><!-- end #container -->
</div><!-- end #outer-container -->
        
</body>
</html>