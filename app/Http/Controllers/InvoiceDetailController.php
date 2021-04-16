<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Invoice;
use App\Models\invoiceDetail;
use Illuminate\Support\Facades\DB;
use Session;
use Cart;

class InvoiceDetailController extends Controller
{
    public function __construct(Invoice $invoice,invoiceDetail $detail){
        $this->invoice = $invoice;
        $this->detail = $detail;
    }

    public function getAll($id){
        $data = $this->detail->getDetailBill($id);
        return view('pages.cart.billDetail',['billId'=>$id,'data'=>$data]);
    }

    public function getAllBillDetail($id){
        if(Session::get('name') && Session::get('id')){
            $data = $this->detail->getDetailBill($id);
            return view('pages.admin.billDetail',['billId'=>$id,'data'=>$data]);
        }
        else{
            return Redirect::to('/adminCheck');
        }
    }

}
