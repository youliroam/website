<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/14
 * Time: 13:29
 */

namespace Admin\Controller;


use Think\Controller;

class AuthController extends Controller{
    public function _initialize(){
        $data = session('user_id');
        if(!$data){
            $this->error('请登录','/admin/index/index',3);
        }
    }
}