  <?php
    	$sql=mysql_query("select `username` from `tb_userinfo` order by regtime asc limit 0,3",$conn);	
   		$res=mysql_fetch_array($sql);
		$i=0;
		while($res!=false)
		{
			$name[$i]=$res["username"];
			$res=mysql_fetch_array($sql);
			$i++;
		}
  ?>
    	
 						<ul id="recentcommentwidget">
                                <li>
                                    <img src="images/content/imgcomm1.jpg" alt="" class="alignleft" />
                                    <span class="colortext"><?php echo $name[0]?></span>
                                    <span><a href="#">大家好，我是<?php echo $name[0]?>，这个网站的确很好，长了许多见识。</a></span>
                                    <span class="clear"></span>
                                </li>
                                <li>
                                    <img src="images/content/imgcomm2.jpg" alt="" class="alignleft" />
                                    <span class="colortext"><?php echo $name[1]?></span>
                                     <span><a href="#">我是<?php echo $name[1]?>，觉得挺不错的，知识全面。</a></span>
                                    <span class="clear"></span>
                                </li>
                                <li>
                                    <img src="images/content/imgcomm3.jpg" alt="" class="alignleft" />
                                    <span class="colortext"><?php echo $name[2]?></span>
                                     <span><a href="#">我是<?php echo $name[2]?>，很幸运发现了这么好的一个网站。</a></span>
                                    <span class="clear"></span>
                                </li>
                            </ul>