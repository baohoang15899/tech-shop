<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;

class Category extends Model
{
    protected $table = "category";
    protected $id = "type_id";
    protected $primaryKey = "type_id";
    protected $fillable = ['type_name','type_description','type_img'];
    public $timestamps = false;
    public function getAll(){
        return $this->All();
    }

    public function pages($page){
        return $this->paginate($page);
    }

    public function cateLimit(){
        return $this->offset(0)->limit(3)->get();
    }


    public function cateId($primaryKey){
        return $this->find($primaryKey);
    }

    public function insertItem(Request $req){
        $validate = $req->validate([
            'name'=>'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'description' => 'required|max:255',
        ]);
        $this->type_name=$req->name;
        $this->type_description=$req->description;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $this->type_img = $name;
        }
        else{
            $this->type_img = "";
        }
        $this->save();    
    }

    public function del($primaryKey){
        $data = $this->find($primaryKey)->delete();
    }


    public function updateItem(Request $req , $primaryKey){
        $data = $this->find($primaryKey);
        $validate = $req->validate([
            'name'=>'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'description' => 'required|max:255',
        ]);
        $data->type_name= $req->name;
        $data->type_description=$req->description;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $data->type_img = $name;
        }
        else{
            $data->type_img = $data->type_img;
        }
        $data->save();    
    }

    public function indexGet($page){
        return $this->hasMany('App\Models\Product','product_type')->paginate($page);
    }

    public function index(){
        return $this->hasMany('App\Models\Product','product_type');
    }
}
