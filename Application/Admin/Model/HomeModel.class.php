<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/15
 * Time: 22:21
 */
namespace Admin\Model;
use Think\Model;
class HomeModel extends Model{

    protected $tableName = 'menu';
    public function getMenu(){
        $init_data = $this->where('status=0')->select();
        $res = $this->recursionMenu($init_data,0);
        return $res;
    }

    /**
     * 递归菜单
     * @param $arr
     * @param $parent_id
     *
     */
    public function recursionMenu($arr,$parent_id){
        $res = [];
        foreach($arr as $k=>$v){
            if($v['parent_id'] == $parent_id){
                $v['children'] = $this->recursionMenu($arr,$v['id']);//这里的$arr可以缩小范围的，可优化
                $res[] = $v;
            }
        }
        return $res;
    }
}