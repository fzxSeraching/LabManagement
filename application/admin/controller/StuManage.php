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
use PhpOffice\PhpSpreadsheet\IOFactory;


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
    public function addStuWithExcel(Request $request)
    {
        $filess = $request->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下 存
        $info = $filess->move('../uploads/excel');

        if ($info) {
            //获取上传到后台的文件名
            $fileName = $info->getSaveName();
            //获取文件路径.
            $filePath = '../uploads/excel/' . $fileName;

            //获取文件后缀
            $suffix = $info->getExtension();
            // 有Xls和Xlsx和Cvs格式三种
            if ($suffix == "xls") {
                $reader = IOFactory::createReader('Xls');
            } elseif ($suffix == "xlsx") {
                $reader = IOFactory::createReader('Xlsx');
            } elseif ($suffix == "csv") {
                $reader = IOFactory::createReader('Csv');
            }

            //载入excel文件
            $excel = $reader->load($filePath);
            //读取第一张表
            $sheet = $excel->getSheet(0);
            //var_dump($sheet);die();
            //获取总行数
            $row_num = $sheet->getHighestRow();
            //获取总列数
            $col_num = $sheet->getHighestColumn();
            $a = 0;
            //将表格里面的数据循环到数组中
            for ($i = 2; $i <= $row_num; $i++) {
                // 如果A列（题目内容）就将数据存到数据库中
                if ($excel->getActiveSheet()->getCell("A" . $i)->getValue()) {
                    //*为什么$i=2? (因为Excel表格第一行应该是题目，选项，班级，从第二行开始，才是我们要的数据。)
                    $data[$a]['user_name'] = $excel->getActiveSheet()->getCell("A" . $i)->getValue();
                    $data[$a]['user_id'] = $excel->getActiveSheet()->getCell("B" . $i)->getValue();
                    $data[$a]['user_email'] = $excel->getActiveSheet()->getCell("C" . $i)->getValue();
                    $data[$a]['user_des'] = $excel->getActiveSheet()->getCell("D" . $i)->getValue();
                    $data[$a]['user_pws'] = $excel->getActiveSheet()->getCell("E" . $i)->getValue();
                    $data[$a]['user_role'] = $excel->getActiveSheet()->getCell("F" . $i)->getValue();
                    // 这里的数据根据自己表格里面有多少个字段自行决定
                }
                $a++;
            }
            //往数据库添加数据
//            dump($data);die;
            $aa = $this->user->addBatchData($data);
            if ($aa) {
                $this->ajaxreturn(200, "导入成功", $aa);

            } else {
                $this->ajaxreturn(400, "导入失败", $aa);
            }
        } else {
            $data = [];
            $this->ajaxreturn(200, "没有文件", $data);
        }
    }

    // 导出到excel
    public function outStuWithExcel()
    {
        $excel = new Office();

        $data = $this->user->selectWhereData("id >0");
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