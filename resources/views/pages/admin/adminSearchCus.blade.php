@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Tìm kiếm khách hàng</h3>

    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead class="thead-dark">
        <tr>
          <th>Tên tài khoản</th>
          <th>Mật khẩu</th>
          <th>Họ tên </th>
          <th>Địa chỉ</th>
          <th>Số điện thoại</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $user)
          <tr>
            <td>{{$user->customer_username}}</td>
            <td>{{$user->customer_password}}</td>
            <td>{{$user->customer_name}}</td>
            <td>{{$user->customer_address}}</td>
            <td>{{$user->customer_phone}}</td>
          </tr>             
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection