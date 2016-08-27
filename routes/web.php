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

Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function() {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'BlogsController@index'
    ]);

    Route::get('create', [
        'as' => 'create',
        'uses' => 'BlogsController@create'
    ]);
    //->middleware(['ask:create_post']);

    Route::post('create', [
        'as' => 'store',
        'uses' => 'BlogsController@store'
    ]);

    Route::get('edit/{id}', [
        'as' => 'edit',
        'uses' => 'BlogsController@edit'
    ])
    ->where('id', '[0-9]+');

    Route::get('edit/{id}', [
        'as' => 'update',
        'uses' => 'BlogsController@update'
    ])
    ->where('id', '[0-9]+');

    Route::get('delete/{id}', [
        'as' => 'delete',
        'uses' => 'BlogsController@delete'
    ])
    ->where('id', '[0-9]+');
});


// Route::group(['namespace' => 'Demo', 'prefix' => 'demo'], function() {
//     Route::get('/', 'DemoController@index');
// });