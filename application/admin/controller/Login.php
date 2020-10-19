<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-17
 * Time: 14:41
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;


class Login extends Controller
{
    // 登录
    public function signin(Request $request){
        $data = $request->param('data');
        $user = User::where('user_name', $data)->find();
//        $user = Db::table('lab_user')->select();
        var_dump($user);
    }

    // 忘记密码
    public function forget(){

    }

    // 登出
    public function logout(){

    }
}