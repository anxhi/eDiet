<?php
namespace Controllers;
use eDiet\BaseController;

class MainController extends BaseController{

    public function index(){
        return view('home');
    }
}