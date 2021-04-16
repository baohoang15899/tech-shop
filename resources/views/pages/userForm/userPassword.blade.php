@extends('layouts.app')

@section('content')

<div class="user">
    <div class="container">
        <div class="user__content">
            <h3 class="user__content-title">
                Thay đổi mật khẩu
            </h3>
            <form action="/checkChangePass/{{$userID}}" method="POST">
                @csrf
                <div class="input">
                    <label for="password">Mật khẩu cũ: </label>
                    <input type="password" name="oldPassword" placeholder="mật khẩu cũ">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('oldPassword')
                    {{$message}}
                    @enderror            
                  </span>
                <div class="input">
                    <label for="password">Mật khẩu mới: </label>
                    <input type="password" name="password" placeholder="mật khẩu mới">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('password')
                    {{$message}}
                    @enderror            
                  </span>
                <div class="input">
                    <label for="password_confirmation">Nhập lại mật khẩu: </label>
                    <input type="password" name="password_confirmation" placeholder="xác nhận mật khẩu mới">                  
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('password_confirmation')
                    {{$message}}
                    @enderror            
                  </span>  
                <div class="btn">
                    <button type="submit">Xác nhận</button>
                </div>          
            </form>
            <?php
            $mess = Session::get("userPass");
            if($mess){
              echo  "<span style='color:#32CD32;font-size:18px;text-align:center;margin-top:15px'> $mess </span>" ;
              Session::put("userPass",null);
            }
          ?>
            <?php
            $mess = Session::get("userErr");
            if($mess){
              echo  "<span style='color:#d90429;font-size:18px;text-align:center;margin-top:15px'> $mess </span>" ;
              Session::put("userErr",null);
            }
          ?>    
        </div>
    </div>
</div>

@endsection