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
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'categories'],function(){
        // admin/categories/add  
        Route::get('list','categoriesController@getList');
        Route::get('edit','categoriesController@getEdit');
        Route::get('add','categoriesController@getAdd');
        Route::post('add','categoriesController@postAdd');    
    });

    Route::group(['prefix'=>'types'],function(){
        // admin/types/add  
        Route::get('list','categoriesController@getList');
        Route::get('edit','categoriesController@getEdit');
        Route::get('add','categoriesController@getAdd');
    });

    Route::group(['prefix'=>'news'],function(){
        // admin/news/add  
        Route::get('list','categoriesController@getList');
        Route::get('edit','categoriesController@getEdit'); 
        Route::get('add','categoriesController@getAdd');
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
