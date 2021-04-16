@extends('layouts.app')

@section('content')
<div class="allOrder">
    <div class="container">
        <div class="allOrder__content">
            <h3 class="allOrder__content-title">Thông tin các đơn hàng</h3>
            <table>
                <thead>
                  <tr class="allOrder__content-header">
                    <th>Người nhận</th>
                    <th>Ghi chú</th>
                    <th>thanh toán</th>
                    <th>Tổng tiền</th>
                    <th>Thời gian</th>
                    <th>Tình trạng</th>
                    <th>Chi tiết</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="allOrder__content-body">
                        <td>{{$item->invoice_name}}</td>
                        <td style="width:120px;font-size:14px;">{{$item->invoice_note}}</td>
                        <td>{{$item->invoice_payment == 1 ? "Thanh toán tại nơi" : ""}}</td>
                        <td>{{$item->invoice_total}} VNĐ</td>
                        <td>{{$item->invoice_date}}</td>
                        <td>{{$item->invoice_status == 1 ? "Hoàn thành" : "Chờ xử lý"}}</td>
                        <td><a class="allOrder__content-billBtn" href="{{URL::to("/billDetail/$item->id_invoice")}}">Chi tiết</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="page">
                {{$data->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
</div>
@endsection