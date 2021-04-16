@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách Khách hàng</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 250px;">
          <form action="/dashboard/searchCustomer" method="POST" class="d-flex">
            @csrf
            <input type="text" name="search" class="form-control float-right" placeholder="tên tk, tên, sđt">

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
  <div class="page">
    {{$data->links("pagination::bootstrap-4")}}
</div>
  @endsection