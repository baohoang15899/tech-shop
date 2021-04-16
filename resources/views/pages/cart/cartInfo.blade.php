@extends('layouts.app')

@section('content')

<div class="infoCart">
    <div class="container">
        <div class="infoCart__content">
            <h3 class="infoCart__content-title">
                Điền thông tin
            </h3>
            <form action="/checkOut" method="POST">
                @csrf
                <div class="input">
                    <label for="username">Tên người nhận: </label>
                    <input type="text" name="name">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('username')
                    {{$message}}
                    @enderror            
                  </span>     
                <div class="input">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="address">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('address')
                    {{$message}}
                    @enderror            
                  </span>   
                <div class="input">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="phone">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('phone')
                    {{$message}}
                    @enderror            
                  </span>
                  <div class="input">
                    <label for="phone">Ghi chú: </label>
                    <textarea type="text" name="description"></textarea>
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('description')
                    {{$message}}
                    @enderror            
                  </span>
                  <div class="input">
                    @foreach ($payment as $item)
                    <input type="radio" id="male" name="payment" value="{{$item->id_payment}}">
                    <label for="male">{{$item->payment_type}}</label><br>
                    @endforeach
                </div>
                  <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('payment')
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