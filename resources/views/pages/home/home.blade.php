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
<div class="slide">
    <div class="container">
        <div class="slide__content">
            <div class="slide__content-next"><i class="fas fa-arrow-right"></i></div>
            <div class="slide__content-back"><i class="fas fa-arrow-left"></i></div>
            @foreach ($slide as $item)
                <div class="slide__content-show">
                    <img src="{{URL::asset("img/$item->slide_img")}}" alt="">
                    <span class="slide__content-text">
                        {{$item->slide_content}}
                    </span>
                </div>
            @endforeach
            <div class="slide__content-group">
                @foreach ($slide as $item)
                    <div class="slide__content-nav"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
    <div class="collection">
        <div class="container">
            <div class="collection__content">
                @foreach ($categories as $ca)
                    <a href='{{URL::to("/productType/$ca->type_id")}}' class='collection__content-detail'>
                        <img src='{{URL::asset("img/$ca->type_img")}}'/>
                        <span class='name'>{{$ca->type_name}} <br> collection</span>
                        <span class='shop'>Shop now</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="item__content">
                <h3 class="item__content-title">
                    products
                </h3>
                <div class="item__content-list">
                    @foreach ($products as $item)
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
                <div class="page">
                    {{$products->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
@endsection