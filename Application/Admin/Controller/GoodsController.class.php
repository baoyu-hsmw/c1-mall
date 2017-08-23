<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 15:45
 */

namespace Admin\Controller;


use Common\Common\AdminBaseController;

class GoodsController extends AdminBaseController
{
    function index(){

    }
    function add(){
        if(I('post.')){
            $name = I('post.name');
            $goods_cat_id = I('post.goods_cat_id', 0, 'intval');
            $price = I('post.price', 0, 'floatval');
            $original_price = I('post.original_price', 0, 'floatval');
            $inventory = I('post.inventory', 0, 'intval');
            $descript = I('post.descript');
            $brand_id = I('post.brand_id', 0, 'intval');
            $imgs = [];

            if(!($name && $goods_cat_id && $price && $original_price && $descript)){
                E('请填写完整');
            }

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Goods/'; // 设置附件上传（子）目录
            $upload->autoSub = false;
            // 上传文件
            $info   =   $upload->upload();

            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                foreach($info as $file){
                    $imgs[] = $file['savename'];
                }
            }

            $data = [
                'name' => $name,
                'goods_cat_id' => $goods_cat_id,
                'price' => $price,
                'original_price' => $original_price,
                'inventory' => $inventory,
                'descript' => $descript,
                'brand_id' => $brand_id,
                'dateline' => time(),
                'rate' => 0, //修改时,此字段不能动
                'saled_num' =>0,//修改时,此字段不能动
                'cover' => $imgs[0],
                'status' => 0,
                'is_del' => 0,
            ];


            $model_goods = M('goods');
            $model_img = M('goods_img');
            $goods_id = $model_goods->add($data);
            foreach ($imgs as $img){
                $data_img = [
                    'src' => $img,
                    'is_del' => 0,
                    'goods_id' => $goods_id,
                ];
                $model_img->add($data_img);
            }
            $this->success('操作成功', U('index'));
        } else {
            $model_brand = M('brand');
            $brand_list = $model_brand->where(['is_del' => 0])->select();
            $model_cat = M('goods_cat');
            $cat_list = $model_cat->where(['is_del' => 0])->select();
            $this->assign('brand_list', $brand_list);
            $this->assign('cat_list', $cat_list);
            $this->display();
        }
    }
}