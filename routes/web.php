<?php

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
use App\Loaitin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/user/login','UserController@getLoginAdmin');
Route::post('admin/user/login','UserController@postLoginAdmin');
//admin controll panel
Route::group(['prefix' => 'admin','middleware'=> 'AdminLogin'],function (){
    // admin/category/list

     Route::group(['prefix'=>'category'],function (){
         Route::get('list','CategoryController@getList');
         Route::get('add','CategoryController@getAdd');
         Route::post('add','CategoryController@postAdd');

         Route::get('edit/{id}','CategoryController@getEdit');
         Route::post('edit/{id}','CategoryController@postEdit');

         Route::get('delete/{id}','CategoryController@getDelete');
     });

    Route::group(['prefix'=>'loaitin'],function (){
        Route::get('list','LoaitinController@getList');

        Route::get('add','LoaitinController@getAdd');
        Route::post('add','LoaitinController@postAdd');

        Route::get('edit/{id}','LoaitinController@getEdit');
        Route::post('edit/{id}','LoaitinController@postEdit');

        Route::get('delete/{id}','LoaitinController@getDelete');
    });

    Route::group(['prefix'=>'tintuc'],function (){
        Route::get('list','TintucController@getList');
        Route::post('listsss','TintucController@postOrder');

        Route::get('add','TintucController@getAdd');
        Route::post('add','TintucController@postAdd')->name('uploadPhoto');

        Route::get('edit/{idLoaitin}/{idTintuc}','TintucController@getEdit');
        Route::post('edit/{idloaitin}/{idTintuc}','TintucController@postEdit');

        Route::get('delete/{id}','TintucController@getDelete');
    });

    Route::group(['prefix'=>'comment'],function (){
        Route::get('delete/{id}/{idLoaitin}/{idTintuc}','CommentController@getDelete');
    });

    Route::group(['prefix'=>'slider'],function (){
        Route::get('list','SliderController@getList');

        Route::get('add','SliderController@getAdd');
        Route::post('add','SliderController@postAdd');

        Route::get('edit/{id}','SliderController@getEdit');
        Route::post('edit/{id}','SliderController@postEdit');

        Route::get('delete/{id}','SliderController@getDelete');
    });

    Route::group(['prefix'=>'user'],function (){
        Route::get('list','UserController@getList');

        Route::get('add','UserController@getAdd');
        Route::get('checkout','UserController@Logout');
        Route::post('add','UserController@postAdd');

        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');

        Route::get('delete/{id}','UserController@getDelete');
    });

    Route::group(['prefix' => 'ajax'], function (){
//        admin/ajax/tintuc/'+idCategory
        Route::get('tintuc/{idCategory}','AjaxController@getTintuc');

    });
});


Route::get('pagehome', 'PagesController@pagehome');
Route::get('loaitin/{tenkhondau}/{id}', 'PagesController@loaitin');
Route::get('tintuc/{id}/{tenkhongdau}', 'PagesController@tintuc');
Route::get('login', 'PagesController@getLogin');
Route::post('login', 'PagesController@postLogin');
Route::get('logout', 'PagesController@logout');

Route::get('user', 'PagesController@getUser');
Route::post('user/{id}', 'PagesController@postUser');

Route::get('register', 'PagesController@getRegisterUser');
Route::post('register', 'PagesController@postRegisterUser');

Route::post('search', 'PagesController@seachTintuc');




Route::post('comment/{idTintuc}', 'CommentController@comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
