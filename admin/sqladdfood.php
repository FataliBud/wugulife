<?php
	include("cheak_is_login.php");
	include("conn/conn.php");


		$uptypes = array (
	    'image/jpg',
	    'image/png',
	    'image/jpeg',
	    'image/pjpeg',
	    'image/gif',
	    'image/bmp',
	    'image/x-png'
		);

		$today=getdate();
		$year=$today["year"];
		$month=$today["mon"];
		$max_file_size = 20000000;                 //上传文件大小限制，单位BYTE
		$destination_folder = '../dbimages/upload/'.$year.'/'.$month.'/';     //上传文件路径
		$watermark = 1;                         //是否附加水印(1为加水印,其他为不加水印);
		$watertype = 1;                         //水印类型(1为文字,2为图片)
		$waterposition = 1;                     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
		$waterstring = "五穀人生";              //水印字符串
		$waterimg = "xplore.gif";                //水印图片
		$imgpreview = 1;                         //是否生成预览图(1为生成,其他为不生成);
		$imgpreviewsize = 1 / 2;                 //缩略图比例


		if (is_uploaded_file($_FILES['upfile']['tmp_name'])) {
        $upfile = $_FILES['upfile'];
       //print_r($_FILES['upfile']);

        $name = $upfile['name'];             //文件名

        $type = $upfile['type'];             //文件类型

        $size = $upfile['size'];             //文件大小

        $tmp_name = $upfile['tmp_name'];     //临时文件

        $error = $upfile['error'];          //出错原因


        if ($max_file_size < $size) {        //判断文件的大小

            echo '上传文件太大';
            exit ();
        }

        if (!in_array($type, $uptypes)) {        //判断文件的类型

            echo '上传文件类型不符' . $type;
            exit ();
        }

        if (!file_exists($destination_folder)) {   //判断文件夹是否存在
            mkdir($destination_folder);
        }

        if (file_exists("uploadimg/" . $_FILES["upfile"]["name"])) {
            echo $_FILES["upfile"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["upfile"]["tmp_name"], "uploadimg/" . $_FILES["upfile"]["name"]);
            //echo "Stored in: " . "uploadimg/" . $_FILES["upfile"]["name"];
        }

        $pinfo = pathinfo($name);
        $ftype = $pinfo['extension'];
        $destination = $destination_folder . time() . "." . $ftype;
        if (file_exists($destination) && $overwrite != true) {
            echo "同名的文件已经存在了";
            exit ();
        }
        echo $destination;

        if (!move_uploaded_file($tmp_name, $destination)) {
            echo "移动文件出错";
            exit ();
        }

        $pinfo = pathinfo($destination);
        $fname = $pinfo[basename];
        echo " <font color=red>已经成功上传</font><br>文件名: <font color=blue>" . $destination_folder . $fname . "</font><br>";
        echo " 宽度:" . $image_size[0];
        echo " 长度:" . $image_size[1];
        echo "<br> 大小:" . $file["size"] . " bytes";

        if ($watermark == 1) {
            $iinfo = getimagesize($destination, $iinfo);
            $nimage = imagecreatetruecolor($image_size[0], $image_size[1]);
            $white = imagecolorallocate($nimage, 255, 255, 255);
            $black = imagecolorallocate($nimage, 0, 0, 0);
            $red = imagecolorallocate($nimage, 255, 0, 0);
            imagefill($nimage, 0, 0, $white);
            switch ($iinfo[2]) {
                case 1 :
                    $simage = imagecreatefromgif($destination);
                    break;
                case 2 :
                    $simage = imagecreatefromjpeg($destination);
                    break;
                case 3 :
                    $simage = imagecreatefrompng($destination);
                    break;
                case 6 :
                    $simage = imagecreatefromwbmp($destination);
                    break;
                default :
                    die("不支持的文件类型");
                    exit;
            }

            imagecopy($nimage, $simage, 0, 0, 0, 0, $image_size[0], $image_size[1]);
            imagefilledrectangle($nimage, 1, $image_size[1] - 15, 80, $image_size[1], $white);

            switch ($watertype) {
                case 1 : //加水印字符串

                    imagestring($nimage, 2, 3, $image_size[1] - 15, $waterstring, $black);
                    break;
                case 2 : //加水印图片

                    $simage1 = imagecreatefromgif("xplore.gif");
                    imagecopy($nimage, $simage1, 0, 0, 0, 0, 85, 15);
                    imagedestroy($simage1);
                    break;
            }

            switch ($iinfo[2]) {
                case 1 :
                    //imagegif($nimage, $destination);

                    imagejpeg($nimage, $destination);
                    break;
                case 2 :
                    imagejpeg($nimage, $destination);
                    break;
                case 3 :
                    imagepng($nimage, $destination);
                    break;
                case 6 :
                    imagewbmp($nimage, $destination);
                    //imagejpeg($nimage, $destination);

                    break;
            }

            //覆盖原上传文件

            imagedestroy($nimage);
            imagedestroy($simage);

        }

        if ($imgpreview == 1) {
            echo "<br>图片预览:<br>";
            echo "<img src=\"" . $destination . "\" width=" . ($image_size[0] * $imgpreviewsize) . " height=" . ($image_size[1] * $imgpreviewsize);
            echo " alt=\"图片预览:\r文件名:" . $destination . "\r上传时间:\">";
        }

    }

?>