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

        $user = auth_user();
        $user->data = DB::raw('SELECT * FROM user_data WHERE user_id = :id limit 1',[
            'id' => $user->id
        ])[0];

//         $favs =

        return view('profile',[
            'user' => $user,
            // 'favs' => 
        ]);
    }

    public function search(){
        $favs = DB::raw(
             'select diets.id, diet_id from diets
                    left join favourite_diets on favourite_diets.diet_id = diets.id
                    where user_id = :user'
        ,[
            'user' => auth_user()->id
        ]);

        $favs = array_map(function($fav){
            return $fav->diet_id;
        },$favs);

        if(!$_GET['name'] && !$_GET['duration'] && !$_GET['category']){
            return view('search',[
                'results' => DB::table('diets')->get(),
                'favs' => $favs ?? []
            ]);
        }

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



        foreach($results as $result){
            $meals = [
                'breakfast' => [],
                'lunch' => [],
                'dinner' => [],
            ];
            $result_foods = DB::raw('SELECT *, meals.name as meal, foods.name as food FROM diet_meal 
                inner join meals on diet_meal.meal_id = meals.id 
                inner join foods on diet_meal.food_id = foods.id 
                WHERE diet_id = :id',[
                'id' => $result->id
            ]);

            foreach($meals as $meal => $data){
                $meals[$meal][] = array_filter($result_foods,function($food) use($meal){
                    return $food->meal == $meal;
                });
            }
            $result->data = $meals;
        }
        return view('search',[
            'results' => $results,
            'favs' => $favs
        ]);
    }

    function toggle(){
        $data = [
            'user_id' => auth_user()->id,
            'diet_id' => $_POST['id']
        ];
        $diets = DB::raw('SELECT * FROM favourite_diets where user_id = :user_id AND diet_id = :diet_id',$data);

        if(!count($diets)){
            $val = 'unfavourite';
            DB::table('favourite_diets')->insert($data);
        }else{
            $val = 'favourite';
            DB::raw('DELETE FROM favourite_diets WHERE diet_id = :diet_id AND user_id = :user_id',[
                'user_id' => auth_user()->id,
                'diet_id' => $_POST['id'],
            ],false);
        }

        echo json_encode([
            'success' => 1,
            'val' => $val
        ]);
        return;
    }
}
