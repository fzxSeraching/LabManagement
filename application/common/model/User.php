<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-19
 * Time: 13:27
 */
namespace app\common\model;

class User extends Base
{
    public function selectWhereData($where = [])
    {
        $result = $this->where($where)->select();
        $re = $result->hidden(['user_pws']);
        return $re;
    }
}