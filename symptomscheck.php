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
<link href="styles/prettyPhoto.css" rel="stylesheet"  type="text/css" media="screen" title="prettyPhoto" />
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
<script type="text/javascript" src="js/fade.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
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
					 
	/* portfolio gallery */
	jQuery('a[data-rel]').each(function() {jQuery(this).attr('rel', jQuery(this).data('rel'));});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook',slideshow:2000});
					 
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
        		<h1 class="pagetitle">症状自检</h1>
                <div class="pagedesc">请根据您的症状部位点击左侧人体相应部位，查看症状详情！</div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content">
        	<div id="main">
            
                <div id="ts-display-portfolio">
                <ul id="ts-display-pf-col-3">
                    <li>
                        <div class="ts-display-pf-img">
                           
                            <span class="rollover"></span>
                            <img src="images/body/MaleF.jpg" alt="" border="0" usemap="#Map" hidefocus="true"/>
                          <map name="Map">
                            <area shape="poly" coords="169,70,171,68,167,71,166,67,170,65,168,60,172,57,169,50,168,45,166,35,161,27,167,40,158,24,154,21,144,16,151,17,141,16,133,17,129,21,125,24,122,30,121,37,119,42,119,49,114,54,113,58,115,65,120,69,123,77,133,82,149,82,158,80" target="bodyZCR" href="sider.php?bodyid=2014022101">
                            <area shape="poly" coords="115,46" target="bodyZCR" href="#">
                            <area shape="poly" coords="166,77,166,89,167,98,165,109,174,112,166,114,153,113,145,118,131,116,124,114,120,114,114,112,116,107,120,103,122,98,122,92,121,85,119,75,127,80,137,82,145,84,156,82,164,81,164,82,169,104,170,108,172,113,177,112" href="sider.php?bodyid=2014022102" target="bodyZCR">
                            <area shape="poly" coords="109,111,103,114,96,118,91,121,83,123,76,124,69,127,64,129,62,135,58,138,56,145,56,155,62,155,76,155,88,153,98,151,111,153,123,154,127,152,143,154,160,155,179,155,188,155,197,154,211,154,220,154,229,151,231,149,231,144,227,137,219,130,216,126,208,122,195,118,186,115,181,112,169,116,156,114,139,115,125,114,114,112,130,114,148,114,163,114,174,114" href="sider.php?bodyid=2014022103" target="bodyZCR">
                            <area shape="poly" coords="80,156,80,162,81,170,83,178,83,187,84,195,93,200,105,198,119,199,133,198,150,195,170,197,183,198,192,198,193,198,199,198,199,188,198,182,201,175,201,167,199,161,200,157,192,156,180,156,170,157,163,157,150,158,142,157,133,155,119,154,109,154,101,154,89,152,159,157,126,153,92,154" href="sider.php?bodyid=2014022104" target="bodyZCR">
                            <area shape="poly" coords="89,199,92,204"  target="bodyZCR" href="#">
                            <area shape="poly" coords="98,201,98,206,102,211,109,215,129,215,160,218,173,219,185,217,190,208,191,202,191,196,198,197,180,194,170,194,154,193,142,193,130,194,110,196,98,200" href="sider.php?bodyid=2014022104" target="bodyZCR">
                            <area shape="poly" coords="90,200,95,202,102,208,104,214,106,218,107,223,109,232,113,242,113,250,113,256,106,269,102,276,96,278,89,279,89,269,93,258,93,251,95,244,95,239,94,232,94,224,90,216,90,209,86,203" href="sider.php?bodyid=2014022106" target="bodyZCR">
                            <area shape="poly" coords="198,200" href="sider.php?bodyid=2014022106">
                            <area shape="poly" coords="197,201,199,209,196,212,196,221,194,230,194,240,194,254,196,262,198,276,191,278,182,278,176,270,175,257,179,245,181,229,182,219,186,213,192,203,193,199" href="sider.php?bodyid=2014022106" target="bodyZCR">
                            <area shape="poly" coords="102,212,106,218,109,228,112,237,115,244,115,253,113,260,108,270,102,275,95,279,89,280,90,288,91,291,89,291,89,300,86,310,86,315,85,323,85,326,83,335,84,338,103,336,110,338,134,338,144,338,162,338,174,338,189,338,192,338,199,333,201,333,203,328,202,320,201,315,201,307,201,301,198,294,196,287,197,283,190,281,181,272,180,269,176,261,176,248,178,239,181,228,181,225,178,220,172,220,105,213,123,218,134,216,146,216,160,219,169,220,166,221" href="sider.php?bodyid=2014022105" target="bodyZCR">
                            <area shape="poly" coords="148,369,150,374,150,383,146,400,153,413,158,419,159,428,156,437,156,447,162,471,162,490,158,510,158,518,158,540,161,553,164,565,164,582,164,597,163,603,180,604,183,604,190,595,189,576,191,564,196,544,197,531,198,524,198,513,198,504,197,490,197,477,195,462,196,451,202,432,199,420,204,412,202,379,204,367,204,354,203,350,203,340" href="sider.php?bodyid=2014022107" target="bodyZCR">
                            <area shape="poly" coords="85,346,94,349,107,366,109,356,132,366,133,371,140,376,140,390,140,398,138,406,132,417,132,424,133,434,132,444,130,453,129,461,126,473,124,486,125,492,131,508,131,522,129,536,128,548,124,562,123,577,123,592,124,604,125,607,110,608,110,608,103,608,100,606,100,595,100,564,99,571,97,558,93,546,93,537,90,526,88,518,87,505,85,420,82,413,82,395,83,387,82,376,82,356,82,352,82,364,81,372,95,349,97,350,97,350,93,351,92,351" href="sider.php?bodyid=2014022107" target="bodyZCR">
                            <area shape="poly" coords="163,607,162,611,162,615,163,619"target="bodyZCR" href="#">
                            <area shape="poly" coords="163,606,172,606,182,604,184,602,188,605,188,612,188,619,185,623,188,635,191,641,193,650,195,653,187,657,181,657,177,658,170,660,167,661,159,661,157,657,157,649,159,638,158,624,159,615,162,612" href="sider.php?bodyid=2014022109" target="bodyZCR">
                            <area shape="poly" coords="100,607,102,608,110,606,117,609,122,610,122,616,123,622,128,628,126,636,125,638,122,648,121,653,117,656,116,658,114,660,109,660,111,658,108,658,102,659,97,659,93,655,90,654,90,650,91,646,100,639,96,641,97,635,98,629,98,622,98,615,98,606" href="sider.php?bodyid=2014022109" target="bodyZCR">
                            <area shape="poly" coords="225,342,231,341,240,342,242,342,246,347,249,354,252,362,258,369,258,378,255,382,254,390,252,399,249,403,242,402,237,402,232,396,227,393,224,388,220,379,218,366,218,356,226,346" href="sider.php?bodyid=2014022108" target="bodyZCR">
                            <area shape="poly" coords="42,343,43,347,38,346,37,349,35,353,34,359,31,363,28,367,25,371,26,375,30,375,33,385,32,392,32,396,34,399,39,399,44,403,50,398,57,392,60,386,62,375,62,369,61,356,61,352,61,343" href="sider.php?bodyid=2014022108" target="bodyZCR">
                          </map>
                          
                            <span class="shadowimg300"></span>
                      </div>
                        <li>
                            <div style="width:20px; height:82px;"></div>
                            <div class="ts-display-pf-img" style="margin-top:36px;">
                           
                            <span class="rollover"></span>
                            <img src="images/body/female.jpg" alt="" border="0" usemap="#Map" hidefocus="true"/>
                          <map name="Map">
                            <area shape="poly" coords="169,70,171,68,167,71,166,67,170,65,168,60,172,57,169,50,168,45,166,35,161,27,167,40,158,24,154,21,144,16,151,17,141,16,133,17,129,21,125,24,122,30,121,37,119,42,119,49,114,54,113,58,115,65,120,69,123,77,133,82,149,82,158,80" target="bodyZCR" href="sider.php?bodyid=2014022101">
                            <area shape="poly" coords="115,46" target="bodyZCR" href="#">
                            <area shape="poly" coords="166,77,166,89,167,98,165,109,174,112,166,114,153,113,145,118,131,116,124,114,120,114,114,112,116,107,120,103,122,98,122,92,121,85,119,75,127,80,137,82,145,84,156,82,164,81,164,82,169,104,170,108,172,113,177,112" href="sider.php?bodyid=2014022102" target="bodyZCR">
                            <area shape="poly" coords="109,111,103,114,96,118,91,121,83,123,76,124,69,127,64,129,62,135,58,138,56,145,56,155,62,155,76,155,88,153,98,151,111,153,123,154,127,152,143,154,160,155,179,155,188,155,197,154,211,154,220,154,229,151,231,149,231,144,227,137,219,130,216,126,208,122,195,118,186,115,181,112,169,116,156,114,139,115,125,114,114,112,130,114,148,114,163,114,174,114" href="sider.php?bodyid=2014022103" target="bodyZCR">
                            <area shape="poly" coords="80,156,80,162,81,170,83,178,83,187,84,195,93,200,105,198,119,199,133,198,150,195,170,197,183,198,192,198,193,198,199,198,199,188,198,182,201,175,201,167,199,161,200,157,192,156,180,156,170,157,163,157,150,158,142,157,133,155,119,154,109,154,101,154,89,152,159,157,126,153,92,154" href="sider.php?bodyid=2014022104" target="bodyZCR">
                            <area shape="poly" coords="89,199,92,204"  target="bodyZCR" href="#">
                            <area shape="poly" coords="98,201,98,206,102,211,109,215,129,215,160,218,173,219,185,217,190,208,191,202,191,196,198,197,180,194,170,194,154,193,142,193,130,194,110,196,98,200" href="sider.php?bodyid=2014022104" target="bodyZCR">
                            <area shape="poly" coords="90,200,95,202,102,208,104,214,106,218,107,223,109,232,113,242,113,250,113,256,106,269,102,276,96,278,89,279,89,269,93,258,93,251,95,244,95,239,94,232,94,224,90,216,90,209,86,203" href="sider.php?bodyid=2014022106" target="bodyZCR">
                            <area shape="poly" coords="198,200" href="sider.php?bodyid=2014022106">
                            <area shape="poly" coords="197,201,199,209,196,212,196,221,194,230,194,240,194,254,196,262,198,276,191,278,182,278,176,270,175,257,179,245,181,229,182,219,186,213,192,203,193,199" href="sider.php?bodyid=2014022106" target="bodyZCR">
                            <area shape="poly" coords="102,212,106,218,109,228,112,237,115,244,115,253,113,260,108,270,102,275,95,279,89,280,90,288,91,291,89,291,89,300,86,310,86,315,85,323,85,326,83,335,84,338,103,336,110,338,134,338,144,338,162,338,174,338,189,338,192,338,199,333,201,333,203,328,202,320,201,315,201,307,201,301,198,294,196,287,197,283,190,281,181,272,180,269,176,261,176,248,178,239,181,228,181,225,178,220,172,220,105,213,123,218,134,216,146,216,160,219,169,220,166,221" href="sider.php?bodyid=2014022105" target="bodyZCR">
                            <area shape="poly" coords="148,369,150,374,150,383,146,400,153,413,158,419,159,428,156,437,156,447,162,471,162,490,158,510,158,518,158,540,161,553,164,565,164,582,164,597,163,603,180,604,183,604,190,595,189,576,191,564,196,544,197,531,198,524,198,513,198,504,197,490,197,477,195,462,196,451,202,432,199,420,204,412,202,379,204,367,204,354,203,350,203,340" href="sider.php?bodyid=2014022107" target="bodyZCR">
                            <area shape="poly" coords="85,346,94,349,107,366,109,356,132,366,133,371,140,376,140,390,140,398,138,406,132,417,132,424,133,434,132,444,130,453,129,461,126,473,124,486,125,492,131,508,131,522,129,536,128,548,124,562,123,577,123,592,124,604,125,607,110,608,110,608,103,608,100,606,100,595,100,564,99,571,97,558,93,546,93,537,90,526,88,518,87,505,85,420,82,413,82,395,83,387,82,376,82,356,82,352,82,364,81,372,95,349,97,350,97,350,93,351,92,351" href="sider.php?bodyid=2014022107" target="bodyZCR">
                            <area shape="poly" coords="163,607,162,611,162,615,163,619"target="bodyZCR" href="#">
                            <area shape="poly" coords="163,606,172,606,182,604,184,602,188,605,188,612,188,619,185,623,188,635,191,641,193,650,195,653,187,657,181,657,177,658,170,660,167,661,159,661,157,657,157,649,159,638,158,624,159,615,162,612" href="sider.php?bodyid=2014022109" target="bodyZCR">
                            <area shape="poly" coords="100,607,102,608,110,606,117,609,122,610,122,616,123,622,128,628,126,636,125,638,122,648,121,653,117,656,116,658,114,660,109,660,111,658,108,658,102,659,97,659,93,655,90,654,90,650,91,646,100,639,96,641,97,635,98,629,98,622,98,615,98,606" href="sider.php?bodyid=2014022109" target="bodyZCR">
                            <area shape="poly" coords="225,342,231,341,240,342,242,342,246,347,249,354,252,362,258,369,258,378,255,382,254,390,252,399,249,403,242,402,237,402,232,396,227,393,224,388,220,379,218,366,218,356,226,346" href="sider.php?bodyid=2014022108" target="bodyZCR">
                            <area shape="poly" coords="42,343,43,347,38,346,37,349,35,353,34,359,31,363,28,367,25,371,26,375,30,375,33,385,32,392,32,396,34,399,39,399,44,403,50,398,57,392,60,386,62,375,62,369,61,356,61,352,61,343" href="sider.php?bodyid=2014022108" target="bodyZCR">
                          </map>
                          
                            <span class="shadowimg300"></span>
                            </div></li>
              
                        
                        
                        <div class="ts-display-pf-text">
                            <h2 class="posttitle colortext">五谷人生，为您的健康竭诚服务！</h2>
                         <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis diam eget justo mollis pellentesque. Ut consectetur velit enim. Maecenas auctor congue velit quis vestibulum. Sed vitae metus nisi, non lobortis ante.</p>
                            <a href="#" class="button">专业解析</a> <a href="#" class="button">食物推荐 &rarr;</a>-->
                      </div>
                       <div style="width:300px;height:738px;float:left;">     
                          <iframe scrolling="yes" frameborder="0" align="middle" name="bodyZCR" src="totalsymptoms.php" width="100%" height="100%"></iframe>
                       </div>       
                         <div class="ts-display-clear"></div>
                    </li>
                    
                    
                </ul>
                </div><!-- end #ts-display-portfolio -->
                
               
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