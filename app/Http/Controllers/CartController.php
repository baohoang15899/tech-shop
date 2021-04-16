<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shopping;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Payment;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
class CartController extends Controller
{
    public function __construct(Product $product,Shopping $cart,Category $category,Brand $brand,Payment $payment){
        $this->product = $product;
        $this->cart = $cart;
        $this->category = $category;
        $this->brand = $brand;
        $this->payment = $payment;
    }

    public function getProduct(Request $req){
       if(Session::get('username') && Session::get('userId') ){
        $this->cart->saveCart($req);
        return Redirect::to('/showCart');
        }
    }

    public function delPro($rowId){
        if(Session::get('username') && Session::get('userId') ){
            $this->cart->delCart($rowId);
            return Redirect::to('/showCart'); 
        }
    }

    public function upPro($rowId,Request $req){
        if(Session::get('username') && Session::get('userId') ){
            $this->cart->upCart($rowId,$req);
            return Redirect::to('/showCart'); 
        }
    }

    public function showCart(){
        if(Session::get('username') && Session::get('userId') ){
            $data = Cart::content();
            $cateMenu  = $this->category->getAll();
            $brandMenu = $this->brand->getAll();
            return view('pages.cart.showCart',['content'=>$data,'cate' => $cateMenu,'brand'=> $brandMenu]);
        }
        else{
            return Redirect::to('/userLogin');
            } 
    }

    public function showInfo(){
        if(Session::get('username') && Session::get('userId') ){
            $data = $this->payment->getAll();
            return view('pages.cart.cartInfo',["payment"=>$data]);
        }
    }
}
