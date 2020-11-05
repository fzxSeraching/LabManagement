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

    public function initialize()
    {
        parent::initialize();
    }

    // 返回函数
    public function ajaxreturn($code, $msg, $data)
    {
        if ($data){
            $info['msg'] = $msg;
            $info['code'] = $code;
            $info['info'] = $data;
            exit(json_encode($info));
        }else{
            $info['msg'] = "失败";
            $info['code'] = 400;
            exit(json_encode($info));
        }
    }

    // 数据的导入导出

}