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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','PageController@home');
Route::get('/contact','PageController@contact');
Route::get('/home','PageController@home');
Route::get('/category/{id}','PageController@getCategory');
Route::get('/categoryparent/{id}','PageController@getCategoryparent');
Route::get('/new/{id}','PageController@getNew');
Route::get('/login','PageController@getLogin');
Route::post('/login','PageController@postLogin');
Route::get('/logout','PageController@getLogout');
Route::get('/register','PageController@getRegister');
Route::post('/register','PageController@postRegister');
Route::post('/comment/{id}','CommentController@postComment');
Route::get('/infor/{id}','PageController@getUserInfor');
Route::post('/infor/{id}','PageController@postUserInfor');
Route::post('/search','PageController@Search');




Route::get('admin/register','AdminController@getAdminRegister');
Route::post('admin/register','AdminController@postAdminRegister');

Route::get('admin/login','AdminController@getAdminLogin');
Route::post('admin/login','AdminController@postAdminLogin');
Route::get('admin/logout','AdminController@getAdminLogout');

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
    Route::get('/', function () {
        return view('admin.layout.index');
    });
    Route::group(['prefix'=>'category'],function(){
        Route::get('list','CategoryController@getListCategory');
        Route::get('add','CategoryController@getAddCategory');
        Route::post('add','CategoryController@postAddCategory');
        Route::get('edit/{id}','CategoryController@getEditCategory');
        Route::post('edit/{id}','CategoryController@postEditCategory');
        Route::get('delete/{id}','CategoryController@getDeleteCategory');
    });

    Route::group(['prefix'=>'new'],function(){
        Route::get('list','NewController@getListNew');
        Route::get('add','NewController@getAddNew');
        Route::post('add','NewController@postAddNew');
        Route::get('edit/{id}','NewController@getEditNew');
        Route::post('edit/{id}','NewController@postEditNew');
        Route::get('delete/{id}','NewController@DeleteNew');
        Route::get('getcommentby/{id}','NewController@getListCommentById');
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('list','AdminController@getListUser');
        Route::get('edit/{id}','AdminController@getEditUser');
        Route::post('edit/{id}','AdminController@postEditUser');
        Route::get('delete/{id}','AdminController@getDeleteUser');
    });

    Route::get('comment/delete/{id}','CommentController@deleteCmt');
});

Route::group(['prefix'=>'author','middleware'=>'author'],function(){
    Route::get('/', function () {
        return view('author.layout.index');
    });

    Route::group(['prefix'=>'new'],function(){
        Route::get('list','NewController@getListNew');
        Route::get('list/{id}','NewController@getlistNewbyAuthorId');
        Route::get('add','NewController@getAddNew');
        Route::post('add','NewController@postAddNew');
        Route::get('edit/{id}','NewController@getEditNew');
        Route::post('edit/{id}','NewController@postEditNew');
        Route::get('delete/{id}','NewController@DeleteNew');
        Route::get('getcommentby/{id}','NewController@getListCommentById');
    });

    Route::group(['prefix'=>'ajax'],function(){
		Route::get('category/{id}','AjaxController@getCategory');
	});

});




