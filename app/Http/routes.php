<?php

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::get('/home', function () {
    return redirect()->route('users.index');
});

Route::group(['middleware' => ['auth', 'l5ekb']], function () {
    Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
        Route::get('novo', ['as' => 'new','uses' => 'UsersController@create']);
        Route::get('edit/{id}', ['as' => 'edit','uses' => 'UsersController@edit']);
        Route::get('remover/{id}', ['as' => 'delete','uses' => 'UsersController@delete']);
        Route::post('inserir', ['as' => 'store', 'uses' => 'UsersController@store']);
        Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'UsersController@update']);
    });
});

Route::resource('categorias', 'CategoriesController');

Route::auth();

