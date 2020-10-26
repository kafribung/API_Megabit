<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function(){
    Route::post('register',  'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController');
});

Route::namespace('Post')->middleware('auth:api')->prefix('post')->group(function(){
    Route::get('', 'PostController@index');
    Route::post('', 'PostController@store');
    Route::get('/{post:slug}', 'PostController@show');
    Route::put('/{post:slug}', 'PostController@update');
    Route::delete('/{post:slug}', 'PostController@destroy');
});


