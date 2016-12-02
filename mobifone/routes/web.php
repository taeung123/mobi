<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
       Route::group(['prefix'=>'loaikh'],function(){
            Route::get('danhsach','loaikhcontroller@getdanhsach');
            Route::get('them','loaikhcontroller@getthem');
            Route::post('them','loaikhcontroller@postthem');
            Route::get('sua/{id}','loaikhcontroller@getsua');
            Route::post('sua/{id}','loaikhcontroller@postsua');
            Route::get('xoa/{id}','loaikhcontroller@getxoa');
       });
       Route::group(['prefix'=>'goidichvu'],function(){
            Route::get('danhsach','goidichvucontroller@getdanhsach');
            Route::get('them','goidichvucontroller@getthem');
            Route::post('them','goidichvucontroller@postthem');
            Route::get('sua/{id}','goidichvucontroller@getsua');
            Route::post('sua/{id}','goidichvucontroller@postsua');
            Route::get('xoa/{id}','goidichvucontroller@getxoa');
       });
         Route::group(['prefix'=>'goicuoc'],function(){
            Route::get('danhsach','goicuoccontroller@getdanhsach');
            Route::get('them','goicuoccontroller@getthem');
            Route::post('them','goicuoccontroller@postthem');
            Route::get('sua/{id}','goicuoccontroller@getsua');
            Route::post('sua/{id}','goicuoccontroller@postsua');
            Route::get('xoa/{id}','goicuoccontroller@getxoa');
       });
          Route::group(['prefix'=>'ajax'],function(){
          	   Route::get('dichvu/{id}','ajaxcontroller@getdichvu');
          });
});
