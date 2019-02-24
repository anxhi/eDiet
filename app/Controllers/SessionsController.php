<?php
namespace Controllers;
use eDiet\BaseController;

class SessionsController extends BaseController{

    public $login_url = 'login';
    public $after_login = '';
    protected $login_page = 'sessions.login';

//    public function loginForm(){
//        return view('sessions.login');
//    }

    public function signUpForm(){
        password_hash("password",PASSWORD_DEFAULT);
        return view("sessions.signup");
    }

}
