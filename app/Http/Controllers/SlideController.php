<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class SlideController extends Controller
{
    public function __construct(Slide $slide){
        $this->slide = $slide;
    }

    public function getAllSlide(){
        if(Session::get('name') && Session::get('id')){
            $data = $this->slide->getAll();
            return view('pages.admin.slideList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function insertForm(){
        if(Session::get('name') && Session::get('id')){
            return view('pages.admin.slideInsert');
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function slideInsert(Request $req){
        if(Session::get('name') && Session::get('id')){
            $this->slide->insertSlideItem($req);
            session(["slide"=>"Thêm thành công"]);
            return Redirect::to('/dashboard/slide');
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function slideDelete($id){
        if(Session::get('name') && Session::get('id')){
            $this->slide->deleteSlide($id);
            session(["slide"=>"Xóa thành công"]);
            return Redirect::to('/dashboard/slide');
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function slideUpdate($id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->slide->findSlide($id);
            return view("pages.admin.slideUpdate",["slideId" =>$id,"data"=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function slideCheckUpdate(Request $req,$id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->slide->updateSlide($req,$id);
            session(["slide"=>"Sửa thành công"]);
            return Redirect::to('/dashboard/slide');
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

}
