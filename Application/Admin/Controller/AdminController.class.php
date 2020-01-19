<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/13
 * Time: 15:04
 */

namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller {
    public function login(){

        $username  =  I('post.username');  // 获取post变量
        $password  =  I('post.password');  // 获取post变量

        $admin = M("admin");
        $data = $admin->where('username="'.$username.'" AND password="'.$password.'"')->find();
        if($data){
            session('user_id',$data);
            return $this->ajaxReturn(true);
        }else{
            return $this->ajaxReturn(false);
        }
    }

    public function logout(){
        try{
            session('user_id',null);
            return $this->ajaxReturn(true);
        }catch(\Exception $e){
            return $this->ajaxReturn(false);
        }


    }
}