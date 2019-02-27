<?php
namespace Controllers;
use eDiet\BaseController;
use eDiet\DB;
use eDiet\Validation;

class AdminController extends BaseController{

    public function __construct()
    {
        parent::__construct();
        $uri = explode("/",$_SERVER['REQUEST_URI'])[1];
        $this->slug = str_replace("/","",explode("-",$uri)[1]);
        $this->editable = config("crud.editables");
    }

    public function __middleware(){
        return [
            'admin' => [
                'dashboard',
                'browse',
                'create',
                'add',
                'update',
                'delete',
                'diet',
            ],
        ];
    }

    public function dashboard(){
        return view('admin.home',[
            'users' => DB::raw('SELECT count(id) as cnt FROM users')[0]->cnt,
            'foods' => DB::raw('SELECT count(id) as cnt FROM foods')[0]->cnt,
            'diets' => DB::raw('SELECT count(id) as cnt FROM diets')[0]->cnt,
        ]);
    }

    public function delete(){
        if($_POST['logout']){
            DB::table('users')->delete($_POST['id']);
            session_destroy();
            return redirect('');
        }
        DB::table($_POST['type'])->delete($_POST['id']);
        return back();
    }
    public function browse(){
        return view('admin.view',[
            'datas' => DB::table($this->slug)->get(),
            'fields' => $this->editable[$this->slug],
            'slug' => $this->slug
        ]);
    }

    public function create($id = null){
        $compact = [
            'slug' => $this->slug,
            'fields' => $this->editable[$this->slug],
        ];
        if($id){
            $compact['dataContent'] = DB::table($this->slug)->find($id);
        }
        return view('admin.edit-add.view',$compact);
    }

    public function add(){
        $fields = $this->editable[$this->slug];
        $request = $_POST;

        $vals = array_reduce(array_keys($fields),function($acc,$field) use ($request) {
            $acc[$field] = $request[$field];
            return $acc;
        },[]);


        DB::table($this->slug)->insert($vals);
        return redirect("browse-{$this->slug}");
    }

    public function update(){
        $fields = $this->editable[$this->slug];
        $request = $_POST;

        $vals = array_reduce(array_keys($fields),function($acc,$field) use ($request) {
            $acc[$field] = $request[$field];
            return $acc;
        },[]);


        DB::table($this->slug)->update($_POST['id'],$vals);
        return redirect("browse-{$this->slug}");
    }

    public function diet(){
        return view('diet',[
            'foods' => DB::table('foods')->get(),
            'meals' => DB::table('meals')->get()
        ]);
    }

    public function createDiet(){

        DB::table('diets')->insert([
            'name' => $_POST['name'],
            'isDiaryFree' => (int)!!$_POST['isDairyIntolerant'],
            'isGlutenFree' => (int)!!$_POST['isGlutenIntolerant'],
            'isVegan' => (int)!!$_POST['isVegan'],
            'duration' => $_POST['duration'],
            'photo' => uploadImage($_FILES['file'],[
                'width' => 400,
                'height' => 400,
            ])
        ]);

        $diet = DB::raw('SELECT * FROM diets where name = :name limit 1',[
            'name' => $_POST['name']
        ])[0];
        $meals = DB::table('meals')->get();


        foreach($meals as $meal){
            foreach($_POST[$meal->name] as $food) {
                DB::table('diet_meal')->insert([
                    'diet_id' => $diet->id,
                    'meal_id' => $meal->id,
                    'food_id' => $food
                ]);
            }
        }

        return redirect("browse-diets");

    }

    public function updateDiet($id){
        $diet = DB::table('diets')->find($id);
        $meals = DB::table('meals')->get();
        $foods = DB::table('foods')->get();

        $selected_foods = [];
        foreach ($meals as $meal){
            $selected_foods[$meal->id] = [];
        };

        $diet_foods = DB::raw('select * from diet_meal where diet_id = :id',[
            'id' => $id
        ]);

        foreach($diet_foods as $food){
            if(!in_array($food->food_id,$selected_foods[$food->meal_id]))
                $selected_foods[$food->meal_id][] = $food->food_id;
        }

        return view('diet',[
            'foods' => $foods,
            'meals' => $meals,
            'diet' => $diet,
            'selected_foods' => $selected_foods
        ]);
    }

    public function handleDietUpdate(){
        $diet = DB::raw('SELECT * FROM diets where id = :id',[
            'id' => $_POST['id']
        ])[0];
        DB::table('diets')->update($_POST['id'],[
            'name' => $_POST['name'],
            'isDiaryFree' => (int)!!$_POST['isDairyIntolerant'],
            'isGlutenFree' => (int)!!$_POST['isGlutenIntolerant'],
            'isVegan' => (int)!!$_POST['isVegan'],
            'duration' => $_POST['duration'],
            'photo' => !!$_FILES['file']['size'] ? uploadImage($_FILES['file'],[
                'width' => 400,
                'height' => 400,
            ]): $diet->photo
        ]);

        $meals = DB::table('meals')->get();


        DB::table('diet_meal')->delete($_POST['id'],'diet_id');

        foreach($meals as $meal){
            foreach($_POST[$meal->name] as $food) {
                DB::table('diet_meal')->insert([
                    'diet_id' => $_POST['id'],
                    'meal_id' => $meal->id,
                    'food_id' => $food
                ]);
            }
        }

        return redirect("browse-diets");
    }
}
