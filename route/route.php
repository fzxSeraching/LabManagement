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
Route::get('allstu', 'admin/ManageController/showAllStu');
Route::get('excelout', 'admin/ManageController/outStuWithExcel');
Route::post('addstu', 'admin/ManageController/addStu');
Route::post('editstu', 'admin/ManageController/editStu');
Route::post('excelin', 'admin/ManageController/addStuWithExcel');
// 公告管理
Route::post('addnotice', 'admin/NoticeController/addNotice');
Route::post('editnotice', 'admin/NoticeController/editNotice');
Route::get('deletenotice', 'admin/NoticeController/deleteNotice');
Route::get('searchnotice', 'admin/NoticeController/searchNotice');
// 设备管理
Route::post('addfacility', 'admin/FacilityController/addFacility');
Route::post('editfacility', 'admin/FacilityController/editFacility');
Route::get('deletefacility', 'admin/FacilityController/deleteFacility');
Route::get('selectfacility', 'admin/FacilityController/selectFacility');
// 设备状态管理
Route::post('addfacState', 'admin/FacilityStateController/addState');
Route::post('editfacState', 'admin/FacilityStateController/editState');
Route::get('deletefacState', 'admin/FacilityStateController/deleteState');
Route::get('selectfacState', 'admin/FacilityStateController/selectState');