@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách sản phẩm</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 250px;">
          <form action="/dashboard/searchProduct" method="POST" class="d-flex">
            @csrf
            <input type="text" name="search" class="form-control float-right" placeholder="Tên,loại,thương hiệu">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <span class='mt-15 ' style='color:#d90429;font-size:18px'>
            @error('search')
            {{$message}}
            @enderror            
          </span>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead class="thead-dark">
        <tr>
          <th>Tên</th>
          <th>Loại</th>
          <th>Thương hiệu</th>
          <th>Ảnh</th>
          <th>Ram</th>
          <th>Cpu</th>
          <th>Mô tả</th>
          <th>Giá</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
          <?php
              function productType($value){
                  $type = DB::table('category')
                  ->join('product', 'category.type_id', '=', 'product.product_type')
                  ->select('type_name')
                  ->where('product.id_product',"=",$value)
                  ->get();
                  return $type[0]->type_name;                          
                  };
                function productBrand($value){
                  $type = DB::table('brand')
                  ->join('product', 'brand.brand_id', '=', 'product.product_brand')
                  ->select('brand_name')
                  ->where('product.id_product',"=",$value)
                  ->get();
                  return $type[0]->brand_name;                          
                };                 
                foreach ($products as $product ) {
                    $id = $product->id_product;
                    $url = URL::to("/dashboard/delete/$id");
                    $up = URL::to("/dashboard/update/$id");
                    $img = URL::asset("img/$product->product_img");
                    $type = productType($id);
                    $brand = productBrand($id);
                    $price = number_format($product->product_price);
                    $status = $product->product_status ==0 ? 'Hết hàng' : 'Còn hàng';
                    echo("
                    <tr>
                        <td>$product->product_name</td>
                        <td>$type</td>
                        <td>$brand</td>
                        <td>
                            <img style = 'width:80px' src ='$img'></img>
                          </td>
                        <td>$product->product_ram</td>
                        <td>$product->product_cpu</td>
                        <td>$product->product_description.</td>
                        <td> $price VNĐ </td>
                        <td>$status </td>
                        <td>
                            <div class='d-flex'>
                                <a href='$up' class='bg-info pt-2 pb-2 pl-4 pr-4 '>Sửa</a>
                                <a href='$url' class='bg-info ml-3 pt-2 pb-2 pl-4 pr-4 '>Xóa</a>
                            </div>
                        </td>
                    </tr>     
                    ");
                }
            ?>

      </tbody>
    </table>
  </div>
  <div class="page">
    {{$products->links("pagination::bootstrap-4")}}
</div>
<div class="warn">
  <?php
  $mess = Session::get("message");
  if($mess){
    echo  "<span class='mt-15 ml-2 ' style='color:#d90429;font-size:18px'> $mess </span>" ;
    Session::put("message",null);
  }
  ?>

    <?php
    $mess = Session::get("update");
    if($mess){
      echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
      Session::put("update",null);
    }

    ?>
    <?php
    $mess = Session::get("done");
    if($mess){
      echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
      Session::put("done",null);
    }
    
  ?>
</div>
  @endsection