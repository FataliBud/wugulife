<?php
   
    $today=getdate();
    switch ($today["mon"]) {
    	case 12:
    	case 1:
    	case 2: echo "春";$type="spring";$_SESSION["type"]=$type;
    		break;
    	case 3:
    	case 4:
    	case 5: echo "夏";$type="summer";$_SESSION["type"]=$type;
    		break;

    	case 6:
    	case 7:
    	case 8: echo "秋";$type="autumn";$_SESSION["type"]=$type;
    		break;

    	case 9:
    	case 10:
    	case 11: echo "冬";$type="winter";$_SESSION["type"]=$type;
    		break;
    }
?>