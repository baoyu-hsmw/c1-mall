<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 15:59
 */

namespace Home\Controller;


use Common\Common\Constant;
use Common\Common\HomeBaseControoler;

class OrderController extends HomeBaseControoler
{
    function create(){
        if(I('post.')) {
            $address_id = I('post.address', 0, 'intval');
            if(!$address_id){
                $this->error('请选择地址');
            }
            //就是把购物车里的商品信息放到ORDER表里
            $cart_str = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : NULL;
            $cart = json_decode($cart_str, true);
            if (!(json_last_error() === JSON_ERROR_NONE && $cart && is_array($cart))) {
                $this->error('购物车为空');
            }

            $total_price = 0; //价格的总和
            $total_num = 0; //数量的总和

            $order_goods_data = [];

            foreach ($cart as $row) {
                $total_price += $row['price'];
                $total_num += $row['num'];
                $goods_item = [
                    'goods_id' => $row['id'],
                    'num' => $row['num'],
                ];
                $order_goods_data[] = $goods_item;
            }

            if($total_price < 99){
                $total_price += 6;
            }

            //Order表
            $order_data = [
                'goods_num' => $total_num,
                'amount' => $total_price,
                'user_id' => $this->getUserID(),
                'address_id' =>$address_id,
                'status' => Constant::ORDER_WAIT_FOR_PAY,
                'is_del' => Constant::UNDELETED,
            ];

            $model = M('order');
            $order_id = $model->add($order_data);
            unset($model);
            if(!$order_id){
                E('入库失败');
            }

            $order_goods_data = array_map(function($row) use($order_id){
                $row['order_id'] =  $order_id;
                return $row;
            }, $order_goods_data);

            $model = M('order_goods');
            $model->addAll($order_goods_data);

            //清空购物车
            setcookie('cart', NULL, strtotime('-1 year'));
            $_COOKIE['cart'] = NULL;
            unset($_COOKIE['cart']);

            $this->success('创建订单成功,请支付', U('pay', ['order_id' => $order_id]));


        } else {
            $model = M('address');
            $result = $model->where(['is_del' => 0, 'user_id'=>$this->getUserID()])->order('`is_default` DESC, `id` ASC')->select();
            $this->assign('address_list', $result);
            $this->display();
        }

    }

    function pay(){
        $order_id = I('get.order_id', 0, 'intval');
        if(!$order_id){
            $this->error('参数错误');
        }
        if(I('post.')){
            //$pay = I('post.pay');
            $model = M('order');
            if($model->where(['id'=>$order_id])->save(['status'=>Constant::ORDER_PAY_SUCCESS])){
                $this->success('支付成功,请等待发货', U('index'));
            } else {
                $this->error('支付失败');
            }

        } else {
            $this->display();
        }
    }
}