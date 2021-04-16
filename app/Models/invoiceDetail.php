<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cart;
class invoiceDetail extends Model
{
    use HasFactory;
    protected $table = "invoice_detail";
    protected $id = "id_detail";
    protected $primaryKey = "id_detail";
    protected $fillable = ['id_invoice','id_product','detail_quantity','detail_price'];
    public $timestamps = false;

    public function insertBillDetail($idInvoice){
        $data = Cart::content();
        foreach ($data as $item) {
            $ite = [];
            $ite['id_invoice'] = $idInvoice;
            $ite['id_product'] = $item->id;
            $ite['detail_quantity'] = $item->qty;
            $ite['detail_price'] = $item->price * $item->qty;
            invoiceDetail::insert($ite);
        }
    }

    public function getDetailBill($idInvoice){
        return InvoiceDetail::join('product','invoice_detail.id_product','=','product.id_product')->where('id_invoice','=',$idInvoice)->get();
    }

    public function getDetailProduct($idProduct){
        return InvoiceDetail::where('id_product','=',$idProduct)->get();
    }
}


