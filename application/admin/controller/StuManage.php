<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-04
 * Time: 16:50
 */

namespace app\admin\controller;

use app\admin\model\User;
use think\Request;
use app\admin\controller\Office;

class StuManage extends Common
{

    private $user;

    public function initialize()
    {
        $this->user = new User();
    }

    // 学生的增加
    public function addStu(Request $request)
    {
        $username = $request->param('username');
        $userid = $this->user->selectMaxData('user_id') + 1;
        $useremail = $request->param('useremail');
        $userrole = $request->param('userrole');
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
    public function addStuWithExcel()
    {
    }

    // 导出到excel
    public function outStuWithExcel()
    {
        $excel = new Office();

        $data = $this->user->selectWhereData("user_role = 'R001'");
        $head = ['id', 'user_name', 'user_email', 'user_role'];
        $keys = ['id', 'user_name', 'user_email', 'user_role'];

        $excel->outdata('学生信息表', $data, $head, $keys);
    }

    // 学生的删除
    public function deleteStu(Request $request)
    {
        $data = $request->param('data');
        $dataarray = ['in', $data];
        $result = $this->user->deleteData($dataarray);
        $this->ajaxreturn(200, "删除成功", $result);
    }

    // 学生的修改
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

    // 查找全部学生
    public function showAllStu(Request $request)
    {
        $data = $request->param('data');
        if ($data) {
        } else {
            $result = $this->user->selectWhereData("user_role = 'R001'");
            $this->ajaxreturn(200, "查找成功", $result);
        }
    }

}