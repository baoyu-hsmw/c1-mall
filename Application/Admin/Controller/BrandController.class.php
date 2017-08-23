<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 14:51
 */

namespace Admin\Controller;


use Common\Common\AdminBaseController;
use Think\Page;

class BrandController extends AdminBaseController
{
    private function getModel(){
        return M('brand');
    }
    function index(){
        $model = $this->getModel();
        $page = I('get.p', 0, 'intval');
        $page_size = 25;
        $where = ['is_del' => 0];
        $result = $model->where($where)->page("{$page},{$page_size}")->select();
        $count = $model->where($where)->count();

        $page_obj = new Page($count, $page_size);
        $page_obj->setConfig();
        $show = $page_obj->show();

        $this->assign('result', $result);
        $this->assign('show', $show);

        $this->display();
    }
    function add(){
        if(I('post.')){
            $name = I('post.name');
            if(!$name){
                E('请填写完整');
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Brand/'; // 设置附件上传（子）目录
            $upload->autoSub = false;
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            /* array(1) { ["logo"]=> array(9) { ["name"]=> string(10) "Desert.jpg" ["type"]=> string(10) "image/jpeg" ["size"]=> int(845941) ["key"]=> string(4) "logo" ["ext"]=> string(3) "jpg" ["md5"]=> string(32) "ba45c8f60456a672e003a875e469d0eb" ["sha1"]=> string(40) "30420d1a9afb2bcb60335812569af4435a59ce17" ["savename"]=> string(17) "599d290e381c1.jpg" ["savepath"]=> string(6) "Brand/" } } */
            $logo = $info['logo']['savename'];
            $data = [
                'name' => $name,
                'is_del' => 0,
                'logo' => $logo,
            ];
            if($this->getModel()->add($data)){
                $this->success('添加成功', U('index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }
    function edit(){
        $id = I('get.id', 0, 'intval');
        if(!$id){
            throw new \Exception('参数错误');
        }
        if(I('post.')){
            $name = I('post.name');
            if(!$name){
                E('请填写完整');
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'Brand/'; // 设置附件上传（子）目录
            $upload->autoSub = false;
            // 上传文件
            $info   =   $upload->upload();
            $data = [
                'name' => $name,
                'is_del' => 0,

            ];
            $logo = '';
            if(isset($info['logo'])) {
                $logo = $info['logo']['savename'];
                $data['logo'] = $logo;
            }

            if($this->getModel()->where(['id'=>$id])->save($data)){
                $this->success('修改成功', U('index'));
            } else {
                $this->error('修改失败');
            }
        } else {
            $model = $this->getModel();
            $result = $model->where(['id'=>$id])->find();
            if(!$result){
                E('不存在的记录');
            }
            $this->assign('result', $result);
            $this->display();
        }
    }

    function del(){
        $id = I('get.id', 0, 'intval');
        if(!$id){
            throw new \Exception('参数错误');
        }
        if($this->getModel()->where(['id'=>$id])->save(['is_del'=>1])){
            $this->success('删除成功', U('index'));
        } else{
            $this->error('删除失败');
        }
    }

}