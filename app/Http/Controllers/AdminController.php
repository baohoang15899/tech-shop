<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Comment;
use Session;

class AdminController extends Controller
{
    public function __construct(Product $product,Customer $customer,Invoice $invoice,Comment $cmt){
        $this->product = $product;
        $this->customer = $customer;
        $this->invoice = $invoice;
        $this->cmt = $cmt;
    }

    public function admin(){
        return view('layouts.adminLogin');
    }

    public function adminCheck(){
        return view('pages.admin.adminCheck');
    }

    public function searchProduct(Request $req){
        if(Session::get('name') && Session::get('id')){
            $products = $this->product->searchProduct($req);
            return view('pages.admin.adminSearchPro',['products' => $products]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function searchCustomer(Request $req){
        if(Session::get('name') && Session::get('id')){
            $data = $this->customer->searchCustomer($req);
            return view('pages.admin.adminSearchCus',['data' => $data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function searchBill(Request $req){
        if(Session::get('name') && Session::get('id')){
            $data = $this->invoice->searchBill($req);
            return view('pages.admin.adminSearchBill',['data' => $data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }
    public function searchCmt(Request $req){
        if(Session::get('name') && Session::get('id')){
            $data = $this->cmt->searchCmt($req);
            return view('pages.admin.adminSearchCmt',['data' => $data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }   
    }

    public function list(){
        if(Session::get('name') && Session::get('id')){
            $products = $this->product->Page(6);
            return view('pages.admin.productList',['products' => $products]);
        }
        else{
            return Redirect::to('/adminCheck');
        }        
    }

    public function dash(){
        return view('layouts.dashboard');
    }

    public function logout(){
        Session::forget('name');
        Session::forget('id');
         return Redirect::to('/admin');
    }



    public function check(Request $req){
        $data = Admin::All();
        $name = $req->username;
        $pass = $req->password;
        $result =  $data->where('admin_username','=',$name)
                     ->where('admin_password','=',$pass)->first();
        if($result){
            session(['name'=> $result->admin_username]);
            session(['id'=> $result->id_admin]);
            return Redirect::to('/dashboard');
            
        }
        else{
            session(['mess'=> 'Tên đang nhập hoặc mật khẩu không đúng !']);
            return Redirect::to('/admin');
        }
    }
}
