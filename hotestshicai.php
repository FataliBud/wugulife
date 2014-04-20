
<?php

    								$sql=mysql_query("SELECT * FROM `tb_shicai` ORDER BY `passtime` LIMIT 0,2",$conn);

   									   $res=mysql_fetch_array($sql);
										$i=0;
										while($res!=false)
										{
                                            $shicaiid[$i]=$res["shicaiid"];
                                            $factoryid[$i]=$res["factoryid"];
											$name[$i]=$res["shicainame"];
											$func[$i]=$res["function"];
											$img[$i] =$res["shicaiimage"];
											$res=mysql_fetch_array($sql);
											$i++;
										}
								?>
    	

                            <ul id="recentpostwidget">
                               <!-- <li>
                                    <img src="<?php echo $img[0]; ?>" alt="" class="alignleft frame" width="51"  height="51"/>
                                    <h5><a href="materialdetails.php"><?php echo $name[0]; ?></a></h5>
                                    <span><?php echo $func[0];0?>...</span>
                                </li>-->
                                <li>
                                    <img src="<?php echo $img[1]; ?>" alt="" 

class="alignleft frame" width="51"  height="51" />
                                    <h5><a href="materialdetails.php?shicaiid=<?php echo $shicaiid[1]; ?>&factoryid=<?php echo $factoryid[1]; ?>"><?php echo $name[1]; ?></a></h5>
                                    <span><?php echo $func[1];?>.....</span>
                                </li>
                            </ul>
