<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //echo phpinfo();
        $this->display('index','utf-8');
    }
}