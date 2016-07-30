<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('usuarios', function () {
    $users = \App\User::all();
    dd($users->toArray());
});