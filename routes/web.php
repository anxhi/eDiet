<?php

use eDiet\Router as Route;

Route::get('/','MainController@index');
Route::get('/test',function(){
    dd('It Works!');
});
