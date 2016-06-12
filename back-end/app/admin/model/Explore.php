<?php

namespace app\admin\model;

//Explore
class Explore extends Base {

    //获取列表
    public function getList($map = []) {
        $rs = $this->where($map['where'])
                ->order($map['order'])
                ->paginate($map['pagesize']);
        $data = $rs->toArray();
        $data['page'] = $rs->render();
        return $data;
    }

}
