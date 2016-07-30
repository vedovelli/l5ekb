<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('usuarios', function () {
    $users = \Louis\Models\User::all();
    $addresses = [];
    return view('users.index')->with(compact('users', 'addresses'));
});