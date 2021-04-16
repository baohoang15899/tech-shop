@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm thương hiệu</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  </div>
  <div class="col-md-6">
    <form action="/dashboard/brandCheck" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên thương hiệu">
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('name')
              {{$message}}
              @enderror            
            </span>            
        </div>
      </div>
      <!-- /.card-body -->
  
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>
  </div>
@endsection