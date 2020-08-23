<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/createdata', 'TestController@test');
//////////////////////////////////////////////////////////KHÓA HỌC
Route::get('/khoa_hoc', 'ManagerController@view_all_khoa_hoc')->name('view_khoa_hoc');
Route::get('/khoa_hoc/create', 'ManagerController@create_khoa_hoc');
Route::post('/khoa_hoc', 'ManagerController@store_khoa_hoc')->name('store_khoa_hoc');
////////////////////
Route::get('/khoa_hoc/{id_khoa_hoc}', 'ManagerController@view_khoa_nganh');
Route::get('/khoa_hoc/{id_khoa_hoc}/nganh', 'ManagerController@khoa_hoc_chi_tiet');
////////////////////
Route::get('/khoa_hoc/{id_khoa_hoc}/update', 'ManagerController@update_khoa_hoc');
Route::post('/khoa_hoc/{id_khoa_hoc}', 'ManagerController@process_update_khoa_hoc');

////////////////////////////////////Ngành học
Route::get('/nganh', 'ManagerController@view_all_nganh');
Route::get('/nganh/create', 'ManagerController@create_nganh');
Route::post('/nganh', 'ManagerController@store_nganh');
//////////
Route::get('/nganh/{id_nganh}', 'ManagerController@redirect_view_mon_nganh');
Route::get('/nganh/{id_nganh}/mon', 'ManagerController@view_mon_nganh');
///////////////
Route::get('/nganh/{id_nganh}/update', 'ManagerController@update_nganh');
Route::post('/nganh/{id}', 'ManagerController@process_update_nganh');

Route::get('nganh/{id_nganh}/mon/create', 'ManagerController@add_mon_nganh');
Route::post('/nganh/{id_nganh}/mon', 'ManagerController@store_mon_nganh');

Route::get('/khoa_hoc/{id_khoa_hoc}/nganh/create', 'ManagerController@create_khoa_nganh');
Route::post('/khoa/nganh', 'ManagerController@store_khoa_nganh');

//////////////////////////////////////////////////////////NGÀNH HỌC

////////////////////////////////môn

Route::get('/mon', 'ManagerController@view_mon');
Route::get('/mon/create', 'ManagerController@create_mon');
Route::post('/mon', 'ManagerController@store_mon');
Route::get('/mon/{id_mon}/update', 'ManagerController@update_mon');
Route::post('/mon/{id_mon}', 'ManagerController@process_update_mon');




//Route::get('/mon/{id_nganh}', 'ManagerController@view_mon_nganh');

//Route::post('/mon/{id_nganh}', 'ManagerController@store_mon_nganh');
 //dùng option
////////////////////CLASS

Route::get('/class/{id_khoa_hoc}/{id_nganh_hoc}', 'ManagerController@view_lop_hoc');
Route::get('/class/{id_khoa_hoc}/{id_nganh_hoc}/create', 'ManagerController@create_lop');
Route::post('/class/{id_khoa_hoc}/{id_nganh_hoc}', 'ManagerController@process_create_lop');
Route::get('/class/{id_lop}/sinh_vien', 'ManagerController@view_lop_sinh_vien');

 ///////////////////
 ///////////////////Chưa xong/////////////////////////////////////////////


 ///////////////////////////////////////////////////
Route::get('/view_all_giang_vien', 'ManagerController@view_giang_vien');
Route::get('/view_all_giao_vu', 'ManagerController@view_giao_vu');
Route::get('/nhan_su/create', 'ManagerController@create_nhan_su');
Route::post('/nhan_su', 'ManagerController@store_nhan_su');

Route::get('/nhan_su/{id}/update', 'ManagerController@update_nhan_su');
Route::post('/nhan_su/{id}', 'ManagerController@process_update_nhan_su');
///Thêm môn cho ngành
//Route::get('/xep_lop', 'ManagerController@xep_lop')->name('xep_lop');

//Route::get('/view_khoa_hoc/{khoa_hoc}', 'ManagerController@khoa_hoc_chi_tiet')->name('khoa_hoc_chi_tiet');

//////////////////////////nhập Excel/////////
Route::get('/import_sinh_vien/{id_khoa_hoc}/{id_nganh}/create', 'ManagerController@import_sinh_vien');

Route::get('/export_sinh_vien', 'ExcelController@export_sinh_vien');
Route::post('/import_sinh_vien/{id_khoa_hoc}/{id_nganh}', 'ExcelController@process_import_sinh_vien');



Route::get('/sinh_vien', 'ManagerController@view_sinh_vien');
Route::get('/sinh_vien/create', 'ManagerController@create_sinh_vien');
Route::post('/sinh_vien', 'ManagerController@process_create_sinh_vien');

Route::get('/sinh_vien/{id}/update', 'ManagerController@update_sinh_vien');

Route::post('/sinh_vien/{id}', 'ManagerController@process_update_sinh_vien');
