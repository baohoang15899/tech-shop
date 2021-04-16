<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
class Comment extends Model
{
    protected $table = "comments";
    protected $id = "id_cmt";
    protected $primaryKey = "id_cmt";
    protected $fillable = ['id_customer','id_product','comments_detail','comments_time'];
    public $timestamps = false;

    public function getCmt($productId){
        $data  = Comment::where('id_product', '=', $productId)->get();
        if(!$data->isEmpty()){
            return $data  = Comment::join('customer','comments.id_customer','=','customer.id_customer')
                                    ->where('id_product', '=', $productId)
                                    ->paginate(6);
        }
        else{
           return  false;
        }
    }

    public function searchCmt(Request $req){
        return Comment::join('customer','comments.id_customer','=','customer.id_customer')
                        ->where('customer_name','LIKE','%' . $req->search . '%')
                        ->orWhere('comments_detail','LIKE','%' . $req->search . '%')
                        ->get();
    }

    public function getAll($page){
        return $this->paginate($page);
    }

    public function cmtId($productId){
        return $data  = Comment::where('id_product', '=', $productId)->get();
    }

    public function getDelCmt($primaryKey){
        return $this->find($primaryKey)->delete();
    }

    public function insertItem(Request $req,$productId){
        if(Session::get('username') && Session::get('userId') ){
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $validate = $req->validate([
                'comment'=>'required',
            ]);
            $this->id_customer = Session::get('userId');
            $this->id_product = $productId;
            $this->comments_detail =$req->comment;
            $this->comments_time = $dt;
            $this->save();
            return true;
        }
        else{
            return false; 
        }
    }

}
