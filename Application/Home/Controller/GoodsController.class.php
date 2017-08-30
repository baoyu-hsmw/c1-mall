<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 16:13
 */

namespace Home\Controller;


use Common\Common\Constant;
use Common\Common\HomeBaseControoler;
use Think\Page;

class GoodsController extends HomeBaseControoler
{
    function index() {
        $page = I('get.p', 0, 'intval');
        $page_size = 9;
        $cat_id = I('get.' . Constant::GOODS_CAT_ARG_NAME, 0, 'intval');

        $where = [
            'is_del' => Constant::UNDELETED,
            'status' => Constant::GOODS_STATUS_ON,
        ];

        if($cat_id){
            $where['goods_cat_id'] = $cat_id;
        }

        $model = M('v_goods_list');
        $result = $model->where($where)->page("{$page},{$page_size}")->order('`id` DESC')->select();
        $count = $model->where($where)->count();
        $page_obj = new Page($count, $page_size);
        $show = $page_obj->show();

        $this->assign('result', $result);
        $this->assign('show', $show);
        $this->display();
    }

    function search(){

    }

    function detail(){

    }
}