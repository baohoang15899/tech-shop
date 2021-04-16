<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Cart;

class Invoice extends Model
{
    protected $table = "invoice";
    protected $id = "id_invoice";
    protected $primaryKey = "id_invoice";
    protected $fillable = ['id_customer','invoice_name','invoice_date','invoice_note','invoice_total','invoice_address','invoice_payment','invoice_phone','invoice_status'];
    public $timestamps = false;

    public function getAll(){
        return Invoice::orderBy('id_invoice', 'desc')->paginate(8);
    }

    public function getCustomerBill($customer){
        return Invoice::where('id_customer','=',$customer)->orderBy('id_invoice', 'desc')->paginate(10);
    }

    public function searchBill(Request $req){
        $validate = $req->validate([
            'search'=>'required',
        ]);
        return Invoice::where('invoice_name','LIKE','%' . $req->search . '%')
                        ->orWhere('invoice_phone','LIKE','%' . $req->search . '%')
                        ->orWhere('id_customer','LIKE','%' . $req->search . '%')
                        ->get();
    }

    public function updateBill(Request $req,$primaryKey){
        $data = $this->find($primaryKey);
        $validate = $req->validate([
            'status'=>'required',
        ]);
        $data->invoice_name = $data->invoice_name;
        $data->invoice_date =   $data->invoice_date;
        $data->id_customer = $data->id_customer;
        $data->invoice_note =  $data->invoice_note;
        $data->invoice_address = $data->invoice_address;
        $data->invoice_total = $data->invoice_total;
        $data->invoice_phone = $data->invoice_phone;
        $data->invoice_status = $req->status;
        $data->invoice_payment = $data->invoice_payment;
        $data->save();
    }

    public function insertBill(Request $req){
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $validate = $req->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|max:10',
            'description'=>'required',
            'payment'=>'required',
        ]);
        $this->invoice_name = $req->name;
        $this->invoice_date = $dt;
        $this->id_customer = Session::get('userId');
        $this->invoice_note = $req->description;
        $this->invoice_address = $req->address;
        $this->invoice_total = Cart::total(0,'',',');
        $this->invoice_phone = $req->phone;
        $this->invoice_status = 0;
        $this->invoice_payment = $req->payment;
        $this->save();
        return $this->id_invoice;
    }
}

