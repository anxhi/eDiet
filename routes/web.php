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

Route::get('/signup','SessionsController@signUpForm');
Route::post('/signup','SessionsController@signup');
Route::get('/login','SessionsController@loginForm');
Route::post('/user-login','SessionsController@login');
Route::post('/logout','SessionsController@logout');

/*---------------------------ADMIN ROUTES------------------------------------*/

Route::get('/dashboard','AdminController@dashboard');
Route::post('/login','AdminController@login');
Route::get('/admin','AdminController@loginForm');
Route::get('/dashboard','AdminController@dashboard');
Route::get('/diet','DietController@index');

/*-------------------------------CRUD------------------------------------------*/

$routes = [
    [ "slug" => "users" ],
    [ "slug" => "foods" ],
];

foreach($routes as $route){
    Route::get("/browse-{$route["slug"]}","AdminController@browse");
    Route::get("/create-{$route["slug"]}","AdminController@create");
    Route::get("/create-{$route["slug"]}/{id}","AdminController@create");
    Route::post("/create-{$route["slug"]}","AdminController@add");
    Route::post("/update-{$route["slug"]}","AdminController@update");
}

Route::post('/delete','AdminController@delete');


/*-------------------------------TESTS------------------------------------------*/

Route::get('/test',function(){dd('IT works');});
Route::get('/test/{message}',function($message){dd('Hello '.$message);});
