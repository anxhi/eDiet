<?php
namespace Controllers;
use eDiet\BaseController;
use eDiet\DB;
use Validation\Validation;

class AdminController extends BaseController{

    public function __middleware(){
        return [
            'auth' => [
                'dashboard',
                'news',
                'newsForm',
                'partnersForm',
                'createNews'
            ],
        ];
    }

    public function dashboard(){
        return view('admin.home');
    }

    public function news(){
        $news = \DB::table('news')->get();
        return view('admin.news',['news' => $news]);
    }

    public function newsForm(){
        $news = DB::table('news')->find($_GET['news']);
        return view('admin.edit-add.news',[
            'news' => $news
        ]);
    }

    public function createNews(){
         Validation::make([
            'title' => 'required',
            'content' => 'required',
            'link' => 'required',
        ]);

        News::create();
        return back();
    }

    public function delete(){
        DB::table($_POST['type'])->delete($_POST['id']);
        return back();
    }

    public function update(){
        Validation::make([
            'title' => 'required',
            'content' => 'required',
            'link' => 'required',
        ]);
        
        News::update();
        return redirect('news-dashboard');
    }

    public function positionsForm(){
        if($_GET['position']){
            $position = DB::table('positions')->find($_GET['position']);
            return view('admin.edit-add.positions',['position' => $position ]);
        }
        return view('admin.edit-add.positions');
    }

    public function createPosition(){
        $fields = [
            'name', 'reports', 'type', 'overview', 'responsibilities','requirements','skills'
        ];
        $data = [];

        foreach($fields as $field){
            $data[$field] = $_POST[$field];
        }
        DB::table('positions')->insert($data);
        return redirect('position-dashboard');

    }

    public function updatePosition(){
        $fields = [
            'name', 'reports', 'type', 'overview', 'responsibilities','requirements','skills'
        ];
        $data = [];
        foreach ($fields as $field) {
            if(isset($_POST[$field])){
                $data[$field] = $_POST[$field];
            }
        }

        DB::table('positions')->update($_POST['id'],$data);
        return redirect('position-dashboard');
    }

    public function positions(){
        $postions = \DB::table('positions')->get();
        return view('admin.positions',['positions' => $postions]);
    }

}
