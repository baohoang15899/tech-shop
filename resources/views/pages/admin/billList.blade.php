@extends('layouts.dashboard')

@section('content')
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Danh sách hóa đơn</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 250px;">
          <form action="/dashboard/searchBill" method="POST" class="d-flex">
            @csrf
            <input type="text" name="search" class="form-control float-right" placeholder="tên, sđt, mã KH">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <span class='mt-15 ' style='color:#d90429;font-size:18px'>
            @error('search')
            {{$message}}
            @enderror            
          </span>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap ">
      <thead class="thead-dark">
        <tr>
          <th>Mã khách hàng</th>
          <th>Ghi chú</th>
          <th>Người nhận </th>
          <th>Địa chỉ</th>
          <th>Số điện thoại</th>
          <th>Tổng tiền</th>
          <th>Thanh toán</th>
          <th>Tình trạng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{$item->id_customer}}</td>
          <td>{{$item->invoice_note}}</td>
          <td>{{$item->invoice_name}}</td>
          <td>{{$item->invoice_address}}</td>
          <td>{{$item->invoice_phone}}</td>
          <td>{{$item->invoice_total}} VNĐ</td>
          <td>{{$item->invoice_payment == 1 ? "Thanh toán tại nơi" : ""}}</td>
          <td>
              <form action="/dashboard/updateBill/{{$item->id_invoice}}" method="POST">
                @csrf
                <div class="d-flex flex-column">
                    <label for="status">Tình trạng:</label>
                    <select name="status">
                      <option value="{{$item->invoice_status}}">{{$item->invoice_status == 1 ? "Hoàn thành" : "Chờ xử lý"}}</option>  
                      <option value="0">Chờ xử lý</option>
                      <option value="1">Hoàn thành</option>
                    </select>
                    <button class="bg-info border-0 rounded mt-3" type="submit">Xác nhận</button>
                </div>
            </form>
          </td>
          <td><a class="bg-info pt-2 pb-2 pl-4 pr-4 " href="{{URL::to("/dashboard/billDetail/$item->id_invoice")}}" >Chi tiết</a></td>
      </tr>             
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="page">
    {{$data->links("pagination::bootstrap-4")}}
</div>
<div class="warn">
  <?php
$mess = Session::get("baodz123");
if($mess){
  echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
  Session::put("baodz123",null);
}
?>
</div>

@endsection