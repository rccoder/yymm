<?php
namespace app\common\model;
use think\Model;

//全局模型基类
class Base extends Model {
    //获取列表
    public function getList($map=[]){
        $rs=$this->where($map['where'])
                ->order($map['order'])
                ->paginate($pagesize)
                ->toArray();
        return $rs;
    }
}
