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

//Route::get('logviewer', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function() {

    Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function() {
        Route::get('/', [
            'as' => 'index',
            'uses' => 'BlogsController@index'
        ]);

        Route::get('create', [
            'as' => 'create',
            'uses' => 'BlogsController@create'
        ]);

        Route::post('create', [
            'as' => 'store',
            'uses' => 'BlogsController@store'
        ]);

        Route::get('{id}/edit', [
            'as' => 'edit',
            'uses' => 'BlogsController@edit'
        ])
        ->where('id', '[0-9]+');

        Route::post('{id}/edit', [
            'as' => 'update',
            'uses' => 'BlogsController@update'
        ])
        ->where('id', '[0-9]+');

        Route::delete('{id}/delete', [
            'as' => 'delete',
            'uses' => 'BlogsController@destroy'
        ])
        ->where('id', '[0-9]+');

        Route::get('{id}/approve', [
            'as' => 'approve',
            'uses' => 'BlogsController@approve'
        ])
        ->where('id', '[0-9]+');
    });

});

/**
 * Demo controller.
 */
Route::group(['namespace' => 'Demo', 'prefix' => 'demo'], function() {
    Route::get('/', 'DemoController@index');
    Route::get('/collect', 'DemoController@collect');
    Route::get('/sms', 'DemoController@sms');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
