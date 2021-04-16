<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')  }}" />
    <script src="https://kit.fontawesome.com/d3feac1540.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="contact">
            <div class="container">
                <div class="contact__content">
                    <div class="contact__content-left">
                        <span>Phone: 0975128204</span>
                        <span>bao15899@gmail.com</span>
                        <span>Đào Tấn-Ba Đình </span>
                    </div>
                    <div class="contact__content-right">
                        <?php
                            $username = Session::get('username');
                            $userid = Session::get('userId');
                            $login = URL::to('/login');
                            $sign = URL::to('/userLogin');
                            $logout = URL::to('/userLogout');
                            $detail = URL::to("/userDetail/$userid");
                            $detailBill = URL::to("checkAllOrder/$userid");
                            if($username && $userid){
                                echo("                        
                                    <a href='$detail' alt='' class='sign name'>$username</a>
                                    <a href='$detailBill'>Kiểm tra đơn hàng</a>
                                    <a href='$logout' alt='' class='sign'>Đăng xuất</a>
                                    "
                            );
                            }
                            else{
                                echo("
                                <a href='$login' class='sign'>Tạo tài khoản</a>
                                <a href='$sign' class='sign'>Đăng nhập</a>                                
                                ");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="header__content">
                    <a href="/" class="header__content-logo">Tech Shop</a>
                    <div class="header__content-search">
                        <form action="/search" method="POST">
                            @csrf
                            <input type="text" name="search" placeholder="Tên,loại,thương hiệu " >
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="header__content-cart">
                        <a href="{{URL::to('/showCart')}}"><i class="fas fa-shopping-cart icon"></i></a>
                        <span style="inCart">{{Cart::count()}}</span>
                    </div>
                </div>
                <div style="text-align:center;margin-top:10px">
                    <span class='mt-15 '  style='color:#d90429;font-size:18px;'>
                        @error('search')
                        {{$message}}
                        @enderror            
                      </span>
                </div>
            </div>
        </div>
        {{-- <div class="banner" style="background-image: url({{URL::asset('img/bg.jpg')  }})">
            <div class="container">
                <div class="banner__content">
                    <h3 class="banner__content-text">We Have</h3>
                    <p class="banner__content-item">PC, Laptop and Tablet</p>
                    <p class="banner__content-description">Happy shopping </p>
                </div>
            </div>
        </div> --}}
        @yield('content')
        <div class="footer">
            <div class="container">
                <div class="footer__content">
                    <small> Happy Shopping !</small>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{URL::asset('js/app.js')}}"></script>
</html>