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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'task'], function () {
    Route::get('/', 'TaskController@index')->name('task.index');
    Route::get('/create', 'TaskController@create')->name('task.create');
    Route::post('/create', 'TaskController@store')->name('task.store');
    Route::get('/view', 'TaskController@view')->name('task.view');
    Route::get('/edit/{id}', 'TaskController@edit')->name('task.edit');
    Route::post('/edit/{id}', 'TaskController@update')->name('task.update');
    Route::get('/delete/{id}', 'TaskController@destroy')->name('task.destroy');
});