<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');
Route::get('signin', 'admin/Login/signin');
Route::get('test', 'admin/Login/test');
Route::get('register', 'admin/Login/register');
// 用户管理操作
Route::get('allstu', 'admin/StuManage/showAllStu');
Route::get('excelout', 'admin/StuManage/outStuWithExcel');
Route::post('addstu', 'admin/StuManage/addStu');
Route::post('editstu', 'admin/StuManage/editStu');
Route::post('excelin', 'admin/StuManage/addStuWithExcel');
// 公告管理
Route::post('addnotice', 'admin/Notic/addNotice');
Route::get('deletenotice', 'admin/Notic/deleteNotice');
Route::post('editnotice', 'admin/Notic/editNotice');
Route::get('searchnotice', 'admin/Notic/searchNotice');