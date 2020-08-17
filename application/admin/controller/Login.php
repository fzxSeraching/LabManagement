<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-17
 * Time: 14:41
 */

namespace app\admin\controller;
use think\Controller;


class Login extends Controller
{
    public function signin(){
        return $this->fetch();
    }

    public function forget(){
        return $this->fetch();
    }
}