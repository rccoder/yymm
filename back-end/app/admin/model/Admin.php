<?php
namespace app\admin\model;
//admin模型
class Admin extends Base{
    function qs(){
        $this->find();
    }
}