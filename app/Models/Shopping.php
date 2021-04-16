<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Session;
session_start();
class Shopping extends Model
{
    use HasFactory;
    public function saveCart(Request $req){
        if(Session::get('username') && Session::get('userId') ){
            $productId = $req->id;
            $quantity = $req->quantity;
            $detail = DB::table('product')->where('id_product','=',$productId)->first();
            $data = [];
            $data['id'] = $productId;
            $data['qty'] = $quantity;
            $data['options']['img'] = $detail->product_img;
            $data['name'] = $detail->product_name;
            $data['price'] = $detail->product_price;
            $data['weight'] = 1;
            $res = Cart::add($data);
        }
    }

    

    public function delCart($rowId){
        if(Session::get('username') && Session::get('userId') ){
            if (Cart::content()) {
                Cart::remove($rowId);
            }
        }
    }

    public function upCart($rowId,Request $req){
        if(Session::get('username') && Session::get('userId') ){
            if (Cart::content()) {
                Cart::update($rowId,$req->qty);
            }
        }
    }

}
