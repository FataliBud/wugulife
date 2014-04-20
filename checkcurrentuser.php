<?php
	// session_start();
	 if(isset($_SESSION["username"])!=false && $_SESSION["username"]!="")
	 {
		 	echo $_SESSION["username"];
	 }
	 else
	 	echo "";
	 
?>