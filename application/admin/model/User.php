<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-19
 * Time: 13:27
 */
namespace app\admin\model;

use app\admin\model\BaseModel;

class User extends BaseModel
{
    public function selectWhereData($where = [])
    {
        $result = $this->where($where)->select();
        $re = $result->hidden(['user_pws']);
        return $re;
    }

    public function selectMaxData($max = 'id',$where)
    {
        $result = $this->where($where)->max($max);
        return $result;
    }
}