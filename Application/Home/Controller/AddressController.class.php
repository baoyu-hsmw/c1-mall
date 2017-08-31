<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 16:16
 */

namespace Home\Controller;


use Common\Common\HomeBaseControoler;

class AddressController extends HomeBaseControoler
{
    function add(){
        if(I('post.')){
            $is_default = I('post.is_default', 0, 'intval');
            $addressee = I('post.addressee');
            $mobile = I('post.mobile');
            $address = I('post.address');

            if(!($address && $mobile && $addressee)){
                $this->error('请填写完整');
            }

            $model = M('address');
            //把该用户所有的地址的is_default设为0
            if($is_default) {
                $model->where(['user_id' => $this->getUserID()])->save(['is_default' => 0]);
            }

            $data = [
                'is_default' => $is_default,
                'addressee' => $addressee,
                'address' => $address,
                'mobile' => $mobile,
                'user_id' => $this->getUserID(),
            ];
            if($model->add($data)){
                $this->success('添加成功', U('index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

}