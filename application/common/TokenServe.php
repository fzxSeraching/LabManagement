<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-14
 * Time: 18:56
 */

namespace app\common;

use Firebase\JWT\JWT;

class TokenServe
{
    public static $iss_key = "fzx_";
    public static $aud_key = "顾客";
    public static $exp_time = 72000000000;      // 设置token有效期2小时
    public static $secret_key = "fzx_one billion"; // 签发的key

    public function setToken($id, $role, $ip = '')
    {
        $token = array(
            "iss" => self::$iss_key,         // jwt签发者
            "aud" => self::$aud_key,         // 接收jwt的一方
            "iat" => time(),                 // jwt的签发时间
//            "nbf" => time()+5,             // 定义在什么时间之前，该jwt都是不可用的
            "exp" => time() + self::$exp_time, // jwt的过期时间，这个过期时间必须要大于签发时间
            "jti" => time() . rand(0, 999999), // jwt的唯一身份标识，主要用来作为一次性token,从而回避重放攻击
            'id' => $id,                    // 当前登录用户的id
            'ip' => $ip,                    // 当前登录用户的ip地址，防止token被人盗取
            'role' => $role                 // 当前用户的角色类型
        );

        $jwt = JWT::encode($token, self::$secret_key);
        return $jwt;
    }

    public function checkToken()
    {
        $token1 = request()->get('token');
        $authorization = request()->header('token');
        $token = $token1 ? $token1 : ($authorization ? $authorization : '');

        if (!$token) {
            $this->_json(['code' => 50006, 'msg' => 'token参数，不能为空', 'result' => '', 'time' => time()]);
        }

        $decoded = '';
        try {
            $decoded = (array)JWT::decode($token, self::$secret_key, array('HS256'));
        } catch (\Exception $e) {
            $this->_json(['code' => 50006, 'msg' => 'token错误，请重新获取', 'result' => '', 'time' => time()]);
        }

        // 判断token是否过期
        $exp_time = $decoded ? $decoded['exp'] : 0;
        $now = time();
        if ($exp_time < $now) {
            $this->_json(['code' => 50006, 'msg' => 'token过期，请重新获取', 'result' => '', 'time' => time()]);
        }

        // 获取id
        $res['id'] = $decoded ? $decoded['id'] : 0;
        if (!$res['id']) {
            $this->_json(['code' => 50006, 'msg' => '参数错误，请联系管理员', 'result' => '', 'time' => time()]);
        }
//
//        // 获取roleid
//        $res['roleid'] = $decoded ? $decoded['role'] : 0;
//        if (!$res['roleid']) {
//            $this->_json(['code' => 50006, 'msg' => '参数错误，请联系管理员', 'result' => '', 'time' => time()]);
//        }
        return $res;
    }

    /**
     * 自定义返回json并且终止程序。
     * @param $aArray
     */
    private function _json($aArray)
    {
        header("HTTP/1.1 200 OK");
        header("Content-Type:application/json;charset=utf-8;");
        echo json_encode($aArray, JSON_UNESCAPED_UNICODE);
        exit;
    }
}