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
<title>食材</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/inner1.css" rel="stylesheet" type="text/css" />
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
        	<div id="logo"><a href="index.php"><img src="images/logo.png" alt=""  /></a></div><!-- end #logo -->
            <div id="nav">
                <ul id="topnav" class="sf-menu">
                    <li><a href="index.php"  class="current">首页</a></li>
                    <li><a href="#">自我测评</a>
                        <ul>
                            <li><a href="tizhicheck.php">体质自检</a></li>
                            <li><a href="symptomcheck.php">症状自检</a></li>
                         
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
        		<h1 class="pagetitle">食材</h1>
                <div class="pagedesc">
                  <form name="form1" method="post" action="foodmaterial.php" >
                    <input name="keyword" type="text" value="输入地址或食材名等关键字" size="30" >
                    <input name="search" type="submit" value="搜索" style="color:#FFF">
                 </form>
                </div>
                <div class="pagedesc">您可以在这里选择你需要的食材</div>&nbsp;&nbsp;
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content" class="withsidebar">
        	<div id="main">
            	<div id="maincontent">
                    
                     <div id="ts-display-product-container">
                     <ul id="ts-display-product">
       <?php
       if(isset($_POST['keyword']))
	  {
			  $keyword=$_POST['keyword'];
			  $sql=mysql_query("select count(*) as total from tb_factory f, tb_shicai s where f.factoryid=s.factoryid and (shicainame like '%".$keyword."%' or address like '%".$keyword."%') order by shicaiid desc",$conn);
			   $info=mysql_fetch_array($sql);
			   $total=$info["total"];
			   if($total==0)
			  {
			  ?>
				<li>
								<div class="ts-display-product-img">
						   
							   <p> 啊哦！没有您要找的食材哦！
								再换个关键字吧！</p>
								</div>
							</li>
							<li style="width:20px; display:inline;">
							<div></div></li>
						 </ul>      
						  <div class="separator line"></div>   
						 </div><!-- end #ts-display-product -->
						 <div class="pagenavi productnav"> 
						</div><!-- end pagenavi -->
				 <?php
			   } 
			   else
			   {
					   $pagesize=6;
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
						 $sql1=mysql_query("select * from tb_factory f, tb_shicai s where f.factoryid=s.factoryid and (shicainame like '%".$keyword."%' or address like '%".$keyword."%') order by shicaiid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
				 
						 while($info1=mysql_fetch_array($sql1))
						 {
								 ?>
									<li>
										<div class="ts-display-product-img">
										   <a href="materialdetails.php">
											  <?php
												 if($info1["shicaiimage"]=="")
												 {
												   echo "暂无图片!";
												 }
												 else
												 {
												?>
                                              <img width="480" height="480"   src="<?php //echo $info1["shicaiimage"];?>"  alt="" />
												<?php
												 }
												?>
										  </a>
										</div>
										<div class="ts-display-product-text">
										<h2 class="colortext">名称：<?php echo $info1['shicainame'];?></h2>
										主要功能：<?php echo substr($info1['function'],0,300);?><br/>
										价格：<?php echo $info1['price'];?>RMB<br/>
										地址：<?php echo $info1['address'];?><br/>
									   访问次数：<?php echo $info1['clicktime'];?>
										&nbsp;<a href="materialdetails.php?shicaiid=<?php echo $info1['shicaiid'];?>&factoryid=<?php echo $info1['factoryid'];?>" class="button">查看详细&gt;&gt;</a>
										</div>
									</li>
									<li style="width:20px; display:inline;"><div></div></li>
                                    
					 <?php
						}
			     }
				 ?>
          </ul>
                             
                              <div class="separator line"></div>
                             
                             </div><!-- end #ts-display-product -->
                             
                             
                             <div class="pagenavi productnav">
                             &nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                               <?php
                  if($page>=2)
                  {
                  ?>
                <a href="factory.php?page=1" class="page">首页</a>
                <a href="factory.php?page=<?php echo $page-1;?>" class="page">上一页</a>
                <?php
                  }
                          if($pagecount<=4){
                           for($i=1;$i<=$pagecount;$i++){
                  ?>
                <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                <?php
                     }
                   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="factory.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="factory.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="factory.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="factory.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="factory.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="factory.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
               <?php }
         }?>
                            </div><!-- end pagenavi -->
    <?php
	  }else
	  { 		
	  		if(isset($_GET["factoryid"])!=false)
	  		{
	  			$_SESSION["factoryid"]=$_GET["factoryid"];
	  		}
		
            $sql=mysql_query("select count(*) as total from tb_shicai s,tb_factory f where s.factoryid=f.factoryid and s.factoryid='".$_SESSION["factoryid"]."' order by shicaiid desc",$conn);
		
			   $info=mysql_fetch_array($sql);
			   $total=$info["total"];
			   if($total==0)
			   {
				 ?>
					<li>
									<div class="ts-display-product-img">
							   
								   <p> 啊哦！没有您要找的食材哦！
									再换个关键字吧！</p>
									</div>
								</li>
								<li style="width:20px; display:inline;">
								<div></div></li>
							 </ul>      
							  <div class="separator line"></div>   
							 </div><!-- end #ts-display-product -->
							 <div class="pagenavi productnav"> 
							</div><!-- end pagenavi -->
				 <?php
			   } 

			   else
			   {
					   $pagesize=6;
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
				        $sql1=mysql_query("select * from tb_shicai s,tb_factory f where s.factoryid=f.factoryid and s.factoryid='".$_SESSION['factoryid']."' order by shicaiid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
		
						 while($info1=mysql_fetch_array($sql1))
						 {
								 ?>
									<li style="margin-left:20px;height:500px;width:231pxmargin-right:10px;">
										<div class="ts-display-product-img">
										   <a href="materialdetails.php">
											  <?php
												 if($info1["shicaiimage"]=="")
												 {
												   echo "暂无图片!";
												 }
												 else
												 {
												?>
												 <img width="220" height="220" src="<?php echo $info1["shicaiimage"];?>"  alt="" />
												<?php
												 }
												?>
										  </a>
										</div>
										<div class="ts-display-product-text">
										<h2 class="colortext">名称：<?php echo $info1['shicainame'];?></h2>
										主要功能：<?php echo substr($info1['function'],0,300);?><br/>
										价格：<?php echo $info1['price'];?>RMB<br/>
										地址：<?php echo $info1['address'];?><br/>
									   访问次数：<?php echo $info1['clicktime'];?>
                                        &nbsp;<a href="materialdetails.php?shicaiid=<?php echo $info1['shicaiid'];?>&factoryid=<?php echo $info1['factoryid'];?>" class="button">查看详细&gt;&gt;</a>
								
										</div>
									</li>
									<li style="width:20px; display:inline;"><div></div></li>
					 <?php
						}
			     }
            ?>  
                     </ul>
                     
                      <div class="separator line"></div>
                     
                     </div><!-- end #ts-display-product -->
                     
                     
                     <div class="pagenavi productnav">
                     &nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                       <?php
		  if($page>=2)
		  {
		  ?>
        <a href="factory.php?page=1" class="page">首页</a>
        <a href="factory.php?page=<?php echo $page-1;?>" class="page">上一页</a>
        <?php
		  }
		          if($pagecount<=4){
		           for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
        <?php
		     }
		   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="factory.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="factory.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="factory.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="factory.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="factory.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="factory.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="factory.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
               <?php }
         }?>
                    </div><!-- end pagenavi -->
         <?php
	   }
	  ?>
                     <div class="clear"></div><!-- clear float -->
                </div><!-- end #maincontent -->
                <div id="sidebar">
                	<ul>
                    	<li class="widget-container">
                        	<h2 class="widget-title"></h2>
                            <div class="textwidget">
                            <span class="colortext"></span> 
                            </div>
                        </li>
                    	<li class="widget-container">
                            <h2 class="widget-title">活跃用户</h2>
                            <?php
                               include ("activeUser.php");
							?>
                        </li>
                    	<li class="widget-container">
                        	<h2 class="widget-title">最美食</h2>
                            <ul>
                            	<li>土方"枸杞加党生瞬间长胖"！</li>
                                <li>那些你不知道的中医文化</li>
                                <li>李时珍传奇生涯</li>
                                <li>湖北中医药大学食疗方法推荐</li>
                            </ul>
                        </li>
                   	  <li class="widget-container">
                   	    <h2 class="widget-title">热门搜索</h2>
                        <?php

    								$sql0=mysql_query("SELECT foodid,foodname FROM tb_foodinfo ORDER BY clicktime desc LIMIT 0,4",$conn);
   									   $res0=mysql_fetch_array($sql0);
										$i0=0;
										while($res0!=false)
										{
											$foodid0[$i0]=$res0["foodid"];
											$foodname0[$i0]=$res0["foodname"];
											$res0=mysql_fetch_array($sql0);
											$i0++;
										}
								?>
                          <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="fooddetails.php?foodid=<?php echo $foodid0[0];?>"><?php echo $foodname0[0]; ?></a></span><span class="right"></span></span>
                        <span class="tag"><span class="left"></span></span>
                     </li>
                     <li class="widget-container">
                         <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="fooddetails.php?foodid=<?php echo $foodid0[1];?>"><?php echo $foodname0[1]; ?></a></span><span class="right"></span></span>
                        <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                          <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="fooddetails.php?foodid=<?php echo $foodid0[2];?>"><?php echo $foodname0[2]; ?></a></span><span class="right"></span></span>
                        <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                          <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="fooddetails.php?foodid=<?php echo $foodid0[3];?>"><?php echo $foodname0[3]; ?></a></span><span class="right"></span></span>
                        <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                    	  <span class="tag"></span>
                    	  <div class="clear"></div>
                  	  </li>
                    	<li class="widget-container">
                            <h2 class="widget-title">最新用户</h2>
                             <?php
                             include ("newUser.php");
						?>
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
		            <h2 class="widget-title">最新膳食</h2>
		            <ul id="flickr">
		              <li><a href="#"><img src="images/content/pic7.jpg" alt="" class="frame" /></a></li>
		              <li><a href="#"><img src="images/content/pic8.jpg" alt="" class="frame" /></a></li>
		              <li class="nomargin"><a href="#"><img src="images/content/pic9.jpg" alt="" class="frame" /></a></li>
		              <li><a href="#"><img src="images/content/pic10.jpg" alt="" class="frame" /></a></li>
		              <li><a href="#"><img src="images/content/pic11.jpg" alt="" class="frame" /></a></li>
		              <li class="nomargin"><a href="#"><img src="images/content/pic12.jpg" alt="" class="frame" /></a></li>
	                </ul>
	              </li>
	            </ul>
	          </div>
		      <div id="footcol4">
		        <ul>
		          <li class="widget-container">
		            <h2 class="widget-title">最新公告</h2>
		            <div class="textwidget">
		              <p> Nulla interdum, enim eu dictum pellentesque, ipsum elit varius purus, et imperdiet odio magna lobortis purus. </p>
		              <span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sed mauris at eros mollis ultricies vitae porta dui. </span> </div>
	              </li>
	            </ul>
	          </div>
		      <div class="clear"></div>
		      <!-- clear float -->
	        </div>
		    <!-- end container940 -->
	      </div>
		  <!-- end #footer-pattern -->
	  </div><!-- end #footer -->
        
        <div id="after-footer">
        	<div class="container940">
                <div id="sn">
                	<li><a href="#"><img src="images/icons/sina.png" alt="" /></a></li>
                       <!-- <li><a href="#"><img src="images/icons/stumbleupon.png" alt="" 

/></a></li>-->
                        <li><a href="#"><img src="images/icons/twitter.png" alt="" 

/></a></li>
                        <li><a href="#"><img src="images/icons/tencent.png" alt="" 

/></a></li>
                        <li><a href="#"><img src="images/icons/qzone.png" alt="" 

/></a></li>
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
