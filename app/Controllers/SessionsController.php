<?php
namespace Controllers;
use eDiet\BaseController;
use eDiet\DB;
use eDiet\Validation;

class SessionsController extends BaseController{

    public $login_url = 'login';
    public $after_login = '';
    protected $login_page = 'sessions.login';



    public function signUpForm(){
        password_hash("password",PASSWORD_DEFAULT);
        return view("sessions.signup");
    }

    public function signup(){

        Validation::make([
            'password' => 'required|password|confirmed',
            'username' => 'required|unique',
            'name' => 'required',
            'birthday' => 'required',
        ]);

        DB::table("users")->insert([
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => password_hash("password",1),
            'dairyfree' => (int)!!$_POST['dairyfree'],
            'vegan' => (int)!!$_POST['vegan'],
            'glutenfree' => (int)!!$_POST['glutenfree'],
        ]);

        $user = DB::raw('SELECT * FROM users where username = :username limit 1',[
            'username' => $_POST['username']
        ])[0];

        $_SESSION['user'] = $user->username;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;

        return redirect("user-data");
    }

    public function dataForm(){
        return view('data');
    }

    public function data(){
//        dd([
//            'user_id' => auth_user()->id,
//
//            'weight' => $_POST['Weight'],
//            'height' => $_POST['Height'],
//            'chest' => $_POST['Chest'],
//            'leg' => $_POST['Leg'],
//            'hip' => $_POST['Hip'],
//            'calf' => $_POST['Calf'],
//            'waist' => $_POST['Waist'],
//        ]);
        DB::table('user_data')->insert([
            'BMI' => $_POST['BMI'],
            'user_id' => auth_user()->id,
            'weight' => $_POST['Weight'],
            'height' => $_POST['Height'],
            'chest' => $_POST['Chest'],
            'leg' => $_POST['Leg'],
            'hip' => $_POST['Hip'],
            'calf' => $_POST['Calf'],
            'waist' => $_POST['Waist'],
        ]);
        return redirect('');
    }

}
