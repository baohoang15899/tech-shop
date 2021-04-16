<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "id_product";
    protected $fillable = ['product_type','product_name','product_img','product_ram','product_cpu','product_description','product_price','product_status','product_brand'];
    public $timestamps = false;

    public function getAll(){
        return $this->All();
    }

    public function searchProduct($req){
        $validate = $req->validate([
            'search'=>'required',
        ]);
        return Product::join('category','product.product_type','=','category.type_id')
        ->join('brand','product.product_brand', '=','brand.brand_id')
        ->where('product_name','LIKE','%' . $req->search . '%')
        ->orWhere('type_name','LIKE', '%' . $req->search . '%')
        ->orWhere('brand_name','LIKE', '%' . $req->search . '%')
        ->get();
    }

    public function getAllJoin($page){
        return Product::join('category','product.product_type','=','category.type_id')
                                        ->join('brand','product.product_brand', '=','brand.brand_id')
                                        ->orderBy('id_product', 'desc')
                                        ->paginate($page);
    }

    public function getDetailJoin($primaryKey){
        return Product::join('category','product.product_type','=','category.type_id')
                        ->join('brand','product.product_brand', '=','brand.brand_id')
                        ->where('id_product','=',$primaryKey)->get();
    }

    public function getProduct($primaryKey){
        return Product::where('id_product','=',$primaryKey)->first();
    }

    public function insertItem(Request $req){
        $validate = $req->validate([
            'type'=>'required',
            'name'=>'required',
            'ram' => 'required',
            'cpu' => 'required',    
            'description' => 'required|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'price' => 'required',
            'status' => 'required',
            'brand' => 'required',
        ]);
        $this->product_type = $req->type;
        $this->product_name=$req->name;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $this->product_img = $name;
        }
        else{
            $this->product_img = "";
        }
        $this->product_ram=$req->ram;
        $this->product_cpu=$req->cpu;
        $this->product_description=$req->description;
        $this->product_price=$req->price;
        $this->product_status=$req->status;
        $this->product_brand=$req->brand;
        $this->save();    
    }

    public function productId($primaryKey){
        return $this->find($primaryKey);
    }

    public function updateItem(Request $req , $primaryKey){
        $data = $this->find($primaryKey);
        $validate = $req->validate([
            'type'=>'required',
            'name'=>'required',
            'ram' => 'required',
            'cpu' => 'required',
            'description' => 'required|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'price' => 'required',
            'status' => 'required',
            'brand' => 'required',
        ]);
        $data->product_type = $req->type;
        $data->product_name= $req->name;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $data->product_img = $name;
        }
        else{
            $data->product_img = $data->product_img;
        }
        $data->product_ram=$req->ram;
        $data->product_cpu=$req->cpu;
        $data->product_description=$req->description;
        $data->product_price=$req->price;
        $data->product_status=$req->status;
        $data->product_brand=$req->brand;
        $data->save();    
    }


    public function Page($page){
        return Product::orderBy('id_product', 'desc')->paginate($page);
    }

    
    public function del($primaryKey){
        $data = $this->find($primaryKey)->delete();
    }

}
