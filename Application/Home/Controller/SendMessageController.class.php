<?php
namespace Home\Controller;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Think\Controller;
class SendMessageController extends Controller {
    public function index(){
        $a = new AMQPStreamConnection();
        var_dump($a);
        $this->show('这个页面是首页','utf-8');
    }
}