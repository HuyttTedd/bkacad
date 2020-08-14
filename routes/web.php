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
Route::get('/xep_lop', 'ManagerController@xep_lop')->name('xep_lop');
Route::get('/view_khoa_hoc', 'ManagerController@view_khoa_hoc')->name('view_khoa_hoc');
Route::get('/view_khoa_hoc/{khoa_hoc}', 'ManagerController@khoa_hoc_chi_tiet')->name('khoa_hoc_chi_tiet');
