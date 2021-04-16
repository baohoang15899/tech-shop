@extends('layouts.dashboard')

@section('content')
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Danh sách thương hiệu</h3>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap ">
      <thead class="thead-dark">
        <tr>
          <th>Tên</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{$item->brand_name}}</td>
          <td>
              <div class='d-flex'>
                <a href='{{URL::to("/dashboard/brandUpdate/$item->brand_id")}}' class='bg-info pt-2 pb-2 pl-4 pr-4 '>Sửa</a>
                  <a href='{{URL::to("/dashboard/brandDelete/$item->brand_id")}}' class='bg-info ml-3 pt-2 pb-2 pl-4 pr-4 '>Xóa</a>
              </div>
          </td>
      </tr>             
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="page">
    {{$data->links("pagination::bootstrap-4")}}
</div>
<div class="warn">
    <?php
    $mess = Session::get("brand");
    if($mess){
      echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
      Session::put("brand",null);
    }
    ?>
        <?php
        $mess = Session::get("del");
        if($mess){
          echo  "<span class='mt-15 ml-2' style='color:#d90429;font-size:18px'> $mess </span>" ;
          Session::put("del",null);
        }
        ?>
              <?php
              $mess = Session::get("sua");
              if($mess){
                echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
                Session::put("sua",null);
              }
              
            ?>
                    <?php
                    $mess = Session::get("dell");
                    if($mess){
                      echo  "<span class='mt-15 ml-2 ' style='color:#d90429;font-size:18px'> $mess </span>" ;
                      Session::put("dell",null);
                    }
                    ?>
  </div>
  @endsection