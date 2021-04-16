@extends('layouts.app')

@section('content')

<div class="user">
    <div class="container">
        <div class="user__content">
            <h3 class="user__content-title">
                Trang đăng nhập người dùng
            </h3>
            <form action="/checkUserLogin" method="POST">
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
                <div class="btn">
                    <button type="submit">Xác nhận</button>
                </div>
            </form>
            <?php
            $mess = Session::get('error');
            if($mess){
                echo "<span class='user__content-mess'>$mess</span>";
                Session::put('error',null);
            }
        ?>
        </div>
    </div>
</div>

@endsection