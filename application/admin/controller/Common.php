<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-22
 * Time: 17:34
 */

namespace app\admin\controller;


use think\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Common extends Controller
{

    public function initialize()
    {
        parent::initialize();
    }

    // 返回函数
    public function ajaxreturn($code, $msg, $data)
    {
        if ($data) {
            $info['msg'] = $msg;
            $info['code'] = $code;
            $info['info'] = $data;
            exit(json_encode($info));
        } else {
            $info['msg'] = "失败";
            $info['code'] = 400;
            exit(json_encode($info));
        }
    }

    // 数据的导入导出
    /**
     * 导出excel表
     * $data：要导出excel表的数据，接受一个二维数组
     * $name：excel表的表名
     * $head：excel表的表头，接受一个一维数组
     * $key：$data中对应表头的键的数组，接受一个一维数组
     * 备注：此函数缺点是，表头（对应列数）不能超过26；
     *循环不够灵活，一个单元格中不方便存放两个数据库字段的值
     */
    public function outdata($name = '测试表', $data = [], $head = [], $keys = [])
    {
        $count = count($head);  //计算表头数量
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始，循环设置表头：
            $sheet->setCellValue(strtoupper(chr($i)) . '1', $head[$i - 65]);
        }

        /*--------------开始从数据库提取信息插入Excel表中------------------*/
        foreach ($data as $key => $item) {             //循环设置单元格：
            //$key+2,因为第一行是表头，所以写到表格时   从第二行开始写
            for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始：
                $sheet->setCellValue(strtoupper(chr($i)) . ($key + 2), $item[$keys[$i - 65]]);
                $spreadsheet->getActiveSheet()->getColumnDimension(strtoupper(chr($i)))->setWidth(20); //固定列宽
            }
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        //删除清空：
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        exit;
    }

    // excel导入
    public function indata($filess, $datain = [])
    {

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

            for ($i = 2, $a = 0; $i <= $row_num; $i++, $a++) {
                for ($j = 0; $j < count($datain); $j++) {
                    $data[$a][$datain[$j]] = $excel->getActiveSheet()->getCell(strtoupper(chr($i + 63)) . $j)->getValue();
                }
            }

            return $data;
        }
    }

}