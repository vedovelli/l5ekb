<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
    Route::get('novo', ['as' => 'new','uses' => 'UsersController@create']);
    Route::get('edit/{id}', ['as' => 'edit','uses' => 'UsersController@edit']);
    Route::get('remover/{id}', ['as' => 'delete','uses' => 'UsersController@delete']);
    Route::post('inserir', ['as' => 'store', 'uses' => 'UsersController@store']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'UsersController@update']);
});

Route::auth();

Route::get('/home', 'HomeController@index');
