<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use Session;
class CategoryController extends Controller
{
    public function __construct(Product $product,Category $cate){
        $this->product = $product;
        $this->cate = $cate;
    }

    public function list(){
        if(Session::get('name') && Session::get('id')){
            $data =  $this->cate->pages(7);
            return view('pages.admin.categoryList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }        
    }

    public function insert(){
        if(Session::get('name') && Session::get('id')){
            return view('pages.admin.categoryInsert');
        }
        else{
            return Redirect::to('/adminCheck');
        }         
     }

    public function insertCheck(Request $req){
        $validate = $this->cate->insertItem($req);
        session(['cate'=>"Thêm thành công"]);
        return Redirect::to('/dashboard/cateList');
    }

    public function delete($id){
        if(Session::get('name') && Session::get('id')){
            $check = $this->cate->cateId($id)->index;
            if($check->isEmpty()){
                $this->cate->del($id);
                session(["del"=>"Xóa thành công"]);
                return Redirect::to('/dashboard/cateList'); 
            }
            else{
                session(["dell"=>"Xóa không thành công, đã có sản phẩm thuộc danh mục này"]);
                return Redirect::to('/dashboard/cateList');
            }
        }
        else{
            return Redirect::to('/adminCheck');
        }  
    }

    public function update($id){
        if(Session::get('name') && Session::get('id')){
            $itemId = $this->cate->cateId($id);
            return view('pages.admin.categoryUpdate',['id'=>$id,'itemId'=>$itemId]);
        }
        else{
            return Redirect::to('/adminCheck');
        }  
    }

    public function checkUpdate(Request $req,$id){
        $data = $this->cate->updateItem($req,$id);
        session(['cool'=>"Sửa thành công"]);
        return Redirect::to('/dashboard/cateList');
    }
}
