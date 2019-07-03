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
use App\categories;
use App\news;
use App\types;
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'categories'],function(){
        // admin/categories/add  
        Route::get('list','CategoriesController@getList');
        Route::get('edit/{id}','CategoriesController@getEdit');
        Route::post('edit/{id}','CategoriesController@postEdit');
        Route::get('add','CategoriesController@getAdd');
        Route::post('add','CategoriesController@postAdd');  
        Route::get('delete/{id}','CategoriesController@getDelete');
    });

    Route::group(['prefix'=>'types'],function(){
        // admin/types/add  
        Route::get('list','TypesController@getList');
        Route::get('edit/{id}','TypesController@getEdit');
        Route::post('edit/{id}','TypesController@postEdit');
        Route::get('add','TypesController@getAdd');
        Route::post('add','TypesController@postAdd');
        Route::get('delete/{id}','TypesController@getDelete');
    });

    Route::group(['prefix'=>'news'],function(){
        // admin/news/add  
        Route::get('list','NewsController@getList');
        Route::get('edit','NewsController@getEdit');
        Route::get('add','NewsController@getAdd');
        Route::post('add','NewsController@postAdd');
        Route::get('delete/{id}','NewsController@getDelete');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('types/{idcategories}','AjaxController@getTypes'); 
    });

    Route::group(['prefix'=>'slide'],function(){
        // admin/slide/add  
        Route::get('list','categoriesController@getList');
        Route::get('edit','categoriesController@getEdit');
        Route::get('add','categoriesController@getAdd');
    });

    Route::group(['prefix'=>'User'],function(){
        // admin/User/add  
        Route::get('list','categoriesController@getList');
        Route::get('edit','categoriesController@getEdit');
        Route::get('add','categoriesController@getAdd');
    });
});
