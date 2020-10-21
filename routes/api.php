<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Auth')->group(function(){
    Route::post('register',  'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('logout', 'LogoutController');
});

Route::namespace('Post')->middleware('auth:api')->group(function(){
    Route::get('post', 'PostController@index');
    Route::post('post', 'PostController@store');
    Route::get('post/{post:slug}', 'PostController@show');
});


