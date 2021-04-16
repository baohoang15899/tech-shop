<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use App\Models\Product;
use Session;

class CommentController extends Controller
{
    public function __construct(Comment $cmt,Product $product){
        $this->cmt = $cmt;
        $this->product = $product;
    }

    public function list(){
        if(Session::get('name') && Session::get('id')){
            $data = $this->cmt->getAll(7);
            return view('pages.admin.cmtList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }    
    }

    public function delete($id){
        if(Session::get('name') && Session::get('id')){
            $this->cmt->getDelCmt($id);
            session(["cmtDel"=>"Xóa bình luận thành công"]);
            return Redirect::to("/dashboard/cmt");
        }
        else{
            return Redirect::to('/adminCheck');
        }    
    }

    public function insertCmt(Request $req, $productId){
        $data = $this->cmt->insertItem($req,$productId);
        if($data){
            return Redirect::to("/productDetail/$productId");
        }
        else{
            session(["cmtErr"=>"Đăng nhập để nhập bình luận"]);
            return Redirect::to("/productDetail/$productId");
        }
    }

    public function delCmt($id,$productId){
        $this->cmt->getDelCmt($id);
        session(["cmtErr"=>"Xóa bình luận thành công"]);
        return Redirect::to("/productDetail/$productId");
    }

}
