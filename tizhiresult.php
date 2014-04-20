 <?php
 session_start();
 include ("conn/conn.php");
		  $type1=0;
		  $type2=0;
		  $type3=0;
		  $type4=0;
		  $type5=0;
		  $type6=0;
		  $type7=0;
		  $type8=0;
		  $type9=0;
		
		  for($i=1;$i<=66;$i++)
		  {
			 $param[$i]=$_GET["param_$i"]; 
		  }
		 
		  
		  //阳虚
		  for($i=1;$i<=7;$i++)
		  {
			   $type1=$type1+$param[$i];
		  }
		  $score1=round(($type1-7)/(7*4)*100,2);

		  //阴虚
		  for($i=8;$i<=15;$i++)
		  {
			   $type2=$type2+$param[$i];
		  }
		   $score2=round(($type2-8)/(8*4)*100,2);
		  
		  //气虚
		  for($i=16;$i<=23;$i++)
		  {
			   $type3=$type3+$param[$i];
		  }
		   $score3=round(($type3-8)/(8*4)*100,2);
		  
		  //痰湿质
		  for($i=24;$i<=31;$i++)
		  {
			   $type4=$type4+$param[$i];
		  }
		   $score4=round(($type4-8)/(8*4)*100,2);
		  
		  //湿热
		  for($i=32;$i<=37;$i++)
		  {
			   $type5=$type5+$param[$i];
		  }
		   $score5=round(($type5-6)/(6*4)*100,2);
		  
		  //血瘀
		  for($i=38;$i<=44;$i++)
		  {
			   $type6=$type6+$param[$i];
		  }
		  $score6=round(($type6-7)/(7*4)*100,2);
		  
		  //特禀
		  for($i=45;$i<=51;$i++)
		  {
			   $type7=$type7+$param[$i];
		  }
		   $score7=round(($type7-7)/(7*4)*100,2);
		  
		  //气郁症
		  for($i=52;$i<=58;$i++)
		  {
			   $type8=$type8+$param[$i];
		  }
		   $score8=round(($type8-7)/(7*4)*100,2);
		  
		  //平和
		  for($i=59;$i<=66;$i++)
		  {
              if($i==59 or $i==64)
                 $type9=$type9+$param[$i]; 
              else
			     $type9=$type9+(5-$param[$i]+1);
		  }
		   $score9=round(($type9-8)/(8*4)*100,2);
		   
		   $tizhi="";
		  if($score9>=60 && $score1<30 && $score2<30 && $score3<30 && $score4<30 && $score5<30 && $score6<30 && $score7<30 && $score8<30)  
		  {
			  $tizhi="平和质";
		  }
		  else if($score9>=60 && $score1<40 && $score2<40 && $score3<40 && $score4<40 && $score5<40 && $score6<40 && $score7<40  && $score8<40)
		  {
			  $tizhi="基本平和质";
		  }
//	  else 
//	  {
//		  if($score1>=40)
//			  {
//				  $tizhi=" 阳虚质";
//			  }else if($score1>=30 && $score1<=39)
//			  {
//					$tizhi=" 倾向阳虚质"; 
//			  }
//			  
//			  if($score2>=40)
                  //			  {
//				  $tizhi.=" 阴虚质";
//			  }else if($score2>=30 && $score2<=39)
                  //			  {
//					$tizhi.=" 倾向阴虚质"; 
//			  }
////			  
//			  if($score3>=40)
//			  {
//				  $tizhi.=" 气虚质";
//			  }else if($score3>=30 && $score3<=39)
//			  {
//					$tizhi.=" 倾向气虚质"; 
//			  }
			  
//			  if($score4>=40)
//			  {
//				  $tizhi.=" 痰湿质";
//			  }else if($score4>=30 && $score4<=39)
                  //			  {
//					$tizhi.=" 倾向痰湿质"; 
//			  }
			  
//			   if($score5>=40)
//			  {
//				  $tizhi.=" 湿热质";
//			  }else if($score5>=30 && $score5<=39)
//			  {
//					$tizhi.=" 倾向湿热质"; 
//			  }
			  
//			  if($score6>=40)
//			  {
//				  $tizhi.=" 血瘀质";
//			  }else if($score6>=30 && $score6<=39)
//			  {
//					$tizhi.=" 倾向血瘀质"; 
//			  }
			  
//			  if($score7>=40)
//			  {
//				  $tizhi.=" 特禀质";
//			  }else if($score7>=30 && $score7<=39)
//			  {
//					$tizhi.=" 倾向特禀质"; 
//			  }
			  
