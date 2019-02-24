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
        $this->editable = [
            'users' => [
                'name' => 'text',
                'username' => 'text',
                'role' => 'text'
            ],
            'foods' => [
                'name' => 'text',
                'calories' => 'number',
                'category' => 'text',
            ]
        ];
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
}
