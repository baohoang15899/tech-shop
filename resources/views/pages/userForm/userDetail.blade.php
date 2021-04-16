@extends('layouts.app')

@section('content')
<div class="userDetail">
    <div class="container">
        <div class="userDetail__content" >
            <h2>Thông tin người dùng {{Session::get('username')}}</h2>
            <table>
              <tr class="row"><th>Mã tài khoản: </th><td>{{$data->id_customer}}</td></tr>
              <tr class="row"><th>Tên đăng nhập: </th><td>{{$data->customer_username}}</td></tr>
              <tr class="row"><th>Mật khẩu: </th><td>*******</td></tr>
              <tr class="row"><th>Họ tên: </th><td>{{$data->customer_name}}</td></tr>
              <tr class="row"><th>Địa chỉ: </th><td>{{$data->customer_address}}</td></tr>
              <tr class="row"><th>Số điện thoại: </th><td>{{$data->customer_phone}}</td></tr>
            </table>
            <div class="info">
                <a href="{{URL::to("/userChange/$data->id_customer")}}">Thay đổi thông tin cá nhân</a>
            </div>
            <div class="pass">
                <a href="{{URL::to("/userPassword/$data->id_customer")}}">Thay đổi mật khẩu</a>
            </div>
            <?php
            $mess = Session::get("userInfo");
            if($mess){
              echo  "<span style='color:#32CD32;font-size:18px;text-align:center;margin-top:15px'> $mess </span>" ;
              Session::put("userInfo",null);
            }
          ?>
        </div>
    </div>
</div>
@endsection
