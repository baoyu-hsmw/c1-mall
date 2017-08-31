<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>掌圈龙南</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/Public/index/css/bootstrap.min.css"  type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Public/index/css/style.css">


    <!-- Custom Fonts -->
    <link rel="stylesheet" href="/Public/index/font-awesome/css/font-awesome.min.css"  type="text/css">
    <link rel="stylesheet" href="/Public/index/fonts/font-slider.css" type="text/css">

    <!-- jQuery and Modernizr-->
    <script src="/Public/index/js/jquery-2.1.1.js"></script>

    <!-- Core JavaScript Files -->
    <script src="/Public/index/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/index/js/html5shiv.js"></script>
    <script src="/Public/index/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--Top-->
<nav id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6">
                <ul class="top-link">
                    <li><a href="account.html"><span class="glyphicon glyphicon-user"></span> 我的掌圈</a></li>
                    <li><a href="contact.html"><span class="glyphicon glyphicon-envelope"></span> 联系客服</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--Header-->
<header class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="logo"><img src="/Public/index/images/logo.png" /></div>
        </div>
        <div class="col-md-4">
            <form class="form-search" method="get" action="<?php echo U('goods/search');?>" id="frmSearch">
                <input type="text" class="input-medium search-query" id="keyword" name="keyword" placeholder="在此输入关键字">
                <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="col-md-4">
            <div id="cart"><a class="btn btn-1" href="<?php echo U('cart/index');?>"><span class="glyphicon glyphicon-shopping-cart"></span>购物车 : <?php echo ($_cart_item_num_); ?> 件商品</a></div>
        </div>
    </div>
</header>
<!--Navigation-->
<nav id="menu" class="navbar">
    <div class="container">
        <div class="navbar-header"><span id="heading" class="visible-xs">分类</span>
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.html">首页</a></li>
                <?php if(is_array($_goods_cat_list_)): $i = 0; $__LIST__ = $_goods_cat_list_;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('goods/index', [cat => $row['id']]);?>"><?php echo ($row["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>


            </ul>
        </div>
    </div>
</nav>
<!--//////////////////////////////////////////////////-->
<!--/////////////////// Page body //////////////////////-->
<!--//////////////////////////////////////////////////-->
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="cart.html">Cart</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="heading"><h2>登陆</h2></div>
				<form name="form1" id="ff1" method="post" action="<?php echo U('login');?>">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="用户名 :" name="username" id="username_login" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="密码 :" name="password" id="password_login" required>
					</div>
					<button type="submit" class="btn btn-1" name="login" id="login">登陆</button>
					<a href="#">忘记密码?</a>
				</form>
			</div>
			<div class="col-md-6">
				<div class="heading"><h2>新用户? 创建一个账号.</h2></div>
				<form name="form2" id="ff2" method="post" action="<?php echo U('register');?>">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="用户名 :" name="username" id="username_register" required>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email :" name="email" id="email_register" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Mobile :" name="mobile" id="mobile_register" required>
					</div>
					<div class="form-group">
						<input name="gender" id="gender_1" value="1" type="radio"> 男 <input name="gender" id="gender_0" type="radio" value="0"> 女
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="密码 :" name="password" id="password_register" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="重复密码 :" name="repassword" id="repassword" required>
					</div>
					<div class="form-group">
						<input name="agree" id="agree" type="checkbox" value="1" checked required > 我同意服务条款.
					</div>
					<button type="submit" class="btn btn-1">注册</button>
				</form>
			</div>
		</div>
	</div>
</div>
<footer>
    <div class="container">
        <div class="wrap-footer">
            <div class="row">
                <div class="col-md-3 col-footer footer-1">
                    <img src="/Public/index/images/logofooter.png" />
                    <p>本商城使用最牛鼻的技术,经过2位经验丰富,技能一流的研发工程师,耗资10000万人民币,耗时3年倾力打造而成. 是为推动中国的经济发展和互联网技术的腾飞.</p>
                </div>
                <div class="col-md-3 col-footer footer-2">
                    <div class="heading"><h4>客户服务</h4></div>
                    <ul>
                        <li><a href="#">关于我们</a></li>
                        <li><a href="#">物流信息</a></li>
                        <li><a href="#">隐私策略</a></li>
                        <li><a href="#">团队荣誉</a></li>
                        <li><a href="#">联系我们</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-footer footer-3">
                    <div class="heading"><h4>我的掌圈</h4></div>
                    <ul>
                        <li><a href="#">账户信息</a></li>
                        <li><a href="#">品牌</a></li>
                        <li><a href="#">礼品卡</a></li>
                        <li><a href="#">特别关注</a></li>
                        <li><a href="#">网站地图</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-footer footer-4">
                    <div class="heading"><h4>联系我们</h4></div>
                    <ul>
                        <li><span class="glyphicon glyphicon-home"></span>江西龙南商贸街22号</li>
                        <li><span class="glyphicon glyphicon-earphone"></span>+86 79735888888</li>
                        <li><span class="glyphicon glyphicon-envelope"></span>mall@jx1860.net</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Copyright &copy; 2017 掌圈龙南 All rights reserved.
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <ul>
                            <li><img src="/Public/index/images/visa-curved-32px.png" /></li>
                            <li><img src="/Public/index/images/paypal-curved-32px.png" /></li>
                            <li><img src="/Public/index/images/discover-curved-32px.png" /></li>
                            <li><img src="/Public/index/images/maestro-curved-32px.png" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    $(function () {
       $('#frmSearch').submit(function(){
          var keyword = $('#keyword').val();
          if(!keyword){
              alert('请输入关键字');
              return false;
          }
          var url = $(this).attr('action');
          url += '&keyword=' + keyword;
          location.href = url;
          return false;
       });
    });
</script>
</body>
</html>