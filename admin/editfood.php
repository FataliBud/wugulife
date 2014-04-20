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
    
    
    <div class="row-fluid">
        <div class="dialog">
            <div class="block">
                <p class="block-heading">编辑膳食</p>
                <div class="block-body">
                    <form action="login_chk.php" method="post" name="myform">
                        <label>用户名</label>
                        <input type="text" class="span12" name="managername">
                        <label>密码</label>
                        <input type="password" class="span12" name="managerpwd">
                        <!-- <a href="index.html" class="btn btn-primary pull-right" onclick="submitForm(document.myform)" >登录</a> -->
                        <input type="submit" name="submit" value="登录"  class="btn btn-primary pull-right"/>
                        <label class="remember-me"><input type="checkbox"> 记住我</label>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <p class="pull-right" style=""><a href="http://www.portnine.com" target="blank">Qihuang Yangsheng</a></p>
            <p><a href="reset-password.html">记住密码?</a></p>
        </div>
    </div>


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
     </script>
    
  </body>
</html>


