<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-04
 * Time: 17:27
 */

namespace app\user\controller;

use think\Controller;
use think\Request;

class Userlogin extends Controller
{
    public function signin(Request $request){

        return 'success';
        //获取参数
        $data = $request->param('data');
        //校验参数
        $result = $this->validate($data, 'app\validate\User');

        if (true !== $result) {
            // 验证失败 输出错误信息
            dump($result);
            $msg['data'] = '';
            $mas['msg'] = 'error';
            return json_encode($msg);
        }else{
            //执行查询

        }
        //确认登陆，返回信息

    }
}