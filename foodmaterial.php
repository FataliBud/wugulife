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
					 
});

 <!--登陆验证-->
    	function login(form){
        	if(form.username.value == ""){
        		alert("用户不能为空！");
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
        		<h1 class="pagetitle">食材</h1>
                <div class="pagedesc">
                  <form name="form1" method="post" action="foodmaterial.php" >
                    <input name="keyword" type="text" value="地址、食材名等关键字" size="30" >
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
       if(isset($_POST['keyword'])==true)
	  {
			  $keyword=$_POST['keyword'];
			  $sql=mysql_query("select count(*) as total from tb_factory f, tb_shicai s where f.factoryid=s.factoryid and (s.shicainame like '%".$keyword."%' or f.factoryname like '%".$keyword."%' or f.address like '%".$keyword."%') order by s.shicaiid desc",$conn);
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
						 $sql1=mysql_query("select * from tb_factory f, tb_shicai s where f.factoryid=s.factoryid and (shicainame like '%".$keyword."%' or factoryname like '%".$keyword."%' or address like '%".$keyword."%') order by shicaiid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
						 while($info1=mysql_fetch_array($sql1))
						 {
                                 // $_SESSION["factoryid"]=$info1['factoryid'];
							?>							
									<li style="margin-left:20px;height:500px;width:231pxmargin-right:10px;">
										<div class="ts-display-product-img">
										   <a href="materialdetails.php?shicaiid=<?php echo $info1['shicaiid'];?>&factoryid=<?php echo $info1['factoryid'];?>">
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
										<?php echo substr($info1['function'],0,300);?><br/>
                                      
                                            <!--	<a href="factory.php?factoryid=<?php// echo $info1['factoryid'];?>">
厂商：<?php //echo $info1['factoryname'];?></a><br/>     -->
                                            <!--价格：<?php //echo $info1['price'];?>RMB<br/>
地址：<?php// echo $info1['address'];?><br/>-->	
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
                <a href="foodmaterial.php?page=1" class="page">首页</a>
                <a href="foodmaterial.php?page=<?php echo $page-1;?>" class="page">上一页</a>
                <?php
                  }
                          if($pagecount<=4){
                           for($i=1;$i<=$pagecount;$i++){
                  ?>
                <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                <?php
                     }
                   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="foodmaterial.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="foodmaterial.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="foodmaterial.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
               <?php }
         }?>
                            </div><!-- end pagenavi -->
    <?php
	  }else
	  {
			   $sql=mysql_query("select count(*) as total from tb_shicai  order by shicaiid desc ",$conn);
		
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
				
						 $sql1=mysql_query("select * from tb_factory f, tb_shicai s where f.factoryid=s.factoryid order by shicaiid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
		
						 while($info1=mysql_fetch_array($sql1))
						 {
								 ?>
    <li style="margin-left:20px;height:500px;width:231pxmargin-right:10px;">
										<div class="ts-display-product-img">
										   <a href="materialdetails.php?shicaiid=<?php echo $info1['shicaiid'];?>&factoryid=<?php echo $info1['factoryid'];?>">
											  <?php
												 if($info1["shicaiimage"]=="")
												 {
												   echo "暂无图片!";
												 }
												 else
												 {
												?>
												 <img  width="221" height="221" src="<?php echo $info1["shicaiimage"];?>"  alt="" />
												<?php
												 }
												?>
										  </a>
										</div>
        <div class="ts-display-product-text" style="width:230px;">
										<h2 class="colortext">名称：<?php echo $info1['shicainame'];?></h2>
                                        <?php echo substr($info1['function'],0,300);?><br/>
                                    
            <!--	<a href="factory.php?factoryid=<?php //echo $info1['factoryid'];?>">
厂商：<?php //echo $info1['factoryname'];?></a><br/>-->	
            <!--价格：<?php// echo $info1['price'];?>RMB<br/>
地址：<?php// echo $info1['address'];?><br/>-->	
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
        <a href="foodmaterial.php?page=1" class="page">首页</a>
        <a href="foodmaterial.php?page=<?php echo $page-1;?>" class="page">上一页</a>
        <?php
		  }
		          if($pagecount<=4){
		           for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
        <?php
		     }
		   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="foodmaterial.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=4;$i++){   
                                  ?>
                                <a href="foodmaterial.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="foodmaterial.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="foodmaterial.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="foodmaterial.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
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
                       <h2 class="widget-title">热门食材搜索</h2>
                        <?php
    				
                             include ("rightremen.php");
						?>

                    </li>
                    <li class="widget-container">
                      <h2 class="widget-title">顾客登录</h2>
                      <form id="login"  action="rightlogin.php" method="post" onsubmit="return login(this);">
                        <fieldset>
                          <label for="username3" id="username_label">用户名</label>
                          <input type="text" name="username" id="username3" />
                          <br/>
                          <br/>
                          <label for="password3" id="password_label"> 密码</label>
                          <input type="password" name="password" id="password3" />
                          <br/>
                          <br/>
                          <div class="lost"><a href="#" class="colortext">忘记密码?</a></div>
                          <input type="submit" name="submit" value="登陆"/>
                        </fieldset>
                      </form>
                    </li>
                    <li class="widget-container">
                      <h2 class="widget-title">食材分类</h2>
                      <ul>
                        <li><a href="#">所有品种</a></li>
                        <li><a href="#">治疗上身 (20)</a></li>
                        <li><a href="#">治疗下身 (30)</a></li>
                        <li><a href="#">治疗头部 (15)</a></li>
                      </ul>
                    </li>
                    <li class="widget-container">
                      <h2 class="widget-title">特别推荐</h2>
                        <?php    								
					                   $sql=mysql_query("SELECT * FROM `tb_shicai` ORDER BY `passtime` LIMIT 0,3",$conn);
   									   $res=mysql_fetch_array($sql);
										$i=0;
										while($res!=false)
										{
											$name[$i]=$res["shicainame"];
											$func[$i]=$res["function"];
											$img[$i] =$res["shicaiimage"];
											$price[$i]=$res["price"];
											$res=mysql_fetch_array($sql);
											$i++;
										}
								?>
                      <ul id="recentproductwidget">
                        <li> <a href="#"><img src="<?php echo $img[0]; ?>" alt="" class="alignleft" width="54"  height="54"/></a> <span class="colortext"><?php echo $name[0]; ?></span><br/>
                          <span>功效：<?php echo $name[0]; ?></span><br/>
                            <!--     <span>价格：<?php// echo $price[0]; ?></span>-->
                           <span class="clear"></span> </li>
                       <li> <a href="#"><img src="<?php echo $img[1]; ?>" alt="" class="alignleft" width="54"  height="54"/></a> <span class="colortext"><?php echo $name[1]; ?></span><br/>
                          <span>功效：<?php echo $name[1]; ?></span><br/>
                           <!--<span>价格：<?php// echo $price[1]; ?></span>-->
                           <span class="clear"></span> </li>
                       <li> <a href="#"><img src="<?php echo $img[2]; ?>" alt="" class="alignleft" width="54"  height="54"/></a> <span class="colortext"><?php echo $name[2]; ?></span><br/>
                          <span>功效：<?php echo $name[2]; ?></span><br/>
                           <!--<span>价格：<?php// echo $price[2]; ?></span>-->
                           <span class="clear"></span> </li>
                      </ul>
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
