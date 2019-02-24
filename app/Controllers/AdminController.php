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
    }

    public function __middleware(){
        return [
            'admin' => [
                'dashboard',
                'browse',
                'create',
                'add',
                'update',
                'delete'
            ],
        ];
    }

    public function dashboard(){
        return view('admin.home');
    }

//    public function news(){
//        $news = DB::table('news')->get();
//        return view('admin.news',['news' => $news]);
//    }
//
//    public function newsForm(){
//        $news = DB::table('news')->find($_GET['news']);
//        return view('admin.edit-add.news',[
//            'news' => $news
//        ]);
//    }
//
//    public function createNews(){
//         Validation::make([
//            'title' => 'required',
//            'content' => 'required',
//            'link' => 'required',
//        ]);
//
//        News::create();
//        return back();
//    }
//
        public function delete(){
            DB::table($_POST['type'])->delete($_POST['id']);
            return back();
        }
//
//    public function update(){
//        Validation::make([
//            'title' => 'required',
//            'content' => 'required',
//            'link' => 'required',
//        ]);
//
//        News::update();
//        return redirect('news-dashboard');
//    }
//
//    public function positionsForm(){
//        if($_GET['position']){
//            $position = DB::table('positions')->find($_GET['position']);
//            return view('admin.edit-add.positions',['position' => $position ]);
//        }
//        return view('admin.edit-add.positions');
//    }
//
//    public function createPosition(){
//        $fields = [
//            'name', 'reports', 'type', 'overview', 'responsibilities','requirements','skills'
//        ];
//        $data = [];
//
//        foreach($fields as $field){
//            $data[$field] = $_POST[$field];
//        }
//        DB::table('positions')->insert($data);
//        return redirect('position-dashboard');
//
//    }
//
//    public function updatePosition(){
//        $fields = [
//            'name', 'reports', 'type', 'overview', 'responsibilities','requirements','skills'
//        ];
//        $data = [];
//        foreach ($fields as $field) {
//            if(isset($_POST[$field])){
//                $data[$field] = $_POST[$field];
//            }
//        }
//
//        DB::table('positions')->update($_POST['id'],$data);
//        return redirect('position-dashboard');
//    }
//
//    public function positions(){
//        $postions = \DB::table('positions')->get();
//        return view('admin.positions',['positions' => $postions]);
//    }

    public function browse(){
//        dd(DB::table($this->slug)->get());
        $editable = [
            'name' => 'text',
            'username' => 'text',
            'role' => 'text'
        ];
        return view('admin.view',[
            'datas' => DB::table($this->slug)->get(),
            'fields' => $editable,
            'slug' => $this->slug
        ]);
    }

    public function create($id){
        if($id){
            $data = DB::table($this->slug)->find($id);
            return view('admin.edit-add.view',['data' => $data ]);
        }
        return view('admin.edit-add.view');
    }

    public function add(){
        dd($this->slug);
    }

    public function update(){
        dd($this->slug);
    }
}
