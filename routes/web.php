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

/*---------------------------SESSION ROUTES------------------------------------*/

Route::post('/user-login','SessionsController@login');
Route::post('/logout','SessionsController@logout');
Route::get('/signup','SessionsController@signUpForm');
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

$routes = [
    [ "slug" => "users"],
    [ "slug" => "diets" ]
];

foreach($routes as $route){
    Route::get("/browse-{$route["slug"]}","AdminController@browse");
    Route::get("/create-{$route["slug"]}/{id}","AdminController@create");
    Route::post("/create-{$route["slug"]}","AdminController@add");
    Route::post("/update-{$route["slug"]}","AdminController@update");
}

//Route::get('/news-dashboard','AdminController@news');
//Route::get('/create-news','AdminController@newsForm');
//Route::post('/create-news','AdminController@createNews');
//Route::post('/update-news','AdminController@update');

//Route::get('/position-dashboard','AdminController@positions');
//Route::get('/create-position','AdminController@positionsForm');
//Route::post('/create-position','AdminController@createPosition');
//Route::post('/update-position','AdminController@updatePosition');

//Route::post('/delete','AdminController@delete');
