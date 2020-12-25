<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-17
 * Time: 14:41
 */

namespace app\admin\controller;

use app\common\model\User;
use think\Db;
use think\Request;
use app\common\controller\Common;


class Login extends Common
{
    // 登录
    public function signin()
    {
        $username = I('email');//用户名
        $password = I('password');//密码
        if (empty($username)) {
            exit(json_encode(['code' => 400, 'msg' => '请填写用户名']));
        }
        if (empty($password)) {
            $where = "user_email = '$username'";
            $result = Db::name('usr')->where($where)->field('user_email')->find();
            if ($result) {
                exit(json_encode(['code' => 200, 'msg' => '登录成功', 'data' => $result]));
            } else {
                exit(json_encode(['code' => 400, 'msg' => '登录失败,账号或密码错误', 'data' => '']));
            }
        } else {
            //两种加密方式：LAB+密码；密码+用户名
            $tp_psw = md5(utf8_encode('LAB' . $password));
            $psw = md5(utf8_encode($password . $username));
            $where = "(user_name = '$username') and (user_pws = '$tp_psw' or user_pws = '$psw' )";
            $result = Db::name('usr')->whereor($where)->field('user_name,user_pws')->find();
            if ($result) {
                exit(json_encode(['code' => 200, 'msg' => '登录成功', 'data' => $result]));
            } else {
                exit(json_encode(['code' => 400, 'msg' => '登录失败,账号或密码错误', 'data' => '']));
            }
        }
    }

    // 忘记密码
    public function forget()
    {

    }

    // 设定用户信息
    public function register(Request $request)
    {
        $email = $request->param('email');//用户名
        $password = $request->param('password');//密码
        $username = $request->param('username');//用户名
        $user_id = Db::name('user')->max('user_id') + 1;
        $insetdata = [
            'user_id' => $user_id,
            'user_name' => $username,
            'user_pws' => $password,
            'user_email' => $email
        ];
        $insert = Db::name('user')->insert($insetdata);
        $this->ajaxreturn(200,'成功',$insert);
    }

    // 登出
    public function logout()
    {

    }

    // 测试
    public function test(){
    }

    //获取Token
    public function getToken(){

    }

}