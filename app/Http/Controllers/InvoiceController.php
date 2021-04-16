<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Invoice;
use App\Models\invoiceDetail;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;


class InvoiceController extends Controller
{
    public function __construct(Invoice $invoice,invoiceDetail $detail){
        $this->invoice = $invoice;
        $this->detail = $detail;
    }


    public function getAll($id){
        if(Session::get('username') && Session::get('userId') ){
            $data = $this->invoice->getCustomerBill($id);
            return view('pages.cart.allOrder',['data'=>$data]);
        }
    }

    public function getAllBill(){
        if(Session::get('name') && Session::get('id')){
            $data = $this->invoice->getAll();
            return view('pages.admin.billList',['data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }


    public function updateStatus(Request $req,$id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->invoice->updateBill($req,$id);
            session(["baodz123"=>"Cập nhật trạng thái thành công"]);
            return Redirect::to('/dashboard/Bill');
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

    public function insertInvoice(Request $req){
        if(Cart::total()>0){
            $data = $this->invoice->insertBill($req);
            $this->detail->insertBillDetail($data);
            Cart::destroy();
            session(["buy"=>"Thanh toán thành công, vui lòng kiểm tra đơn hàng"]);
            return Redirect::to('/showCart');
        }
        else{
            session(["buyErr"=>"Vui lòng không để giỏ hàng trống"]);
            return Redirect::to('/showCart');
        }
    }
}
