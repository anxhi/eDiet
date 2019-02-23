<?php
namespace Controllers;
use eDiet\BaseController;

class SessionsController extends BaseController{

    public $login_url = 'admin';
    public $after_login = 'dashboard';
    protected $login_page = 'sessions.login';

//    public function loginForm(){
//        return view('sessions.login');
//    }

}
