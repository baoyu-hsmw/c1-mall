<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 10:41
 */

namespace Admin\Controller;


use Common\Common\AdminBaseController;

class GoodsCatController extends AdminBaseController
{
    private $model;
    protected function _initialize(){
        parent::_initialize();
        //这种写法能让你的代码更优美, 但同时会让数据库保持长连接
        //违背了近晚连接,尽早关闭
        $this->model = M('goods_cat');
    }
    function index(){
       $result= $this->model->where(['is_del'=>0])->order('`id` ASC')->select();
       $this->assign('result', $result);
       $this->display();
    }

    function add(){
        if(I('post.')){
            $name = I('post.name');
            if(!$name){
                E('请填写完整');
            }
            $data = [
                'name' => $name,
                'is_del' => 0,
            ];
            if($this->model->add($data)){
                $this->success('添加成功', U('index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    function del(){
        $id = I('get.id', 0, 'intval');
        if(!$id){
            throw new \Exception('参数错误');
        }
        if($this->model->where(['id'=>$id])->save(['is_del'=>1])){
            $this->success('删除成功', U('index'));
        } else{
            $this->error('删除失败');
        }
    }

    function edit(){
        $id = I('get.id', 0, 'intval');
        if(!$id){
            throw new \Exception('参数错误');
        }

        if($_POST){
            $name = I('post.name');
            if(!$name){
                E('请填写完整');
            }
            $data = [
                'name' => $name,
                'is_del' => 0,
            ];
            if($this->model->where(['id'=>$id])->save($data)){
                $this->success('修改成功', U('index'));
            } else {
                $this->error('修改失败');
            }
            die;
        }

        $result = $this->model->where(['id'=>$id])->find();
        if(!$result){
            E('不存在的记录');
        }

        $this->assign('result', $result);
        $this->display();
    }

}