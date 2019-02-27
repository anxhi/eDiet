<?php
namespace Controllers;
use eDiet\BaseController;
use eDiet\DB;
use eDiet\Validation;

class SessionsController extends BaseController{

    public $login_url = 'login';
    public $after_login = '';
    protected $login_page = 'sessions.login';

    public function __middleware(){
        return [
            "auth" => [
                'edit','data','dataForm'
            ],
            'guest' => [
                'signUpForm',
                'signup'
            ]
        ];
    }


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
            'password' => password_hash($_POST["password"],1),
            'dairyfree' => (int)!!$_POST['dairyfree'],
            'vegan' => (int)!!$_POST['vegan'],
            'glutenfree' => (int)!!$_POST['glutenfree'],
            'picture' => !!$_FILES['file']['size'] ? uploadImage($_FILES['file'],['width' => 350,'height' => 350]) : null
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
        return view('data',[
            'user_data' => DB::raw('SELECT * FROM user_data WHERE user_id = :id limit 1',[
                'id' => auth_user()->id
            ])[0]
        ]);
    }

    public function data(){
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

    public function edit(){
        Validation::make([
            'username' => 'required',
            'name' => 'required',
            'birthday' => 'required',
        ]);

        $user = auth_user();

        if(
            $_POST['username'] !== $user->username &&
            !!DB::raw('SELECT * FROM users where username = :username limit 1',['username' => $_POST['username']])[0]
        ){
            $_SESSION['errors']['username'] = ['This username is taken'];
            return back();
        }

        if(
            $_POST['password'] && $_POST['password'] !== $_POST['password_confirmation']
        ){
            $_SESSION['errors']['username'] = ['This username is taken'];
            return back();
        }
        DB::table("users")->update(auth_user()->id,[
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => $_POST['password'] ? password_hash($_POST['password'],1) : $user->password,
            'dairyfree' => (int)!!$_POST['dairyfree'],
            'vegan' => (int)!!$_POST['vegan'],
            'glutenfree' => (int)!!$_POST['glutenfree'],
            'picture' => !!$_FILES['file']['size'] ? uploadImage($_FILES['file'],['width' => 350,'height' => 350]) : null
        ]);

        return back();

    }

}
