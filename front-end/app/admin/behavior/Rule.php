<?php
namespace app\admin\behavior;

use think\Controller;
//权限控制
class Rule extends Controller {
    public function run(){
        if(CONTROLLER_NAME!='login'&&!session('admin_id')){
            return $this->error(lang('login_no'),  url('Login/index'));
        }elseif(CONTROLLER_NAME=='login'&&session('admin_id')&&ACTION_NAME=='index'){
            return $this->redirect('Index/index');
        }
    }
}