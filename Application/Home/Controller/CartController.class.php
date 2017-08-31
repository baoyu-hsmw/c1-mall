<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 15:32
 */

namespace Home\Controller;


use Common\Common\HomeBaseControoler;

class CartController extends HomeBaseControoler
{
    function index(){
        $cart_str = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : NULL;
        $cart = json_decode($cart_str, true);
        if(json_last_error() !== JSON_ERROR_NONE){
            $cart = [];
        }
        $this->assign('cart_items', $cart);
        $this->display();
    }
    function add(){
        $goods_id = I('get.id', 0, 'intval');
        if(!$goods_id){
            E('参数错误');
        }
        $model = M('v_goods_list');
        $result = $model->field('`name`,`price`,`cover`,`brand_name`,`original_price`')->where(['id' => $goods_id])->find();
        unset($model);
        if(!$result){
            E('没有记录');
        }

        $data = $result;
        $data['id'] = $goods_id;
        $data['num'] = 1;

        //先读出已经在购物车的商品
        $goods_in_cart_str = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : '' ;
        //解码
        $goods_in_cart = json_decode($goods_in_cart_str, true);
        //如果购物车为空,那么会造成解码失败.此时,给它一个空数组
        if($goods_in_cart == NULL){
            $goods_in_cart = [];
        }
        //将本次购物车里的加到原有购物车
        if(isset($goods_in_cart[$goods_id])){
            $goods_in_cart[$goods_id]['num'] = $goods_in_cart[$goods_id]['num'] + 1;
        } else {
            $goods_in_cart[$goods_id] = $data;
        }

        //这里有问题
        setcookie('cart', json_encode($goods_in_cart), strtotime('+1 year'));

        $this->success('成功添加到购物车');
    }
    function add1(){
        $goods_id = I('get.id', 0, 'intval');
        if(!$goods_id){
            E('参数错误');
        }
        $model = M('goods');
        $result = $model->field('`name`,`price`,`cover`')->where(['id' => $goods_id])->find();
        unset($model);
        if(!$result){
            E('没有记录');
        }

        $data = $result;
        $data['id'] = $goods_id;
        $data['num'] = 1;

        //先读出已经在购物车的商品
        $goods_in_cart_str = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : '' ;
        //解码
        $goods_in_cart = json_decode($goods_in_cart_str, true);
        //如果购物车为空,那么会造成解码失败.此时,给它一个空数组
        if($goods_in_cart == NULL){
            $goods_in_cart = [];
        }
        //将本次购物车里的加到原有购物车
        $goods_in_cart[] = $data;

        //这里有问题
        setcookie('cart', json_encode($goods_in_cart), strtotime('+1 year'));

        $this->success('成功添加到购物车');
    }
}