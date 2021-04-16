<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;

class CustomerController extends Controller
{
    public function __construct(Customer $customer){
        $this->customer = $customer;
    }

    public function list(){
        if(Session::get('name') && Session::get('id')){
            $data =  $this->customer->pages(7);
            return view('pages.admin.customerList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }        
    }

    public function checkUser(Request $req){
        $data = $this->customer->insertUser($req);
        if(!$data){
            session(['user'=>'Tên đăng nhập đã tồn tại']);
            return Redirect::to('/login');
        }else{
            session(['userDone'=>'Tạo tài khoản thành công']);
            return Redirect::to('/login');
        }
    }

    public function checkUserLogin(Request $req){
        $data =  $this->customer->login($req);
        if($data){
            session(['username'=> $data->customer_username]);
            session(['userId'=>$data->id_customer]);
            return Redirect::to('/');
        }
        else{
            session(['error'=> "Tài khoản hoặc mật khẩu không tồn tại"]);
            return Redirect::to('/userLogin');
        }
    }

    public function detail($id){
        if(Session::get('username') && Session::get('userId') ){
            $data = $this->customer->getId($id);
            return view('pages.userForm.userDetail',["userID" => $id,"data"=>$data]);
        }
        else{
            return Redirect::to('/userLogin'); 
        }
    }

    public function logout(){
        Session::forget('username');
        Session::forget('userId');
        Cart::destroy();
        return Redirect::to('/');
    }

    public function change($id){
        $data = $this->customer->getId($id);
        return view('pages.userForm.userDetailInfo',["userID"=>$id,"data"=>$data]);
    }

    public function checkChange(Request $req,$id){
        $this->customer->updateInfo($req,$id);
        session(["userInfo"=>"Thay đổi thông tin thành công"]);
        return Redirect::to("/userDetail/$id");
    }

    public function changePass($id){
        return view('pages.userForm.userPassword',["userID"=>$id]);
    }


    public function checkChangePass($id,Request $req){
        $data = $this->customer->updatePassword($req,$id);
        if($data){
            session(["userPass"=>"Thay đổi mật khẩu thành công"]);
            return Redirect::to("/userPassword/$id");
        }else{
            session(["userErr"=>"Mật khẩu cũ không chính xác"]);
            return Redirect::to("/userPassword/$id");
        }
    }

}
