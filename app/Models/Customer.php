<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Input;
class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $id = "id_customer";
    protected $primaryKey = "id_customer";
    protected $fillable = ['customer_username','customer_password','customer_name','customer_address','customer_phone'];
    public $timestamps = false;

    public function getAll(){
        return $this->All();
    }

    public function getId($primaryKey){
        return $this->find($primaryKey);
    }

    public function searchCustomer(Request $req){
        $validate = $req->validate([
            'search'=>'required',
        ]);
        return Customer::where('customer_username','LIKE','%' . $req->search . '%')
                        ->orWhere('customer_name','LIKE','%' . $req->search . '%')
                        ->orWhere('customer_phone','LIKE','%' . $req->search . '%')
                        ->get();
    }

    public function pages($page){
        return $this->paginate($page);
    }

    public function login(Request $req){
        $validate = $req->validate([
            'username'=>'required',
            'password' => 'required', 
        ]);
        $data  = Customer::where('customer_username', '=', $req->username)->where('customer_password', '=', $req->password)->first();
        return $data;
    }

    public function updateInfo(Request $req,$primaryKey){
        $validate = $req->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|max:10'
        ]);
        $data = $this->find($primaryKey);
        $data->customer_username = $data->customer_username;
        $data->customer_password = $data->customer_password;
        $data->customer_name = $req->name;
        $data->customer_address = $req->address;
        $data->customer_phone = $req->phone;
        $data->save();
    }

    public function updatePassword(Request $req,$primaryKey){
        $validate = $req->validate([
            'oldPassword'=>'required',
            'password' => 'required|max:16|confirmed|min:8',
        ]);
        $data = $this->find($primaryKey);
        if ($req->oldPassword == $data->customer_password) {
            $data->customer_username = $data->customer_username;
            $data->customer_password = $req->password;
            $data->customer_name = $data->customer_name;
            $data->customer_address = $data->customer_address;
            $data->customer_phone = $data->customer_phone;
            $data->save();
            return true;
        }
        else{
            return false;
        }
    }

    public function insertUser(Request $req){ 
        $check  = Customer::where('customer_username', '=', $req->username)->count();
        if($check > 0){
            return false;
        }else{
            $validate = $req->validate([
                'username'=>'required',
                'password' => 'required|max:16|confirmed|min:8', 
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required|max:10'
            ]);
            $this->customer_username = $req->username;
            $this->customer_password = $req->password;
            $this->customer_name = $req->name;
            $this->customer_address = $req->address;
            $this->customer_phone = $req->phone;
            $this->save();
            return true;
        }
    }
}
