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
					<li><a href="index.html">掌圈龙南</a></li>
					<li><a href="index.html">商品搜索</a></li>
					<li><a href="cart.html">关键字: <?php echo ($keyword); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div id="main-content" class="col-md-8">
				<!-- 行, 开始 -->
				<div class="row">
					<div class="col-md-12">
						<div class="products">
							<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><!-- 列, 开始 -->
							<div class="col-lg-4 col-md-4 col-xs-12">
								<div class="product">
									<div class="image"><a href="product.html"><img src="Uploads/Goods/<?php echo ($row["cover"]); ?>" /></a></div>
									<div class="buttons">
										<a class="btn cart" href="<?php echo U('cart/add', [id=>$row['id']]);?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
										<a class="btn wishlist" href="#"><span class="glyphicon glyphicon-heart"></span></a>

									</div>
									<div class="caption">
										<div class="name"><h3><a href="product.html"><?php echo ($row["name"]); ?></a></h3></div>
										<div class="price">￥<?php echo ($row["price"]); ?><span>￥<?php echo ($row["original_price"]); ?></span></div>
										<div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></div>
									</div>
								</div>
							</div>
							<!-- 列, 结束 --><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<!-- 行, 结束 -->

				<div class="row text-center">
					<ul class="pagination">
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul>
				</div>
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