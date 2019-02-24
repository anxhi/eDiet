<?php
namespace eDiet\Traits;

use \eDiet\DB;
use eDiet\Validation;

trait Session{

    public function loginForm(){
        return  auth()
            ? redirect($this->after_login ?? 'dashboard')
            : view($this->login_page ?? 'login');
    }

    public function login(){
        Validation::make([
            'username' => 'required',
            'password' => 'required|password'
        ]);

        $user = DB::raw('SELECT * FROM users WHERE username = :username limit 1', [
            'username' => $_POST['username']
        ])[0];

        if(password_verify($_POST['password'],$user->password)){
            $_SESSION['user'] = $user->username;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
        }else{
            $_SESSION['errors']['login'] = ['Your username and password don\'t match in our database'];
            return redirect($this->login_url ?? 'login');
        }
        return redirect($this->login_url ?? 'login');

    }

    public function logout(){
        if(auth()){
            session_destroy();
        }
        redirect('');
    }

}
