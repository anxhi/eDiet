<?php
namespace Models;
use eDiet\DB;

class Diet{

    protected static $fields = ['title', 'content', 'link'];

    public static function create(){

        DB::table('news')->insert([
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'link' => $_POST['link'],
            'image' => uploadImage($_FILES['image'],[
                'width' => 360,
                'height' => 205
            ]),
        ]);

    }

    public static function update(){
        $data = [];
        if($_FILES['image']['size']){
            $data['image'] = uploadImage($_FILES['image'],[
                'width' => 360,
                'height' => 205
            ]);
        }

        foreach (static::$fields as $field) {
            if(isset($_POST[$field])){
                $data[$field] = $_POST[$field];
            }
        }

        DB::table('news')->update($_POST['id'],$data);
    }

}
