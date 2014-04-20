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
<title>膳食共享</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/inner1.css" rel="stylesheet" type="text/css" />
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
        		<h1 class="pagetitle">膳食共享</h1>
                <div class="pagedesc">
                  <form name="form1" method="post" action="foodshare.php" >
                    <input name="keyword" type="text" value="输入膳食名称的关键字" size="30" >
                    <input name="search" type="submit" value="搜索" style="color:#FFF">
                 </form>
                </div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content">
        	<div id="main">
            
                <div id="ts-display-portfolio">
                <ul id="ts-display-pf-col-4">
                  <?php
	  if(isset($_POST['keyword']))
	  {
		  $keyword=$_POST['keyword'];
          $sql=mysql_query("select count(*) as total from tb_foodinfo where foodname like '%".$keyword."%' or fooddesc like '%".$keyword."%' order by foodid desc");
		   $info=mysql_fetch_array($sql);
		   $total=$info["total"];
		   if($total==0)
		   {
			?>             
				<div>
				<p>啊哦~！没有您要找的膳食哦！再换个关键字吧！！！o(≧v≦)o~~</p>
				</div>  
			<?php
		   } 
		   else
		   {
			   $pagesize=9;
			   if ($total<=$pagesize){
				  $pagecount=1;
				} 
				if(($total%$pagesize)!=0){
				   $pagecount=intval($total/$pagesize)+1;
				
				}else{
				   $pagecount=$total/$pagesize;
				
				}
				if ( !isset( $_GET['page'] ) || empty( $_GET['page'] ) || !is_numeric( $_GET['page'] ) || $_GET['page'] < 1 ){
					$page=1;
				
				}else{
					$page=intval($_GET["page"]);
				
				}
			 
				 $sql1=mysql_query("select * from tb_foodinfo where foodname like '%".$keyword."%' or fooddesc like '%".$keyword."%' order by foodid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
			
				 while($info1=mysql_fetch_array($sql1))
				 {
			  ?>
						<li>
						   <div class="ts-display-pf-img">
							  <?php
								 if($info1["foodimage"]=="")
								 {
								   echo "暂无图片!";
								 }
								 else
								 {
								?>
									<a class="image" href="<?php echo $info1['foodimage'];?>" data-rel="prettyPhoto[mixed]" >
									<span class="rollover"></span>
									<img src="<?php echo $info1["foodimage"];?>" alt="" width="220" height="158" /></a>
									<span class="shadowimg220"></span>
							   <?php
								 }
								?>
						  </div>
							<div class="ts-display-pf-text">
								<h2 class="posttitle colortext">名称：<?php echo $info1['foodname'];?></h2>
								<p><?php echo $info1['fooddesc'];?></p>
								访问次数：<?php echo $info1['clicktime'];?>&nbsp;&nbsp;&nbsp;
								<em><a href="fooddetails.php?foodid=<?php echo $info1['foodid'];?>" class="button">查看详细&gt;&gt;</a></em>
							</div>
							<div class="ts-display-clear"></div>
						</li> 
					<?php
					}
	?>
                </ul>
                
                 <div class="separator line"></div>
                
                </div><!-- end #ts-display-portfolio -->
                
               
                
                <div id="nav-below" class="navigation">
                      &nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                       <?php
			  if($page>=2)
			  {
			  ?>
			<a href="foodshare.php?page=1" class="page">首页</a>
			<a href="foodshare.php?page=<?php echo $page-1;?>" class="page">上一页</a>
			<?php
			  }
		      if($pagecount<=4){
		           for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
        <?php
		     }
		   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="foodshare.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="foodshare.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="foodshare.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
               <?php }
         }
                }?>
                </div><!-- #nav-below -->
 	<?php   
	  }else
	  {
		  ?>
		   <div id="ts-display-portfolio">
                <ul id="ts-display-pf-col-4">
		  <?php
		  $sql=mysql_query("select count(*) as total from tb_foodinfo order by foodid desc ",$conn);

		   $info=mysql_fetch_array($sql);
		   $total=$info["total"];
		   if($total==0)
		   {
			?>             
			  <div>
				<p>啊哦~！没有您要找的膳食哦！数据库空空如一！！！o(≧v≦)o~~</p>
				</div>  
			<?php
		   } 
		   else
		   {
			   $pagesize=9;
			   if ($total<=$pagesize){
				  $pagecount=1;
				} 
				if(($total%$pagesize)!=0){
				   $pagecount=intval($total/$pagesize)+1;
				
				}else{
				   $pagecount=$total/$pagesize;
				
				}
				if ( !isset( $_GET['page'] ) || empty( $_GET['page'] ) || !is_numeric( $_GET['page'] ) || $_GET['page'] < 1 ){
					$page=1;
				
				}else{
					$page=intval($_GET["page"]);
				
				}
			
			   $sql1=mysql_query("select foodimage,foodname,fooddesc,foodid,clicktime from tb_foodinfo order by foodid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
			
				 while($info1=mysql_fetch_array($sql1))
				 {
			  ?>
                      <li>
                        <div class="ts-display-pf-img">
                          <?php
                                             if($info1["foodimage"]=="")
                                             {
                                               echo "暂无图片!";
                                             }
                                             else
                                             {
                                            ?>
                          <a class="image" href="<?php echo $info1['foodimage'];?>" data-rel="prettyPhoto[mixed]" >
                          <span class="rollover"></span>
                          <img src="<?php echo $info1["foodimage"];?>" alt="" width="220" height="158" /></a>
                          <span class="shadowimg220"></span>
                          <?php
                                             }
                                            ?>
                          </div>
                            <div class="ts-display-pf-text">
                                <h2 class="posttitle colortext">名称：<?php echo $info1['foodname'];?></h2>
                                <p><?php echo $info1['fooddesc'];?></p>
                                访问次数：<?php echo $info1['clicktime'];?>&nbsp;&nbsp;&nbsp;
                                <em><a href="fooddetails.php?foodid=<?php echo $info1['foodid'];?>" class="button">查看详细&gt;&gt;</a></em>
                          </div>
                            <div class="ts-display-clear"></div>
                       </li>
			  <?php
					}
	?>
					</ul>
					
			  <div class="separator line"></div>
					
		  </div><!-- end #ts-display-portfolio -->
					
				   
					
					<div id="nav-below" class="navigation">
						  &nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
						   <?php
			  if($page>=2)
			  {
			  ?>
			<a href="foodshare.php?page=1" class="page">首页</a>
			<a href="foodshare.php?page=<?php echo $page-1;?>" class="page">上一页</a>
			<?php
			  }
					  if($pagecount<=4){
					   for($i=1;$i<=$pagecount;$i++){
			  ?>
			<a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
			<?php
				 }
			   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="foodshare.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="foodshare.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="foodshare.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="foodshare.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="foodshare.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
               <?php }
         }
         }?>
                </div><!-- #nav-below -->
 	<?php   }
	  ?>    <!-- end else total-->  
        
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