<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 15:32
 */

namespace Common\Common;


use Think\Controller;

class HomeBaseControoler extends Controller
{
    protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix=''){
        //先计算出购物车的数量
        $cart_str = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : NULL;
        $cart = json_decode($cart_str, true);
        if(json_last_error() !== JSON_ERROR_NONE){
            $cart_item_num = 0;
        } else {
            $cart_item_num = count($cart);
        }
        //把数量赋值给模板
        $this->assign('_cart_item_num_', $cart_item_num);

        //导航部分的商品分类
        $model = M('goods_cat');
        $result = $model->where(['is_del' => 0])->order('`id` ASC')->select();
        unset($model);

        $this->assign('_goods_cat_list_', $result);

        parent::display($templateFile, $charset, $contentType, $content, $prefix);
    }
}