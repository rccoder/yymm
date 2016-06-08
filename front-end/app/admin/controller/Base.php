<?php
namespace app\admin\controller;

//admin模块控制器基类
class Base extends \app\common\controller\Base{
    public function _initialize(){
        parent::_initialize();
        $this->assign('page_list',[20,50,100]); //可选页码大小
    }
    //json输出
    public function json($status=200,$msg="",$data=array()){
        if($msg==""){
            $status==200?$msg=lang('handle_success'):$status==300&&$msg=lang('handle_error');
        }
        $return['statusCode']=$status;
        $return['message']=$msg;
        die(json_encode(array_merge($return,$data)));
    }
}