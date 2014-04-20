<?php
    //session_start();
    include("check_is_login.php");
    include("conn/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/php" charset="utf-8">
    <title>五谷人生——管理员页面</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->
    
   <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 
                            <?php 
                            // if(isset($_SESSION["managername"]))
                            // {
                            //   if($_SESSION["managername"]!="")
                            //   {
                            //     echo $_SESSION["managername"]; 
                            //   } 
                            //   else 
                            //     echo "Admin";
                            // }
                            // else
                            //   echo "Admin";
                            ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="managerziliao.php">个人中心</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">设置</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.php">登录</a></li>
                            <li><a tabindex="-1" href="logout.php">退出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="../index.php"><span class="first">五穀</span> <span class="second">人生</span></a>
        </div>
    </div>
 


    
    <div class="sidebar-nav">
        <form class="search form-inline">
            <input type="text" placeholder="Search...">
        </form>

        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>前台展示</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="../index.php">首页</a></li>
            <li ><a href="#">自我测评</a>
              <ul>
            <li ><a href="users.php">体质自检</a></li>
            <li ><a href="users.php">症状自检</a></li>
              </ul>
            </li>
            <li ><a href="user.php">食疗知识</a></li>
            <li ><a href="media.php">膳食推荐</a></li>
            <li ><a href="media.php">食材购买</a></li>
            <li ><a href="calendar.php">养生日历</a></li>
            
        </ul>

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>管理员账户<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="sign-in.php">登录</a></li>
            <li ><a href="sign-up.php">注册</a></li>
            <li><a  href="managerziliao.php">资料</a></li>
            <li><a  href="logout.php">退出</a></li>
            <li ><a href="reset-password.php">找回密码</a></li>
        </ul>
        
         <a href="#user-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>用户管理 <i class="icon-chevron-up"></i></a>
        <ul id="user-menu" class="nav nav-list collapse">
            <li ><a href="adduser.php">添加用户</a></li>
            <li ><a href="scanuser.php">查看用户</a></li>
        </ul>
        

         <a href="#comment-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>评论管理<i class="icon-chevron-up"></i></a>
        <ul id="comment-menu" class="nav nav-list collapse">
            <li ><a href="403.php">审核评论</a></li>
            <li ><a href="404.php">删除评论</a></li>
        </ul>

         <a href="#food-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>膳食管理<i class="icon-chevron-up"></i></a>
        <ul id="food-menu" class="nav nav-list collapse">
            <li ><a href="403.php">添加膳食</a></li>
            <li ><a href="404.php">编辑食谱</a></li>
        </ul>

         <a href="#metarial-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>食材管理<i class="icon-chevron-up"></i></a>
        <ul id="metarial-menu" class="nav nav-list collapse">
            <li ><a href="403.php">添加食材</a></li>
            <li ><a href="404.php">编辑食材</a></li>
        </ul>

         <a href="#tizhi-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>体质管理<i class="icon-chevron-up"></i></a>
        <ul id="tizhi-menu" class="nav nav-list collapse">
            <li ><a href="403.php">编辑体质</a></li>
            
        </ul>

         <a href="#symptoms-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>症状管理<i class="icon-chevron-up"></i></a>
        <ul id="symptoms-menu" class="nav nav-list collapse">
            <li ><a href="403.php">添加症状</a></li>
            <li ><a href="404.php">删除症状</a></li>
            <li ><a href="404.php">修改症状</a></li>

        </ul>
    </div>
            <?php

        /*
         * 参数说明
         * $max_file_size : 上传文件大小限制, 单位BYTE
         * $destination_folder : 上传文件路径
         * $watermark : 是否附加水印(1为加水印,其他为不加水印);
         *
         * 使用说明:
         * 1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库;
         * 2. 将extension_dir =改为你的php_gd2.dll所在目录;
         */

        // 上传文件类型列表

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

        $destination_folder = 'dbimages/';     //上传文件路径

        $watermark = 1;                         //是否附加水印(1为加水印,其他为不加水印);

        $watertype = 1;                         //水印类型(1为文字,2为图片)

        $waterposition = 1;                     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);

        $waterstring = "五穀人生"; //水印字符串

        $waterimg = "wugurensheng.gif";                //水印图片

        $imgpreview = 1;                         //是否生成预览图(1为生成,其他为不生成);

        $imgpreviewsize = 1 / 2;                 //缩略图比例

        ?>
    
    <div class="row-fluid">
        <div class="dialog">
            <div class="block">
                <p class="block-heading">添加膳食</p>
                <div class="block-body">
               <!--  <form action="addfooddeal.php" method="post" name="upfile" enctype="multipart/form-data">
                        <label>膳食名称</label>
                        <input type="text" class="span12" name="foodname">
                         <label>适用体质</label>
                        <select name="foodtype" class="span12">
                            <option value="0">----选择体质----</option>
                            <option value="1">和平质</option>
                            <option value="2">气虚质</option>
                            <option value="3">阳虚质</option>
                            <option value="4">阴虚质</option>
                            <option value="5">痰湿质</option>
                            <option value="6">湿热质</option>
                            <option value="7">气郁质</option>
                            <option value="8">瘀血质</option>
                            <option value="9">特禀质</option>       
                        </select>
                        <label for="upfile">上传图片</label>
                        <input type="file" name="upfile" class="span12" />
                        <label>膳食描述</label>
                        <textarea class="span12" name="fooddesc" rows="5">
                            
                        </textarea> 
                        <label>膳食描述</label>
                        <textarea class="span12" name="details" rows="15">
                            
                        </textarea>
                        <input type="submit" name="submit" value="添加"  class="btn btn-primary pull-right"/>
                        <label class="remember-me"><input type="reset"></label>
                        <div class="clearfix"></div>
                    </form>-->   
                    <form action="addfooddeal.php" method="post" name="upfile" enctype="multipart/form-data">
                         <label>膳食id</label>
                        <input type="text" class="span12" name="foodname">
                        <label>膳食名称</label>
                        <input type="text" class="span12" name="foodname">
                         <label>适用体质</label>
                        <select name="foodtype" class="span12">
                            <option value="0">----选择体质----</option>
                            <option value="1">和平质</option>
                            <option value="2">气虚质</option>
                            <option value="3">阳虚质</option>
                            <option value="4">阴虚质</option>
                            <option value="5">痰湿质</option>
                            <option value="6">湿热质</option>
                            <option value="7">气郁质</option>
                            <option value="8">瘀血质</option>
                            <option value="9">特禀质</option>       
                        </select>
                        <label for="upfile">上传图片</label>
                        <input type="file" name="upfile" class="span12" />
                        <label>膳食描述</label>
                        <textarea class="span12" name="fooddesc" rows="5">
                            
                        </textarea> 
                        <label>膳食描述</label>
                        <textarea class="span12" name="details" rows="15">
                            
                        </textarea>
                        <input type="submit" name="submit" value="添加"  class="btn btn-primary pull-right"/>
                        <label class="remember-me"><input type="reset"></label>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <p class="pull-right" style=""><a href="../index.php" target="blank">Wugu Rensheng</a></p>
            <p><a href="index.php">返回</a>五穀人生</p>
        </div>
    </div>
   <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //判断是否有上传文件

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

            if (file_exists("dbimages/" . $_FILES["upfile"]["name"])) {
                echo $_FILES["upfile"]["name"] . " 已经存在同名文件。";
            } else {
                move_uploaded_file($_FILES["upfile"]["tmp_name"], "dbimages/" . $_FILES["upfile"]["name"]);
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

            // if (!move_uploaded_file($tmp_name, $destination)) {
            //    // echo "移动文件出错";
            //     exit ();
            //}

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

    }
    ?>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
     </script>
    
  </body>
</html>


