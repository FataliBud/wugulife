
<?php
//	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>五谷人生</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<!--<link href="styles/style.css" rel="stylesheet" type="text/css" />-->
<link href="styles/inner.css" rel="stylesheet" type="text/css" />
<link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="span4" style="width:275px;">
  	
	<?php

	include("conn/conn.php");

	$sql=mysql_query("Select * from `tb_symptoms`",$conn);
	$res=mysql_fetch_array($sql);
	while($res!=false)
	{
		echo "<a  target='_top' href='symptomsdatails.php?sympid=".$res['sympid']."'>".$res["sympname"]."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
		$res=mysql_fetch_array($sql);
	}
?>

  </div>
   <!--<a href="#" class="button">Read More</a> <a href="#" class="button">Visit Website &rarr;</a> -->

</body>