<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('<br>这个页面是首页<hr><div>首页就是我</div>','utf-8');
        $this->display('home');
    }
}