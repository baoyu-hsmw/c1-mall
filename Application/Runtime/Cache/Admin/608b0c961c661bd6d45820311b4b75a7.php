<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>商城管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Public/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('index/index');?>">商城管理</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->

            <!-- /.dropdown -->

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="<?php echo U('index/logout');?>"><i class="fa fa-sign-out fa-fw"></i> 注销</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo U('index/index');?>"><i class="fa fa-dashboard fa-fw"></i> 控制板</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 商品<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo U('goods/index');?>">商品列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('goods/add');?>">添加商品</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 商品分类<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo U('GoodsCat/index');?>">商品分类列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('goodsCat/add');?>">添加商品分类</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 品牌<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo U('brand/index');?>">品牌列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('brand/add');?>">添加品牌</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
<script type="text/javascript" charset="utf-8" src="/Public/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ue/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Public/ue/lang/zh-cn/zh-cn.js"></script>
<h1 class="page-header">修改商品</h1>
<form action="/index.php?m=Admin&amp;c=goods&amp;a=edit&amp;id=1" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">商品名称*</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="商品名称" value="<?php echo ($product_info["name"]); ?>" />
    </div>

    <div class="form-group">
        <label for="goods_cat_id">分类*</label>
        <select name="goods_cat_id" id="goods_cat_id" class="form-control">
            <option value="">--请选择--</option>
            <?php if(is_array($cat_list)): $i = 0; $__LIST__ = $cat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($product_info["goods_cat_id"] == $row['id']): ?><option value="<?php echo ($row["id"]); ?>" selected="selected"><?php echo ($row["name"]); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($row["id"]); ?>"><?php echo ($row["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="price">当前价格*</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="当前价格"  value="<?php echo ($product_info["price"]); ?>" />
    </div>
    <div class="form-group">
        <label for="original_price">原价格*</label>
        <input type="text" class="form-control" id="original_price" name="original_price" placeholder="原价格"  value="<?php echo ($product_info["original_price"]); ?>" />
    </div>
    <div class="form-group">
        <label for="inventory">库存*</label>
        <input type="text" class="form-control" id="inventory" name="inventory" placeholder="库存"  value="<?php echo ($product_info["inventory"]); ?>" />
    </div>

    <div class="form-group">
        <label for="logo_1">图片*</label>
        <input type="file" class="form-control" id="logo_1" name="logo_1"  />
        <?php if(!empty($imgs[0])): ?><div>
            <img src="Uploads/Goods/<?php echo ($imgs["0"]["src"]); ?>" style="width: 100px; height: 50px;" />

        </div><?php endif; ?> <input type="text" value="<?php echo ($imgs["0"]["id"]); ?>" name="logo_id_1" />
        <input type="file" class="form-control" id="logo_2" name="logo_2"  />
        <?php if(!empty($imgs[1])): ?><div>
                <img src="Uploads/Goods/<?php echo ($imgs["1"]["src"]); ?>" style="width: 100px; height: 50px;" />

            </div><?php endif; ?><input type="text" value="<?php echo ($imgs["1"]["id"]); ?>" name="logo_id_2" />
        <input type="file" class="form-control" id="logo_3" name="logo_3"  />
        <?php if(!empty($imgs[2])): ?><div>
                <img src="Uploads/Goods/<?php echo ($imgs["2"]["src"]); ?>" style="width: 100px; height: 50px;" />

            </div><?php endif; ?><input type="text" value="<?php echo ($imgs["2"]["id"]); ?>" name="logo_id_3" />
        <input type="file" class="form-control" id="logo_4" name="logo_4"  />
        <?php if(!empty($imgs[3])): ?><div>
                <img src="Uploads/Goods/<?php echo ($imgs["3"]["src"]); ?>" style="width: 100px; height: 50px;" />

            </div><?php endif; ?><input type="text" value="<?php echo ($imgs["3"]["id"]); ?>" name="logo_id_4" />
    </div>
    <div class="form-group">
        <label for="descript">描述*</label>
        <textarea name="descript" id="descript" cols="30" rows="10"><?php echo ($product_info["descript"]); ?></textarea>
    </div>
    <div class="form-group">
        <label for="brand_id">品牌</label>
        <select name="brand_id" id="brand_id" class="form-control">
            <option value="">--请选择--</option>
            <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($product_info["brand_id"] == $row['id']): ?><option value="<?php echo ($row["id"]); ?>" selected="selected"><?php echo ($row["name"]); ?></option>
                    <?php else: ?>
                    <option value="<?php echo ($row["id"]); ?>"><?php echo ($row["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" value="提交" />
</form>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('descript');
</script>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/Public/admin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Public/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/Public/admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/Public/admin/dist/js/sb-admin-2.js"></script>

<script>
    $(function(){
        $('.mall-delete').click(function(){
            var result = confirm('是否删除?');
            if(!result){
                return false;
            }

        });
    });
</script>

</body>

</html>