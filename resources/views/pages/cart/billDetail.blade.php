@extends('layouts.app')

@section('content')
<div class="allOrder">
    <div class="container">
        <div class="allOrder__content">
            <h3 class="allOrder__content-title">Thông tin chi tiết mã đơn hàng số {{$billId}}</h3>
            <table>
                <thead>
                  <tr class="allOrder__content-header">
                    <th>Mã đơn hàng</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="allOrder__content-body">
                        <td>{{$item->id_invoice}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->detail_quantity}}</td>
                        <td>{{number_format($item->detail_price)}} VNĐ</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection