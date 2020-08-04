<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-04
 * Time: 18:48
 */
namespace app\validate\user;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'email' =>  'email',
    ];
    protected $message  =   [
        'email'        => '邮箱格式错误',
    ];
}