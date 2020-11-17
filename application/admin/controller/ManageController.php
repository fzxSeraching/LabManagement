<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-04
 * Time: 16:50
 */

namespace app\admin\controller;

use app\common\controller\Common;
use app\common\model\User;
use think\Request;

class ManageController extends Common
{

    private $user;

    public function initialize()
    {
        $this->user = new User();
    }

    // 用户的增加
    public function addStu(Request $request)
    {
        $username = $request->param('username');
        $userrole = $request->param('userrole');
        $userid = $this->user->selectMaxData('user_id', "user_role=$userrole") + 1;
        $useremail = $request->param('useremail');

        $data = [
            'user_name' => $username,
            'user_id' => $userid,
            'user_email' => $useremail,
            'user_role' => $userrole
        ];
        $result = $this->user->addData($data);
        $this->ajaxreturn(200, "添加成功", $result);
    }

    // 用excel导入
    public function addStuWithExcel(Request $request)
    {
        $filess = $request->file('file');
        $data = ['user_name', 'user_id', 'user_email', 'user_des', 'user_pws', 'user_role'];
        $result = $this->indata($filess, $data);
        $aa = $this->user->addBatchData($result);
        $this->ajaxreturn(200, "导入成功", $aa);
    }

    // 导出到excel
    public function outStuWithExcel(Request $request)
    {
        $excel = new Office();
        $role = $request->param('role');
        $where = [["id", ">", "0"]];
        if ($role) {
            array_push($where, ["user_role", "=", $role]);
        }

        $data = $this->user->selectWhereData($where);
        $head = ['id', 'user_name', 'user_email', 'user_role'];
        $keys = ['id', 'user_name', 'user_email', 'user_role'];

        switch ($role) {
            case "R00":
                $msg = '学生信息表';
                break;
            case "R002":
                $msg = '教师信息表';
                break;
            case "R003":
                $msg = '管理员信息表';
                break;
            case "R004":
                $msg = '维修人员信息表';
                break;
            case "R005":
                $msg = '主任信息表';
                break;
            default:
                $msg = "用户";
        }
        $this->outdata($msg, $data, $head, $keys);
        $this->ajaxreturn(200, "导出成功", $result = true);
    }

    // 用户删除
    public function deleteStu(Request $request)
    {
        $data = $request->param('data');
        $dataarray = ['in', $data];
        $result = $this->user->deleteData($dataarray);
        $this->ajaxreturn(200, "删除成功", $result);
    }

    // 用户修改
    public function editStu(Request $request)
    {
        $id = $request->param('id');
        // 传入json数据，
        $data = $request->param('data');
        $need = json_decode($data, true); //将json转换成数组
        $map = ['id' => $id];
        $result = $this->user->editData($map, $need);
        $this->ajaxreturn(200, "修改成功", $result);
    }

    // 查找全部
    public function showAllStu(Request $request)
    {
        $data = $request->param('data');
        $role = $request->param('role');

        $where = [["id", ">", "0"]];
        if ($role) {
            array_push($where, ["user_role", "=", $role]);
        }

        $result = $this->user->selectWhereData($where);
        $this->ajaxreturn(200, "查找成功", $result);
    }
}