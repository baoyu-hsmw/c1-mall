<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 15:24
 */

namespace Home\Controller;


use Common\Common\HomeBaseControoler;
use Common\Common\Util;

class UserController extends HomeBaseControoler
{
    function register(){

        if(!$_POST){
            $this->error('请从正规渠道访问本页');
        }

        $username = I('post.username');
        $email = I('post.email');
        $mobile = I('post.mobile');
        $gender = I('post.gender', 0, 'intval');
        $password = I('post.password');
        $repassword = I('post.repassword');
        $agree = I('post.agree', 0, 'intval');

        if(!($username && $password && $agree)){
            $this->error('请填写完整');
        }

        if($password !== $repassword){
            $this->error('两次输入的密码不一致');
        }

        $password_salt = Util::password($password);

        $data = [
            'username' => $username,
            'email' => $email,
            'mobile' => $mobile,
            'gender' => $gender,
            'password' => $password_salt[0],
            'salt' => $password_salt[1],
            'is_del' => 0
        ];

        $model = M('user');
        if($model->add($data)){
            $this->success('恭喜,注册成功', U('account'));
        } else {
            $this->error('注册失败');
        }

    }

    function login(){
        if(!$_POST){
            $this->error('请从正规渠道访问本页');
        }
        $username = I('post.username');
        $password = I('post.password');
        if(!($username && $password)){
            $this->error('请填写完整');
        }
        $model = M('user');
        $result = $model->where(['username' => $username, 'is_del' => 0])->find();
        unset($model);
        if(!$result){
            $this->error('用户名或密码错误');
        }
        $password_from_db = $result['password'];
        $salt_from_db = $result['salt'];

        $password_input = Util::password($password, $salt_from_db);
        if($password_from_db !== $password_input){
            $this->error('用户名或密码错误');
        }
        Session('user', $result);
        $this->success('登陆成功', U('Goods/index'));
    }

    function account(){
        $this->display();
    }

}