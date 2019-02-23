<?php

use eDiet\Router as Route;

/*
  |-------------------------------------------------------------------------------------------
  | Web Routes
  |-------------------------------------------------------------------------------------------
  | Usage:
  | Class: Route,
  | Methods: get,post
  | First Parameters: routeName string e.g "/test", "/test/{wildcard}"
  | Second Parameters: callback string e.g "Controller@method" function e.g function(){ echo "Hello World" }
  |
*/


Route::get('/','MainController@index');

Route::get('/profile','MainController@profile');

/*---------------------------LOGIN SESSIONS------------------------------------*/

Route::post('/login','SessionsController@login');
Route::post('/logout','AdminController@logout');

Route::get('/login','SessionsController@loginForm');
Route::get('/dashboard','AdminController@dashboard');


Route::get('/meal','VaktController@index');


Route::get('/test',function(){dd('IT works');});
Route::get('/test/{message}',function($message){dd('Hello '.$message);});



Route::post('/login','AdminController@login');
Route::post('/logout','AdminController@logout');
Route::get('/admin','AdminController@loginForm');
Route::get('/dashboard','AdminController@dashboard');

/*-------------------------------CRUD------------------------------------------*/

Route::get('/news-dashboard','AdminController@news');
Route::get('/position-dashboard','AdminController@positions');
//Route::get('/partners-dashboard','AdminController@partners');

Route::get('/create-news','AdminController@newsForm');
Route::post('/create-news','AdminController@createNews');
Route::get('/create-position','AdminController@positionsForm');
Route::post('/create-position','AdminController@createPosition');
Route::post('/update-position','AdminController@updatePosition');
//Route::get('/create-partners','AdminController@partnersForm');

Route::post('/delete','AdminController@delete');
Route::post('/update-news','AdminController@update');
