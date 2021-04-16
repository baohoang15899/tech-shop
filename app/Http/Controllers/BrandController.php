<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Redirect;
use Session;
class BrandController extends Controller
{
    public function __construct(Brand $brand){
        $this->brand = $brand;
    }

    public function list(){
        if(Session::get('name') && Session::get('id')){
            $data = $this->brand->page(7);
            return view('pages.admin.brandList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function insert(){
        if(Session::get('name') && Session::get('id')){
            return view('pages.admin.brandInsert');
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function insertCheck(Request $req){
        if(Session::get('name') && Session::get('id')){
            $this->brand->insert($req);
            session(['brand'=>"Thêm thành công"]);
            return Redirect::to('/dashboard/brandList');
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function update($id){
        if(Session::get('name') && Session::get('id')){
            $itemId = $this->brand->getId($id);
            return view('pages.admin.brandUpdate',['id'=>$id,'itemId'=>$itemId]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function updateCheck(Request $req , $id){
        $this->brand->updateItem($req,$id);
        session(['sua'=>"Sửa thành công"]);
        return Redirect::to('/dashboard/brandList');
    }

    public function delete($id){
        if(Session::get('name') && Session::get('id')){
            $check = $this->brand->getId($id)->index;
            if($check->isEmpty()){
                $this->brand->del($id);
                session(["del"=>"Xóa thành công"]);
                return Redirect::to('/dashboard/brandList'); 
            }
            else{
                session(["dell"=>"Xóa không thành công, đã có sản phẩm thuộc hãng này"]);
                return Redirect::to('/dashboard/brandList');
            }    
        }
        else{
            return Redirect::to('/adminCheck');
        }       
    }

}
