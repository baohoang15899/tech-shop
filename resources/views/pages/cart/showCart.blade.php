@extends('layouts.app')
@section('content')
<div class="category">
    <div class="container">
        <div class="category__content">
            <ul class="category__content-menu">
                <li class='category__content-item'><a class='category__content-link' href='{{URL::to('/')}}'>Trang chủ</a></li>
                <li class='category__content-item'><a class='category__content-link' href='{{URL::to('/')}}'>Tất cả</a></li>
                <li class='category__content-item dropDown'>
                    <span class='category__content-link'>Loại</span>
                    <ul class="sub">
                        @foreach ($cate as $item)
                            <li><a class='category__content-link' href='{{URL::to("/productType/$item->type_id")}}'>{{$item->type_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class='category__content-item dropDown'>
                    <span class='category__content-link'>Hãng</span>
                    <ul class="sub">
                        @foreach ($brand as $item)
                            <li><a class='category__content-link' href='{{URL::to("/productBrand/$item->brand_id")}}'>{{$item->brand_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart">
    <div class="container">
        <div class="cart__content">
            <h3 class="cart__content-title">Giỏ hàng</h3>
            <table>
                <thead>
                  <tr class="cart__content-header">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($content as $item)
                    <tr class="cart__content-body">
                        <td><img style="width:80px" src="{{URL::asset("img/" . $item->options->img )}}" alt=""></td>
                        <td>{{$item->name}}</td>
                        <td class="cart__content-qty">
                            <form action="/upCart/{{$item->rowId}}" method="post">
                                @csrf
                                <input type="number" min="1" name="qty" value="{{$item->qty}}">
                                <button type="submit">Thêm</button>
                            </form>
                        </td>
                        <td>{{number_format($item->price * $item->qty)}} VNĐ</td>
                        <td>
                            <a href="{{URL::to("/delCart/$item->rowId")}}" class="cart__content-del">Xóa</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="cart__content-order">
            <span class="order__content-price" style="font-weight:bold;">Tổng: {{Cart::total(0,'',',')}} VNĐ</span>
            <div class="payment">
                <a href="{{URL::to("/showInfo")}}" class="cart__content-pay">Thanh toán</a>
            </div>
        </div>
        <?php
        $mess = Session::get("buy");
        if($mess){
          echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px;font-weight:bold;'> $mess </span>" ;
          Session::put("buy",null);
        }
        ?>
                <?php
                $mess = Session::get("buyErr");
                if($mess){
                  echo  "<span class='mt-15 ml-2 ' style='color:#d90429;font-size:18px;font-weight:bold;'> $mess </span>" ;
                  Session::put("buyErr",null);
                }
                ?>


    </div>
</div>
@endsection