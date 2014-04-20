<?php

	//include("conn/conn.php");
	$sqlshow=mysql_query("select * from tb_foodinfo order by clicktime desc limit 0,5",$conn);
	$resshow=mysql_fetch_array($sqlshow);
	$i=0;
	while($resshow!=false)
    {
        //如果查询不为空
        //则将按点击量将前五条展示出来
    //    $showid[$i]["foodid"]=$resshow["foodid"];
   //     $showname[$i]["foodname"]=$resshow["foodname"];
  //      $showimage[$i]["foodimage"]=$resshow["foodimage"];
   //     $showdesc[$i]["fooddesc"]=$resshow["fooddesc"];
   //     $showdetails[$i]["details"]=$resshow["details"];
   //     $resshow=mysql_fetch_array($sqlshow);
  //      $i++;
        $showid[$i]=$resshow["foodid"];
        $showname[$i]=$resshow["foodname"];
        $showimage[$i]=$resshow["foodimage"];
        $showdesc[$i]=$resshow["fooddesc"];
        $showdetails[$i]=$resshow["details"];
        $resshow=mysql_fetch_array($sqlshow);
        $i++;
        
    }
//echo $i;
?>
