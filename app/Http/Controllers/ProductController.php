<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\invoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductController extends Controller
{
    public function __construct(Product $product,Category $cate,Brand $brand,Comment $cmt,invoiceDetail $detail){
        $this->product = $product;
        $this->cate = $cate;
        $this->brand = $brand;
        $this->cmt = $cmt;
        $this->detail = $detail;
    }

    public function delete($id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->cmt->cmtId($id);
            $bill = $this->detail->getDetailProduct($id);
            if ($bill->isEmpty()){
                if ($data ->isEmpty()) {
                    $this->product->del($id);
                    session(["message"=>"Xóa thành công"]);
                    return Redirect::to('/dashboard/productList');
                }
                else{
                    DB::table('comments')->where('id_product', $id)->delete();
                    $this->product->del($id);
                    session(["message"=>"Xóa thành công"]);
                    return Redirect::to('/dashboard/productList');
                }
            }
            else{
                session(["message"=>"Xóa không thành công, sản phẩm đang trong quá trình xử lý"]);
                return Redirect::to('/dashboard/productList');
            }
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function insert(){
        if(Session::get('name') && Session::get('id')){
            $data = $this->cate->getAll();
            $itemBrand =  $this->brand->getAll();
            return view('pages.admin.productInsert',['cate'=>$data,'brand'=>$itemBrand]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function update($id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->cate->getAll();
            $itemId = $this->product->productId($id);
            $cateName = $this->cate->cateId($itemId->product_type);
            $itemBrand =  $this->brand->getAll();
            $brandName = $this->brand->getId($itemId->product_brand);
            return view('pages.admin.productUpdate',['cate'=>$data,'id'=>$id,'itemId'=>$itemId,'name'=>$cateName,'brand'=>$itemBrand,'brandName'=>$brandName]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }


    public function checkUpdate(Request $req,$id){
        $data = $this->product->updateItem($req,$id);
        session(['update'=>"Sửa thành công"]);
        return Redirect::to('/dashboard/productList');
    }

    public function insertCheck(Request $req){
        $validate = $this->product->insertItem($req);
        session(['done'=>"Thêm thành công"]);
        return Redirect::to('/dashboard/productList');
    }



}
