@extends('layouts.app')

@section('content')

<div class="user">
    <div class="container">
        <div class="user__content">
            <h3 class="user__content-title">
                Trang sửa thông tin 
            </h3>
            <form action="/checkChangeUser/{{$userID}}" method="POST">
                @csrf 
                <div class="input">
                    <label for="name">Tên người dùng: </label>
                    <input type="text" name="name" value="{{$data->customer_name}}">                  
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('name')
                    {{$message}}
                    @enderror            
                </span>     
                <div class="input">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="address"  value="{{$data->customer_address}}">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('address')
                    {{$message}}
                    @enderror            
                  </span>   
                <div class="input">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="phone"  value="{{$data->customer_phone}}">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('phone')
                    {{$message}}
                    @enderror            
                  </span>   
                <div class="btn">
                    <button type="submit">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection