<?php
namespace Controllers;
use eDiet\BaseController;
use eDiet\DB;

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

    public function search(){
        $categories = [
            'isVegan', 'isDiaryFree', 'isGlutenFree'
        ];

        $statement = 'SELECT * FROM diets WHERE name = :name OR duration = :duration';

        if(in_array($_GET['category'],$categories)){
            $statement .=' OR '.$_GET['category'].' = 1';
        }


        $results = DB::raw($statement,[
            'name' => $_GET['name'],
            'duration' => $_GET['duration'],
        ]);
        return view('search',[
            'results' => $results
        ]);
    }
}
