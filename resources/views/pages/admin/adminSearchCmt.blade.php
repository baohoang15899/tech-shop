@extends('layouts.dashboard')

@section('content')
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Tìm kiếm bình luận</h3>

    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap ">
      <thead class="thead-dark">
        <tr>
          <th>Người dùng</th>
          <th>Sản phẩm</th>
          <th>Nội dung</th>
          <th>Thời gian</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
          <?php
                function getName($value){
                    $userName = DB::table('customer')->select('customer_name')->where('id_customer','=',$value)->get();
                    return $userName[0]->customer_name;
                }
                function getProduct($value){
                    $userName = DB::table('product')->select('product_name')->where('id_product','=',$value)->get();
                    return $userName[0]->product_name;
                }
                foreach ($data as $item ) {
                    $id = $item->id_cmt;
                    $url = URL::to("/dashboard/cmtDelete/$id");
                    // $up = URL::to("/dashboard/cateUpdate/$id");
                    $name = getName($item->id_customer);
                    $product = getProduct($item->id_product);
                    echo("
                    <tr>
                        <td>$name</td>
                        <td>$product</td>
                        <td>$item->comments_detail</td>
                        <td>$item->comments_time</td>
                        <td>
                            <div class='d-flex'>
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
  @endsection