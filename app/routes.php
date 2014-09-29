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
//Route::get('question/{id}', array('as'=>'question','uses'=>'QuestionsController@show') );
Route::get('your-questions', array('as'=>'your-questions','uses'=>'QuestionsController@yourQuestions') );
Route::get('results/{any}', array('uses'=>'QuestionsController@results') );
Route::get('contact', array('as'=>'contact','uses'=>'UsersController@contact') );

Route::post( 'register',array('before'=>'csrf','uses'=>'UsersController@store') );
Route::post( 'login',array('before'=>'csfr','uses'=>'UsersController@postLogin') );
Route::post( 'questions',array('before'=>'csfr','uses'=>'QuestionsController@store') );
Route::post('answer', array( 'before'=>'csfr','uses'=>'AnswersController@store' ) );
Route::post('search', array( 'before'=>'csfr','uses'=>'QuestionsController@search' ) );


Route::resource('questions', 'QuestionsController');
Route::resource('answers', 'AnswersController');