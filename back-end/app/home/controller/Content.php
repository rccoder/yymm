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
        $map['where']=['cate'=>input('get.cate')];
        $list=$m->getList($map);
        $this->assign('content',$list);
        //分类名称
        $cate=lang('content_cate');
        $this->assign('catename',$cate[input('cate')]);
        //广告
        $tid=[1=>2,2=>3];
        $ads=db('ads')->where(['tid'=>$tid[input('cate')],'status'=>1])->find();
        $this->assign('ads',$ads);
    	return $this->fetch();        
    }
    //文章详情
    public function show_1(){
        $info=C::get(input('get.id'));
        $this->assign('info',$info->toArray());
        return $this->fetch();   
    }
    public function show_2() {
        $info=C::get(input('get.id'));
        $this->assign('info',$info->toArray());
        return $this->fetch();
    }
    //探索世界
    public function explore(){
        $m=new E();
        $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):12;//每页显示条数
        $map['order']='sort desc,id desc';
        $list=$m->getList($map);
        $this->assign('content',$list); 
        //广告
        $ads=db('ads')->where(['tid'=>4,'status'=>1])->find();
        $this->assign('ads',$ads);
        return $this->fetch();         
    }
    //报名信息
    public function order(){
        $count=db('order')->where($_POST)->count();
        if($count){
            return $this->error('该信息已经被记录，请勿重复提交');
        }
        $_POST['addtime']=time();
        $rs=db('order')->insert($_POST);
        if($rs){
            return $this->success('报名成功');
        }else{
            return $this->error('报名失败');
        }
    }
    //获取校区信息
    public function getCampus(){
        if(input('?get.p')){
            $data=db('campus')->where('province',input('get.p'))->select();
            foreach($data as $v){
                $list[]=$v['campus'];
            }
        }else{
            $data=db('campus')->select();
            foreach($data as $v){
                $list[$v['province']][]=$v['campus'];
            }            
        }
        return json_encode($list);
    }
}