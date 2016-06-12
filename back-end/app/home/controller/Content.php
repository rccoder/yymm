<?php
namespace app\home\controller;

use app\admin\model\Content as C;
use app\admin\model\Explore as E;
class Content extends Base{
    //首页
    public function index(){
    	$m=new C();
    	$map['pagesize']=input('?get.pageSize')?input('get.pageSize'):5;//每页显示条数
        $map['order']='sort desc,id desc';
        $map['where']=['cate'=>input('cate')];
        $list=$m->getList($map);
        $this->assign('content',$list);
        //分类名称
        $cate=lang('content_cate');
        $this->assign('catename',$cate[input('cate')]);       
    	return $this->fetch();        
    }
    //探索世界
    public function explore(){
        $m=new E();
        $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):12;//每页显示条数
        $map['order']='sort desc,id desc';
        $list=$m->getList($map);
        $this->assign('content',$list);     
        return $this->fetch();         
    }
    //报名信息
    public function order(){
        $_POST['addtime']=time();
        $rs=db('order')->insert($_POST);
        if($rs){
            return $this->success('报名成功');
        }else{
            return $this->error('报名失败');
        }
    }
}