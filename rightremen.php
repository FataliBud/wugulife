<?php

    $sql0=mysql_query("SELECT * FROM tb_shicai s,tb_factory f where f.factoryid=s.factoryid ORDER BY clicktime desc LIMIT 0,4",$conn);
   		    $res0=mysql_fetch_array($sql0);
		    $i0=0;
			while($res0!=false)
			{
						$shicaiid0[$i0]=$res0["shicaiid"];
						$factoryid0[$i0]=$res0["factoryid"];
						$shicainame0[$i0]=$res0["shicainame"];
						$res0=mysql_fetch_array($sql0);
						$i0++;
			}
?>
                     <li class="widget-container">
                          <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="materialdetails.php?shicaiid=<?php echo $shicaiid0[0];?>&factoryid=<?php echo $factoryid0[0];?>"><?php echo $shicainame0[0]; ?></a></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span></span>
                     </li>
                     <li class="widget-container">
                    	  <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="materialdetails.php?shicaiid=<?php echo $shicaiid0[1];?>&factoryid=<?php echo $factoryid0[1];?>"><?php echo $shicainame0[1]; ?></a></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                    	   <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="materialdetails.php?shicaiid=<?php echo $shicaiid0[2];?>&factoryid=<?php echo $factoryid0[2];?>"><?php echo $shicainame0[2]; ?></a></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                    	   <span class="tag"><span class="left"></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span><span class="middle"><a href="materialdetails.php?shicaiid=<?php echo $shicaiid0[3];?>&factoryid=<?php echo $factoryid0[3];?>"><?php echo $shicainame0[3]; ?></a></span><span class="right"></span></span>
                          <span class="tag"><span class="left"></span></span>
                  	  </li>
                      <li class="widget-container">
                    	  <span class="tag"></span>
                    	  <div class="clear"></div>
                  	  </li>