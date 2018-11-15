<?php

use eDiet\Router as Route;

Route::get('/','MainController@index');
Route::get('/test',function(){dd('IT works');});
Route::get('/test/{message}',function($message){dd('Hello '.$message);});
