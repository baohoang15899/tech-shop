@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm danh mục</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  </div>
  <div class="col-md-6">
    <form action="/dashboard/cateCheck" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('name')
              {{$message}}
              @enderror            
            </span>            
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Nhập mô tả" >
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('description')
              {{$message}}
              @enderror            
            </span>
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