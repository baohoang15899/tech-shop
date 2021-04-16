<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Slide extends Model
{
    use HasFactory;
    protected $table = "slide";
    protected $id = "id_slide";
    protected $primaryKey = "id_slide";
    protected $fillable = ['slide_content','slide_img'];
    public $timestamps = false;

    public function showSlide(){
        return $this->orderBy('id_slide', 'DESC')->offset(0)->limit(3)->get();
    }

    public function getAll(){
        return Slide::orderBy('id_slide', 'DESC')->paginate(6);
    }

    public function findSlide($primaryKey){
        return $this->find($primaryKey);
    }

    public function insertSlideItem(Request $req){
        $validate = $req->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'content' => 'required|max:255',
        ]);
        $this->slide_content=$req->content;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $this->slide_img = $name;
        }
        $this->save(); 
    }

    public function deleteSlide($primaryKey){
        $this->find($primaryKey)->delete();
    }

    public function updateSlide(Request $req,$primaryKey){
        $data = $this->find($primaryKey);
        $validate = $req->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'content' => 'required|max:255',
        ]);
        $data->slide_content = $req->content;
        if($req->hasFile('img')){
            $image= $req->file('img') ;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $path =  public_path('/img');
            $image -> move($path,$name);
            $data->slide_img = $name;
        }
        else{
            $data->slide_img = $data->slide_img;
        }
        $data->save();
    }
}
