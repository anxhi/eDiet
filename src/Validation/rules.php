<?php

use eDiet\DB;

return [
        'required' => function($field){
            if(empty($_POST[$field])) {
                return ucfirst($field) . ' is required';
            }
        },
        'email' => function($field){
            if(!preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
                $_POST[$field])){
                return ucfirst($field) . ' is not a valid email';
            }
        },
        'password' => function($field){
            if(strlen($_POST[$field]) < 6){
                return ucfirst($field) . ' should be at least 6 characters long';
            }
        },
        'confirmed' => function($field){
            if($_POST[$field."_confirmation"] !== $_POST[$field]){
                return ucfirst($field) . ' is not the same as the password confirmation field';
            }
        },
        'unique' => function($username){
            if(!!DB::raw('SELECT * FROM users where username = :username limit 1',[
                'username' => $_POST[$username]
            ])[0]){
                return ucfirst($username) . ' is taken';
            }
        }
    ];
