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

Route::get( '/',array('as'=>'home','uses'=>'QuestionsController@index') );
Route::get( 'register',array('as'=>'register','uses'=>'UsersController@register') );
Route::get( 'login',array('as'=>'login','uses'=>'UsersController@login') );
Route::get( 'logout',array('as'=>'logout','uses'=>'UsersController@logout') );

Route::post( 'register',array('before'=>'csrf','uses'=>'UsersController@store') );
Route::post( 'login',array('before'=>'csfr','uses'=>'UsersController@postLogin') );
