@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thay đổi thông tin danh mục</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  </div>
  <div class="col-md-6">
    <form action="/dashboard/checkCateUpdate/{{$id}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$itemId->type_name}}" placeholder="Nhập tên danh mục">
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" id="description"   value="{{$itemId->type_description}}"placeholder="Nhập mô tả" >
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Ảnh</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="img" >
              </div>
            </div>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>
  </div>
@endsection