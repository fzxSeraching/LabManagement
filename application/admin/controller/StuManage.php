<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-04
 * Time: 16:50
 */

namespace app\admin\controller;


use app\admin\model\User;
use think\Request;

class StuManage
{

    // 学生的增加
    // 学生的删除
    // 学生的修改
    // 学生的查找
    public function showAllStu()
    {
        $user = new User();
        $result = $user->selectAllData();
        dump($result);
    }

}