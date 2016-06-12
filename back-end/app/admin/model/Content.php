<?php
namespace app\admin\model;
//content模型
class Content extends Base{
    //获取列表
    public function getList($map=[]){
        $rs=$this->where($map['where'])
                ->order($map['order'])
                ->paginate($map['pagesize']);
        $data=$rs->toArray();
        $data['page']=$rs->render();
        $cate=lang('content_cate');
        foreach ($data['data'] as &$v) {
        	$v['catename']=$cate[$v['cate']];
        }
        return $data;
    }
}