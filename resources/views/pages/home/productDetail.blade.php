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
<div class="detail">

    <div class="container">
        <div class="detail__content">
            <div class='detail__content-img'>
                <img src='{{URL::asset("img/$data->product_img")}}' alt=''>
                </div>
            <div class='detail__content-review'>
                <h3 class='detail__content-title'>
                    Sản phẩm tại TECHSHOP {{$data->product_name}}
                </h3>

                <p class='detail__content-description'> Mô tả: {{$data->product_description}}</p>

                <span class='detail__content-type'>Loại: {{$data->type_name}}</span>

                <span class='detail__content-brand'>Hãng: {{$data->brand_name}}</span>
                <span class='detail__content-ram'>RAM: {{$data->product_ram}}</span>
                <span class='detail__content-cpu'>CPU: {{$data->product_cpu}}</span>

                <span class='detail__content-price'>Giá tiền: {{number_format($data->product_price)}} VNĐ</span>
                <div class='detail__content-group'>
                    <form action="/cartProduct" method="post">
                        @csrf
                        <label for='quantity'>Số lượng:</label>
                        <input type="hidden" name='id' value="{{$data->id_product}}">
                        <input type='number' name='quantity' min='1' value='1'>
                        <div class='detail__content-btn'>
                            @if ($data->product_status == 1)
                                @if (Session::get('username') && Session::get('userId'))
                                    <button type="submit" class='add'>Thêm vào giỏ hàng</button>
                                @else
                                    <a href='{{URL::to('/userLogin')}}' class='add'>Thêm vào giỏ hàng</a>
                                @endif                                
                            @else
                                <span style="cursor:pointer"  class='add'>Sản phẩm hết hàng</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="detail__cmt">
            <h3>Bình luận</h3>
            <form action="/checkUserCmt/{{$ID}}" method="POST">
                @csrf
                <textarea name="comment" cols="30" rows="6" placeholder="Bình luận về sản phẩm"></textarea>
                <span class='mt-15 ' style='color:#d90429;font-size:18px'>
                    @error('comment')
                    {{$message}}
                    @enderror            
                </span>   
                <div class="btn">
                    <button type="submit">Đăng bình luận</button>
                </div>
            </form>
            <div class="view">
                @if ($cmt == false)
                    <p class='mess'>Chưa có bình luận nào </p>
                @else
                    @foreach ($cmt as $detail)
                        <div class='view__cmt'>
                            <div class='group_info'>
                                <span> {{$detail->customer_name}} </span>
                                <span> {{$detail->comments_time}} </span>
                            </div>                  
                            <p>{{$detail->comments_detail}}</p>
                            @if (Session::get('userId') == $detail->id_customer)
                                <div style='margin-top:15px;'><a href='{{URL::to("/delCmt/$detail->id_cmt/$detail->id_product")}}' style='font-size:13px;color:#d90429'>Xóa bình luận</a></div>
                            @else
                                <div></div>
                            @endif
                        </div>                                 
                    @endforeach
                    <div class='page'>
                        {{$cmt->links("pagination::bootstrap-4")}}
                    </div>      
                @endif
            </div> 
            <?php
            $mess = Session::get("cmtErr");
            if($mess){
                echo  "<div style='margin-top:25px'><span style='color:#d90429;font-size:18px;margin-top:auto;'> $mess </span></div>" ;
                Session::put("cmtErr",null);
            }
            ?>   
        </div>
    </div>
</div>

@endsection
