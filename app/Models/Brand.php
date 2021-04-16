<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brand";
    protected $id = "brand_id";
    protected $primaryKey = "brand_id";
    protected $fillable = ['brand_name'];
    public $timestamps = false;

    public function getAll(){
        return $this->All();
    }

    public function page($page){
        return $this->paginate($page);
    }

    public function getId($primaryKey){
        return $this->find($primaryKey);
    }

    public function insert(Request $req){
        $validate = $req->validate([
            'name'=>'required',
        ]);
        $this->brand_name = $req->name;
        $this->save(); 
    }

    public function indexGet($page){
        return $this->hasMany('App\Models\Product','product_brand')->paginate($page);
    }

    public function indexGetAll($primaryKey,$page){
        return Product::join('category','product.product_type','=','category.type_id')
        ->join('brand','product.product_brand', '=','brand.brand_id')
        ->where('brand_id' ,'=', $primaryKey)
        ->paginate($page);
    }

    public function index(){
        return $this->hasMany('App\Models\Product','product_brand');
    }

    public function del($primaryKey){
        return $this->find($primaryKey)->delete();
    }


    public function updateItem(Request $req , $primaryKey){
        $data = $this->find($primaryKey);
        $validate = $req->validate([
            'name'=>'required',
        ]);
        $data->brand_name = $req->name;
        $data->save(); 
    }
    
}
