<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/14
 * Time: 20:07
 */

namespace Admin\Controller;


use Think\Controller;
use Admin\Model\HomeModel;

class HomeController extends AuthController
{

    /**
     * 基础页面
     */
    public function index(){
        $assign_data = session('user_id');
        $this->assign($assign_data);
        $this->display('index');
    }

    /**
     * 首页
     */
    public function home(){
        $array['name']    =    'thinkphp';
        $array['email']   =    'liu21st@gmail.com';
        $array['phone']   =    '12335678';
        $this->assign($array);
        $this->display('home');
    }

    /**
     * 获取菜单
     */
    public function getMenu(){
        $home_model = new HomeModel();
        $data = $home_model->getMenu();
        $this->ajaxReturn($data);
    }
}