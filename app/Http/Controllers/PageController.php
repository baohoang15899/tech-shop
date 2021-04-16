<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Slide;
use Cart;
class PageController extends Controller
{
    public function __construct(Product $product,Category $category, Brand $brand,Comment $cmt,Customer $customer,Slide $slide){
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
        $this->cmt = $cmt;
        $this->customer = $customer;
        $this->slide = $slide;
    }
    public function home(){
        $product = $this->product->getAllJoin(8);
        $category = $this->category->cateLimit();
        $cateMenu  = $this->category->getAll();
        $brandMenu = $this->brand->getAll();
        $slideShow = $this->slide->showSlide();
        return view('pages.home.home',['products' => $product,'categories' => $category,'cate' => $cateMenu,'brand'=> $brandMenu,'slide'=>$slideShow]);
    }

    

    public function search(Request $req){
        $data = $this->product->searchProduct($req);
        $cateMenu  = $this->category->getAll();
        $brandMenu = $this->brand->getAll();
        return view('pages.home.search',["data"=>$data,'cate' => $cateMenu,'brand'=> $brandMenu]);
    } 

    public function productDetail($id){
        $data =$this->product->getDetailJoin($id);
        $cateMenu  = $this->category->getAll();
        $brandMenu = $this->brand->getAll();
        $dataCmt = $this->cmt->getCmt($id);
        return view('pages.home.productDetail',['ID'=>$id,'data'=>$data[0],'cate' => $cateMenu,'brand'=> $brandMenu,'cmt'=>$dataCmt]);
    }

    public function productType($id){
        $product = $this->category->cateId($id)->indexGet(8);
        $category = $this->category->cateLimit();
        $cateMenu  = $this->category->getAll();
        $brandMenu = $this->brand->getAll();
        $cateName = $this->category->cateId($id);
        $slideShow = $this->slide->showSlide();
        return view('pages.type.type',['products' => $product,'categories' => $category,'cate' => $cateMenu,'brand'=> $brandMenu,'name'=>$cateName,'slide'=>$slideShow]);
    }
    
    public function productBrand($id){
        $product = $this->brand->indexGetAll($id,8);
        $category = $this->category->cateLimit();
        $cateMenu  = $this->category->getAll();
        $brandMenu = $this->brand->getAll();
        $brandName = $this->brand->getId($id);
        $slideShow = $this->slide->showSlide();
        return view('pages.brand.brand',['products' => $product,'categories' => $category,'cate' => $cateMenu,'brand'=> $brandMenu,'brandName'=>$brandName,'slide'=>$slideShow]);
    }

    public function login(){
        return view('pages.userForm.userRegis');
    }

    public function userLogin(){
        return view('pages.userForm.userLogin');
    }
    
}
