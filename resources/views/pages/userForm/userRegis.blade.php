@extends('layouts.app')

@section('content')

<div class="user">
    <div class="container">
        <div class="user__content">
            <h3 class="user__content-title">
                Trang tạo tài khoản
            </h3>
            <form action="/checkUser" method="POST">
                @csrf
                <div class="input">
                    <label for="username">Tên tài khoản: </label>
                    <input type="text" name="username" placeholder="tên tài khoản">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('username')
                    {{$message}}
                    @enderror            
                  </span>
                <div class="input">
                    <label for="password">Mật khẩu: </label>
                    <input type="password" name="password" placeholder="mật khẩu">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('password')
                    {{$message}}
                    @enderror            
                  </span>
                <div class="input">
                    <label for="password_confirmation">Nhập lại mật khẩu: </label>
                    <input type="password" name="password_confirmation" placeholder="xác nhận mật khẩu">                  
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('password_confirmation')
                    {{$message}}
                    @enderror            
                  </span>  
                <div class="input">
                    <label for="name">Tên người dùng: </label>
                    <input type="text" name="name" placeholder="tên người dùng">                  
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('name')
                    {{$message}}
                    @enderror            
                </span>     
                <div class="input">
                    <label for="address">Địa chỉ: </label>
                    <input type="text" name="address" placeholder="địa chỉ">
                </div>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('address')
                    {{$message}}
                    @enderror            
                  </span>   
                <div class="input">
                    <label for="phone">Số điện thoại: </label>
                    <input type="text" name="phone" placeholder="số điện thoại">
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
            <?php
                $mess = Session::get('user');
                if($mess){
                    echo "<span class='user__content-mess' style='color:#d90429'>$mess</span>";
                    Session::put('user',null);
                }
            ?>
                <?php
                $mess = Session::get('userDone');
                if($mess){
                    echo "<span class='user__content-mess' style='color:#32CD32'>$mess</span>";
                    Session::put('userDone',null);
                }
            ?>
        </div>
    </div>
</div>

@endsection