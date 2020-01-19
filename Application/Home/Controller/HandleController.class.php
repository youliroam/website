<?php
namespace Home\Controller;
use Think\Controller;
class HandleController extends Controller {
    public function index(){
    	$res = [
    		'code' => 200,
    		'msg'  => 'ok',
    		'date' => [],
    	];

    	$res['date'] = M('stu')->select();

        echo json_encode($res);
    }

    public function update(){
    	$res = [
    		'code' => 0,
    		'msg'  => 'false',
    	];

    	if(!isset($_GET['id']) || !isset($_GET['file']) || !isset($_GET['value'])){
    		echo json_encode($res);
    		exit;
    	}

    	$User = M("stu"); // 实例化User对象
		// 要修改的数据对象属性赋值
		$data[$_GET['file']] = $_GET['value'];
		$flag = $User->where('id='.$_GET['id'])->save($data); // 根据条件更新记录
		$res['code'] = $flag;
		$res['msg'] = '执行完成';
    	echo json_encode($res);
    }
}