<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-13
 * Time: 09:17
 */

namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index(){
//        return 'success';
        return $this->fetch();
    }


}