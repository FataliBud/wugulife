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
					 
	//jQuery tab
	jQuery(".tab-content").hide(); //Hide all content
	jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
	jQuery(".tab-content:first").show(); //Show first tab content
	//On Click Event
	jQuery("ul.tabs li").click(function() {
		jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(".tab-content").hide(); //Hide all tab content
		var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		jQuery(activeTab).fadeIn(200); //Fade in the active content
		return false;
	});
					 
});
</script>
</head>
<body>

<div id="outer-container">
	<div id="container">
    	<div id="top">
        	<div id="logo"><a href="index.php"><img src="images/logo.png" alt=""  /></a></div><!-- end #logo -->
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
                            <li><a href="acknowlage.php">食疗知识</a></li>
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
        		<h1 class="pagetitle">食疗知识</h1>
                <div class="pagedesc">让中医文化进入你的生活</div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content">
        	<div id="main">
                 <h2 class="title_pattern uppercase"><span>每日三个小TIP</span></h2>
           <?php
    				$sql=mysql_query("select * from tb_knowledge order by knowledgeid",$conn);
   					$res=mysql_fetch_array($sql);
					$i=0;
					while($res!=false)
					{
							$content[$i]=$res["content"];
							$key[$i]=$res["key"];
							$res=mysql_fetch_array($sql);
							$i++;
					}
					$rand1=rand(0,$i-1);
					$rand2=rand(0,$i-1);
					while($rand2==$rand1)
					{ 
					    $rand2=rand(0,$i-1);
					}
					$rand3=rand(0,$i-1);
					while($rand3==$rand2 || $rand3==$rand1)
					{ 
					    $rand3=rand(0,$i-1);
					}
				 ?>
                <div class="one_third firstcols">
                    <img src="images/icons/icon4.png" alt="" class="alignleft" /><h2 class="valignmiddle">知识1推荐</h2>
                   &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $content[$rand1]; ?> <span class="colortext">&nbsp;---------<?php echo $key[$rand1]; ?></span>.
                </div>
                <div class="one_third">
                    <img src="images/icons/icon5.png" alt="" class="alignleft" /><h2 class="valignmiddle">知识2推荐</h2>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $content[$rand2]; ?> <span class="colortext">&nbsp;---------<?php echo $key[$rand2]; ?></span>.
                </div>
                <div class="one_third lastcols">
                    <img src="images/icons/icon6.png" alt="" class="alignleft" /><h2 class="valignmiddle">知识3推荐</h2>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $content[$rand3]; ?> <span class="colortext">&nbsp;---------<?php echo $key[$rand3]; ?></span>.
                </div>
                
                <div class="separator"></div>
                
                <div class="tabcontainer">
                    <ul class="tabs">
                        <li><a href="#tab0">李时珍的故事</a></li>
                        <li><a href="#tab1">本草纲目</a></li>
                        <li><a href="#tab2">神农本草经</a></li>
                    </ul>
                    <div id="tab-body">
                        <div id="tab0" class="tab-content">
                        	<img src="images/lishizhen.jpg" alt="" class="alignleft frame" width="123" height="146" />
                        	<p><STRONG>药渣辨真假</STRONG></p>
                            <p>传说明代名医李时珍，一天外出采药，看到一个村庄田园荒芜，无人下地劳动，原来这个村的人都得了&ldquo;流感&rdquo;。在一个茅草屋里，他看见一位老人正在床上呻吟，急忙取出药来，让老人喝下，停了一会，老人出了一身汗，症状减轻了许多。李时珍询问了一下情况，才知道村里先后来过几个走江湖的郎中，给他们开过药，还说什么&ldquo;吃上一副药，包管你药到病除&rdquo;。可是吃了十来副了，仍不见效。李时珍便找来煎过的药渣，仔细一看，大部分是假药。时珍看药渣的事，传遍了附近的村庄，人们纷纷把江湖郎中配制的草药和带来的药渣叫李时珍鉴别，因为人太多，看不过来，只好让大家把药渣倒在村前的路口上，一个个摊开放好，逐个查看，拣出真药，扔掉假药、劣药，并教大家如何识别伪劣中草药，防止再上当受骗。从此以后，病人就把煎服过的药渣倒在路口处，盼望过路的良医识别真假，于是这个风俗就盛行起来。 </p>
                  </div>
                        <div id="tab1" class="tab-content">
                            <img src="images/bencaogangmu.jpg" alt="" class="alignleft frame" width="123" height="135" />
                            <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;《本草纲目》</strong>是明代李时珍在继承和总结明代以前本草学成就的基础上，结合作者长期并广泛地向药农、民间医生、猎人、渔人等劳动人民学习与采访所积累的大量药物学知识，共参考各类典籍八百余种，经过长期的刻苦实践和钻研，历时数十年而编成的一部药物学巨著。《本草纲目》将药物分为天水类、地水类、火类、土类等62类，收载药物1892种（其中新增374种），收载方剂一万首，插图一千幅。每种药物分列释名、集解、正误、修治、气味、主治、发明、附方等项。书中不仅考正了过去本草学中的若干错误，综合了大量的科学资料，也提出了较科学的药物分类方法，具有先进的生物进化思想；并反映了丰富的临床实践。李氏论述药物，在很多方面体现了人定胜天的唯物主义思想。本书不仅是一部中药学著作，书中涉及的内容极为广泛，举凡生物、化学、天文、地理、地质、采矿以至于历史等方面，都具有一定的成就。</p>
                        </div>
                        <div id="tab2" class="tab-content">
                            <img src="images/shennongbencao.jpg" alt="" class="alignleft frame" width="122" height="140" />
                          <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;《神农本草经》</strong>是现存最早的药物学专著，为我国早期临床用药经验的第一次系统总结，历代被誉为中药学经典著作。全每一味药的产地、性质、采集时间、入药部位和主治病症都有详细记载。对各种药物怎样相互配合应用，以及简单的制剂，都做了概述。并且我们的祖先通过大量的治疗实践，已经发现了许多特效药物，如麻黄可以治疗哮喘，大黄可以泻火，常山可以治疗疟疾等等。这些都已用现代科学分析的方法得到证实。在我国古代，大部分药物是植物药，所以&ldquo;本草&rdquo;成了它们的代名词，这部书也以&ldquo;本草经&rdquo;命名。汉代托古之风盛行，人们尊古薄今，为了提高该书的地位，增强人们的信任感，它借用神农遍尝百草，发现药物这妇孺皆知的传说，将神农冠于书名之首，定名为《神农本草经》。</p>
                        </div>
                    </div>
                </div><!-- tabcontainer -->
                
                <div class="separator"></div>
                
                <h2 class="title_pattern uppercase"><span>那些最平凡却最有效的药材</span></h2>
                 <?php
    				$sql1=mysql_query("select * from `tb_medicine` order by `medicineid`",$conn);
   					$res1=mysql_fetch_array($sql1);
					$j=0;
					while($res1!=false)
					{
							$img[$j]=$res1["medicineimage"];
							$medicinename[$j]=$res1["medicinename"];
							$introduce[$j]=$res1["introduce"];
							$res1=mysql_fetch_array($sql1);
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
                <ul class="customlist2">
                  <li>
                        <img src="<?php echo $img[$random1]; ?>" alt="" class="frame" width="210" height="160" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext"><?php echo $medicinename[$random1]; ?></h5>
                         <p><?php echo $introduce[$random1]; ?>...</p>
                    </li>
                    <li>
                       <img src="<?php echo $img[$random2]; ?>" alt="" class="frame" width="210" height="160" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext"><?php echo $medicinename[$random2]; ?></h5>
                         <p><?php echo $introduce[$random2]; ?>...</p>
                    </li>
                    <li>
                        <img src="<?php echo $img[$random3]; ?>" alt="" class="frame" width="210" height="160" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext"><?php echo $medicinename[$random3]; ?></h5>
                         <p><?php echo $introduce[$random3]; ?>...</p>
                    </li>
                    <li class="last">
                        <img src="<?php echo $img[$random4]; ?>" alt="" class="frame" width="210" height="160" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext"><?php echo $medicinename[$random4]; ?></h5>
                        <p><?php echo $introduce[$random4]; ?>...</p>
                    </li>
                </ul>
                
                
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
