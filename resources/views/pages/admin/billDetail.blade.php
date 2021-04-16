@extends('layouts.dashboard')

@section('content')
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Hóa đơn chi tiết mã đơn hàng {{$billId}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap ">
      <thead class="thead-dark">
        <tr>
          <th>Mã đơn hàng</th>
          <th>Sản phẩm</th>
          <th>Số lượng </th>
          <th>Tổng tiền</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{$item->id_invoice}}</td>
          <td>{{$item->product_name}}</td>
          <td>{{$item->detail_quantity}}</td>
          <td>{{number_format($item->detail_price)}} VNĐ</td>
      </tr>             
        @endforeach
      </tbody>
    </table>
  </div>
@endsection