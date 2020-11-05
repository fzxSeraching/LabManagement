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
    public function selectWhereData($where = '1=1')
    {
        $result = $this->where($where)->select();
        $re = $result->hidden(['user_pws']);
        return $re;
    }
}