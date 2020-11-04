<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-22
 * Time: 17:34
 */

namespace app\admin\controller;


use think\Controller;

class Common extends Controller
{
    public function ajaxreturn($code,$msg,$data){
        $data['msg'] = $msg;
        $data['code'] = $code;
        $data ? $data['info'] = $data : $data['info'] = null;
        exit(json_encode($data));
    }
}