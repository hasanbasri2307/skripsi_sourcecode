<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AccountController@showLogin');
Route::post('login',array('as'=>'login-process','uses'=>'AccountController@doLogin'));
Route::get('signup',array('as'=>'sign-up','uses'=>'AccountController@signup'));
Route::get('forgotPassword',array('as'=>'forgot-password','uses'=>'AccountController@forgotPassword'));
