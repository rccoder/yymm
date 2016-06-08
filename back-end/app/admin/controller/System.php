<?php

namespace app\admin\controller;

use app\admin\model\System as S;
use app\admin\model\Navigation as N;
class System extends Base {
    //网站设置
    public function index() {
        if(IS_POST){
            $data['thumb']=  input('thumb');
            $data['webname']=  input('webname');
            $data['keywords']=  input('keywords');
            $data['description']=  input('description');
            $data['copyright']=  input('copyright');
            $data['address']=  input('address');
            $data['icp']=  input('icp');
            $data['webphone']=  input('webphone');
            $rs=S::where('id',1)->update(['web'=>json_encode($data)]);
            if($rs){
                cache('web',$data); //更新缓存
                $this->json();
            }else{
                $this->json(300);
            }
        }else{
            return $this->fetch();
        }
    }
    //导航设置
    public function navigation(){
        $m=new N();
        if(IS_POST){
            $act=[
                1=> ['target' => 1],//设置为新窗口打开
                2=> ['target' => 0],//取消新窗口打开
                3=> ['show' => 1],  //开启显示
                4=> ['show' => 0],  //关闭显示
            ];
            $rs=$m->save($act[input('get.act')],['id' => input('id')]);
            $rs?$this->json():$this->json(300);          
        }else{
            $map['pagesize']=input('?get.pageSize')?input('get.pageSize'):5;//每页显示条数
            $map['order']='sort desc,id desc';
            $list=$m->getList($map);
            $this->assign('navigation',$list);
            return $this->fetch();
        }
    }
    //导航添加
    public function addNav(){
        $m=new N();
        if(IS_POST){
            $rs=$m->save($_POST);
            $rs?$this->json():$this->json(300);
        }else{
            return $this->fetch();
        }
    }
}