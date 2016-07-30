<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'usuarios'], function () {
    Route::get('', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('novo', ['uses' => 'UsersController@create']);
    Route::post('inserir', ['as' => 'users.store', 'uses' => 'UsersController@store']);
});
