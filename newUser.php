<?php
       	$sql=mysql_query("select username,regtime from tb_userinfo order by regtime desc limit 0,3",$conn);	
   		$res=mysql_fetch_array($sql);
		$i=0;
		while($res!=false)
		{
			$name[$i]=$res["username"];
			$time[$i]=$res["regtime"];
			$res=mysql_fetch_array($sql);
			$i++;
		}
?>

 <ul id="recentprojectwidget">
                                <li>
                                    <a href="#"><img src="images/content/rp1.jpg" alt="" class="alignleft" /></a>
                                    <span class="colortext"><?php echo $name[0]?></span><br/>
                                    <span class="date"><?php echo $time[0]?></span>
                                    <span class="clear"></span>
                                </li>
                                <li>
                                    <a href="#"><img src="images/content/rp2.jpg" alt="" class="alignleft" /></a>
                                    <span class="colortext"><?php echo $name[1]?></span><br/>
                                    <span class="date"><?php echo $time[1]?></span>
                                    <span class="clear"></span>
                                </li>
                                <li>
                                    <a href="#"><img src="images/content/rp3.jpg" alt="" class="alignleft" /></a>
                                    <span class="colortext"><?php echo $name[2]?></span><br/>
                                    <span class="date"><?php echo $time[2]?></span>
                                    <span class="clear"></span>
                                </li>
                            </ul>