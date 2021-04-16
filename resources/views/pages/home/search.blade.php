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
<div class="item">
    <div class="container">
        <div class="item__content">
            <h3 class="item__content-title">
                Search
            </h3>
            <div class="item__content-list">
                @if ($data->isEmpty())
                    <p style="color:#d90429;font-size:18px;">Sản phẩm không tồn tại</p>
                @else
                    
                @endif
                @foreach ($data as $item)
                    <div class='detail'>
                        <a href='{{URL::to("/productDetail/$item->id_product")}}' alt=''>
                        <img src= '{{URL::asset("/img/$item->product_img")}}' />
                        <a href='$detail' class='productDetail'>Chi tiết</a>
                        <span class='type'>{{$item->type_name}}</span>
                        <span class='name'>{{$item->product_name}}</span>
                        <span class='price'>{{number_format($item->product_price)}} VNĐ</span>
                        @if ($item->product_status == 1)
                        @if (Session::get('username') && Session::get('userId'))
                        <form action="/cartProduct" method="post">
                            @csrf
                            <input type="hidden" value="{{$item->id_product}}" name="id">
                            <input type="hidden" value="1" name="quantity">
                            <button type="submit" class='add'>Thêm vào giỏ hàng</button>
                        </form>
                        @else
                        <a href='{{URL::to('/userLogin')}}' class='add'>Thêm vào giỏ hàng</a>
                        @endif
                    @else
                        <button type="submit" class="add">Sản phẩm hết hàng</button>
                    @endif                                  
                        </a>
                    </div>                        
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection