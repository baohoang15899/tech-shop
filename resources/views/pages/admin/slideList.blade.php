@extends('layouts.dashboard')

@section('content')
<div class="card ">
    <div class="card-header">
      <h3 class="card-title">Danh sách slide</h3>

    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap ">
      <thead class="thead-dark">
        <tr>
          <th>Nội dung</th>
          <th>Ảnh</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{$item->slide_content}}</td>
          <td>
              <img style="width:120px;" src="{{URL::asset("img/$item->slide_img")}}" alt="">
          </td>
          <td>
              <div class='d-flex'>
                <a href='{{URL::to("/dashboard/slideUpdate/$item->id_slide")}}' class='bg-info pt-2 pb-2 pl-4 pr-4 '>Sửa</a>
                  <a href='{{URL::to("/dashboard/slideDelete/$item->id_slide")}}' class='bg-info ml-3 pt-2 pb-2 pl-4 pr-4 '>Xóa</a>
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
    $mess = Session::get("slide");
    if($mess){
      echo  "<span class='mt-15 ml-2 ' style='color:#32CD32;font-size:18px'> $mess </span>" ;
      Session::put("slide",null);
    }

    ?>
</div>
  @endsection