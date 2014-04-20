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
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
<?php
   include( 'conn/conn.php' );
   if(isset($_GET["articleid"]))
   {
      $articleid=$_GET["articleid"];
      $_SESSION["articleid"]=$articleid;
   }
   
   $sql=mysql_query("select * from tb_articles where articleid='".$_SESSION["articleid"]."'");
   $info=mysql_fetch_array($sql);  
   
//  $imageid=rand(1,6);
//  $sql1=mysql_query("select imagepath from tb_images where imageid='".$imageid."'");
//   $info1=mysql_fetch_array($sql1);
?>        
	<div id="content" class="withsidebar">
   	    <div id="main">
            	<div id="maincontent"> 
                <!------详细信息------->
                     <div class="post">
                         <h2 class="posttitle" align="center"><a href="#"><?php echo  $info["articletitle"]; ?></a></h2>
                         <center><font color="#666666">发表时间：<?php echo  $info["passtime"]; ?></font>
                         <img src="<?php echo $info["image"]; ?>" class="frame"/></center>
                         <p></p>
                         <span class="shadowimg610"></span>
                         <div class="entry-content">
                             <?php echo  $info["content"]; ?>
                         </div>
                         <div class="clear"></div><!-- clear float -->
                     </div>
 <!-------------------------评论-------------------------------->
                     <div id="comment">
                                    <h3>留下您的评论：</h3>
                          <form id="commentform" action="#">
                            <fieldset>
                              <label for="name" id="name_label">姓名:</label>
                              <input type="text" name="name" id="name" size="50" value="" class="text-input" />
                              <label for="email" id="email_label">Email:</label>
                              <input type="text" name="email" id="email" size="50" value="" class="text-input" />
                              <label for="msg" id="msg_label">留言:</label>
                             <textarea cols="60" rows="10" name="msg" id="msg" class="textarea"></textarea><br />
                              <input type="submit" name="submit" id="submit_btn" value="提交"/>
                            </fieldset>
            
                          </form><p></p>
                        <h2>评论列表</h2>
                        <ol class="commentlist">
                         <?php
	   $sql2=mysql_query("select count(*) as total from tb_articlecomm where articleid='".$_SESSION["articleid"]."' order by articlecommid desc",$conn);
       $info2=mysql_fetch_array($sql2);
	   $total=$info2["total"];
	   if($total==0)
	   {
		   ?>
	          <li>
                <div class="comment-body">
                   <div class="avatar">
                      <img src="images/content/avatar.gif" alt=""/>
                      <span class="shadowimg70"></span>
                   </div>
                   还没有评论哦，快来抢沙发吧！！！
                </div>
              </li>
                </ol>
                     </div><!-- end #comment -->
           <?php
	   } 
	   else
	   {
	       $pagesize=4;
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
		
		     $sql3=mysql_query("select * from tb_articlecomm where articleid='".$_SESSION["articleid"]."' order by articlecommid desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             while($info3=mysql_fetch_array($sql3))
		     {
					 ?>
                            <li>
                                <div class="comment-body">
                                    <div class="avatar">
                                        <img src="images/content/avatar.gif" alt=""/>
                                        <span class="shadowimg70"></span>
                                    </div>
                                        <span class="tuser">用户名：<?php echo $info3["username"]?></span>
                                        <span class="tdate">评论日期：<?php echo $info3["commdate"]?></span><br/><br/>
                                    <p><?php echo $info3["content"];?></p>
                                    <a href="#">Reply</a>
                                </div>
                            </li>
         <?php
			}
		?>  
                        </ol> 
            </div><!-- end #ts-display-product -->
                     
                     
                     <div class="pagenavi productnav">
                     &nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
                       <?php
		  if($page>=2)
		  {
		  ?>
        <a href="articleshow.php?page=1" class="page">首页</a>
        <a href="articleshow.php?page=<?php echo $page-1;?>" class="page">上一页</a>
        <?php
		  }
		          if($pagecount<=4){
		           for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="articleshow.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
        <?php
		     }
		   }else{
              if($pagecount<=6)   
              {
                       for($i=1;$i<=$pagecount;$i++){   
                      ?>
                        <a href="articleshow.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                        <?php }
                          if($page!=$pagecount){
                                   ?>
                        <a href="articleshow.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                         <?php
                                   }
                          ?>
                        <a href="articleshow.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
                <?php  
		       }
               else{
                                for($i=1;$i<=6;$i++){   
                                  ?>
                                <a href="articleshow.php?page=<?php echo $i;?>" class="page"><?php echo $i;?></a>
                                <?php }
                                ?>
                                    ...<a href="articleshow.php?page=<?php echo $pagecount-1;?>" class="page"><?php echo $pagecount-1;?></a>   
                                       <a href="articleshow.php?page=<?php echo $pagecount;?>" class="page"><?php echo $pagecount;?></a> 
                               <?php
                                if($page!=$pagecount){
                                           ?>
                                <a href="articleshow.php?page=<?php echo $page+1;?>" class="page">下一页</a>
                                 <?php
                                           }
                                            ?>
                                <a href="articleshow.php?page=<?php echo $pagecount;?>" class="page">尾页</a>
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
<!-- end #outer-container -->
		
</body>
</html>
