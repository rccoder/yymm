<?php
namespace app\home\controller;

class Page extends Base{
    function index(){
        return $this->fetch(input('display'));
    }
}