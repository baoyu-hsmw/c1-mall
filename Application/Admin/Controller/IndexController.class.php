<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //http://mall.dev/index.php?m=admin&c=index&a=index
        $this->display();
    }
}