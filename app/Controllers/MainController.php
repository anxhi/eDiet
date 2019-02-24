<?php
namespace Controllers;
use eDiet\BaseController;

class MainController extends BaseController{

    public $login_url = 'login';
    public $after_login = '';
    protected $login_page = 'sessions.login';

    public function __middleware(){
        return [
            'auth' => [
                "profile"
            ]
        ];
    }

    public function index(){
        return view('home');
    }

    public function profile(){
      return view('profile');
    }
}
