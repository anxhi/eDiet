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
Route::get('/test',function(){dd('IT works');});
Route::get('/test/{message}',function($message){dd('Hello '.$message);});