//			  if($score8>=40)
//			  {  
//				  $tizhi.=" 气郁质";
//			  }else if($score8>=30 && $score8<=39)
//			  {
//					$tizhi.=" 倾向气郁质"; 
//			  }	 
//		  }
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
<link href="styles/zhuzhuangtu.css" rel="stylesheet" type="text/css" />
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
		
</script>
</head>

<body>
<div id="content" class="withsidebar">
        	<div id="main">
           	  <div id="maincontent"> 
                <!--========详细信息===============-->
                <div class="post">
                  <h2 class="posttitle" align="center">您的测试结果如下</h2>
                         <div class="histogram-container" id="histogram-container">
                            <!--背景方格-->
                            <div class="histogram-bg-line">
                                <ul>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                </ul>
                                <ul>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                </ul>
                                <ul>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                </ul>
                                <ul>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                </ul>
                                  <ul>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                    <li><div></div></li>
                                </ul>
                            </div>
                            <!--柱状条-->
                            <div class="histogram-content">
                                <ul>
                                    <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score9; ?>%;background:#2f87d9;" title="<?php echo $score9; ?>%"><?php echo $score9; ?>%</a></span>
                                        <span class="name">平和质</span>
                                    </li>
                                    <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score1; ?>%;background:#CCFF66" title="<?php echo $score1; ?>%"><?php echo $score1; ?>%</a></span>
                                        <span class="name">阳虚质</span>
                                    </li>
                                    <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score2; ?>%;background:orange;" title="<?php echo $score2; ?>%"><?php echo $score2; ?>%</a></span>
                                        <span class="name">阴虚质</span>
                                    </li>
                                    <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score3; ?>%;background:gray;" title="<?php echo $score3; ?>%"><?php echo $score3; ?>%</a></span>
                                        <span class="name">气虚质</span>
                                    </li>
                                     <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score4; ?>%;background:teal;" title="<?php echo $score4; ?>%"><?php echo $score4; ?>%</a></span>
                                        <span class="name">痰湿质</span>
                                    </li>
                                     <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score5; ?>%;background:#CCCC99;" title="<?php echo $score5; ?>%"><?php echo $score5; ?>%</a></span>
                                        <span class="name">湿热质</span>
                                    </li>
                                     <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score6; ?>%;background:#F96;" title="<?php echo $score6; ?>%"><?php echo $score6; ?>%</a></span>
                                        <span class="name">血瘀质</span>
                                    </li>
                                     <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score7; ?>%;background:#FFCCFF;" title="<?php echo $score7; ?>%"><?php echo $score7; ?>%</a></span>
                                        <span class="name">特禀质</span>
                                    </li>
                                     <li>
                                        <span class="histogram-box"><a style="height:<?php echo $score8; ?>%;background:#C90;" title="<?php echo $score8; ?>%"><?php echo $score8; ?>%</a></span>
                                        <span class="name">气郁质</span>
                                    </li>
                                </ul>
                            </div>
                            <!--百分比 y轴-->
                            <div class="histogram-y">
                                <ul>
                                    <li>100%</li>
                                    <li>80%</li>
                                    <li>60%</li>
                                    <li>40%</li>
                                    <li>20%</li>
                                    <li>0%</li>
                                </ul>
                            </div>
                        </div>
                        <span class="shadowimg610"></span>
                    
                         <div class="entry-content">
                         <?php
                   if($tizhi=="")
                   {
						  $max=max($score1,$score2,$score3,$score4,$score5,$score6,$score7,$score8);
                          $scor[0]=$score1;
                          $scor[1]=$score2;
						  $scor[2]=$score3;
						  $scor[3]=$score4;
						  $scor[4]=$score5;
						  $scor[5]=$score6;
						  $scor[6]=$score7;
						  $scor[7]=$score8;
                            $typ[0]="阳虚质";
                            $typ[1]="阴虚质";
                            $typ[2]="气虚质";
                            $typ[3]="痰湿质";
                            $typ[4]="湿热质";
                            $typ[5]="血瘀质";
                            $typ[6]="特禀质";
                            $typ[7]="气郁质";

						  $m=0;
                     	  for($s=0;$s<8;$s++)
	                      {
       		            	  if($max==$scor[$s])
							  {
								  $tz[$m]=$typ[$s];
                                  $m++;
							  }
						  }
						  for($s=0;$s<8;$s++)
	                      {
       		            	  if($max-5<=$scor[$s] and $scor[$s]<$max)
							  {
								  $tz[$m]=$typ[$s];
                                  $m++;
							  }
						  }
						 ?>
                           <h3 class="colortext">您的体质类型为：
						   <?php 
                             echo $tz[0];
						   ?></h3>  
                            
                            <?php
                              $x=count($tz);
                              if($x>1)
                              {
                                ?><h4 class="colortext">偏向体质类型：<?php
                                 for($i=1;$i<$x;$i++)
							       echo $tz[$i]."  ";
                                 ?></h4><br/><br/><?php
                              }
                             ?>
                           <?php 
						    $j=0;
						    while($j<$x)
							  {                          
								   $sql=mysql_query("select * from tb_tizhi where tizhiname='".$tz[$j]."'",$conn);  
								   $res1[$j]=mysql_fetch_array($sql);
                                
                                   $sq=mysql_query("select foodname from tb_foodinfo where find_in_set('".$res1[$j]["tizhiname"]."',adapttype) order by foodid desc",$conn);
                                   $inf[$j]=mysql_fetch_array($sq);
								   $j++;
							  }
							 $i=0;
							  while($i<$x)
							  {
								   echo "<span style='border:1px dotted teal; width:580px; word-wrap:break-word;'>";
								   echo "<strong>体质类型：".$res1[$i]["tizhiname"]."</strong><br/>";
								   echo "<strong>总体特征：</strong>".$res1[$i]["general"]."<br/>";
								   echo "<strong>形体特征：</strong>".$res1[$i]["physical"]."<br/>";
								   echo "<strong>常见表现：</strong>".$res1[$i]["common"]."<br/>";
								   echo "<strong>心理特征：</strong>".$res1[$i]["psychfeature"]."<br/>";
								   echo "<strong>发病倾向：</strong>".$res1[$i]["fabingtendency"]."<br/>";
								   echo "<strong>对外界环境适应能力：</strong>".$res1[$i]["adapt"]."<br/>";
								   echo "<strong>药膳指导：</strong>".$res1[$i]["guidance"]."<br/>";
                                   echo "<strong>相关膳食推荐：</strong>".$inf[$i]['foodname']."<br/>";
                                   echo "</span><p></p><p></p><p></p>";
								   $i++;
							  }
                   }//end if($type=="")
                   else
                   {
                      ?> <h3 class="colortext">您的体质类型为：<?php  echo $tizhi; ?> </h3><br/><br/>
                    <?php
                         $s=mysql_query("select * from tb_tizhi where tizhiname='".$tizhi."'",$conn);  
						$res1=mysql_fetch_array($s);
                       
                            $sq=mysql_query("select foodname from tb_foodinfo where find_in_set('".$res1["tizhiname"]."',adapttype) order by foodid desc",$conn);
                              $inf=mysql_fetch_array($sq);
							 if($res1)
							  {
								   echo "<span style='border:1px dotted teal; width:580px; word-wrap:break-word;'>";
								   echo "<strong>体质类型：".$res1["tizhiname"]."</strong><br/>";
								   echo "<strong>总体特征：</strong>".$res1["general"]."<br/>";
								   echo "<strong>形体特征：</strong>".$res1["physical"]."<br/>";
								   echo "<strong>常见表现：</strong>".$res1["common"]."<br/>";
								   echo "<strong>心理特征：</strong>".$res1["psychfeature"]."<br/>";
								   echo "<strong>发病倾向：</strong>".$res1["fabingtendency"]."<br/>";
								   echo "<strong>对外界环境适应能力：</strong>".$res1["adapt"]."<br/>";
								   echo "<strong>药膳指导：</strong>".$res1["guidance"]."<br/>";
                                   echo "<strong>相关膳食推荐：</strong>".$inf['foodname']."<br/>";
								   echo "</span>";
							  }
                   }
				   ?>
						
                       
                         </div>
                         <div class="clear"></div><!-- clear float -->
                   </div>

              </div><!-- end #ts-display-product --><!-- end pagenavi -->
              <div id="sidebar" style="width:220px;">
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
                      <li class="widget-container"><span class="tag"><span class="right"></span></span>
                    	  <span class="tag"><span class="left"></span><span class="right"></span></span>
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
          </div><!-- end #maincontent -->
                
                
                <div class="clear"></div><!-- clear float -->
            </div>
<?php mysql_close();?>
</body>
</html>