@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  </div>
  <div class="col-6">
    <form action="/dashboard/check" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group d-flex flex-column">
          <label for="type">Loại sản phẩm</label>
          <select name="type" id="type">
            <?php
              foreach ($cate as $item) {
                echo "<option value=$item->type_id>$item->type_name</option>";
              }
              ?>
          </select>
        </div>
        <div class="form-group d-flex flex-column">
          <label for="brand">Thương hiệu</label>
          <select name="brand" id="brand"  >
            <?php
              foreach ($brand as $item) {
                echo "<option value=$item->brand_id>$item->brand_name</option>";
              }
              ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('name')
              {{$message}}
              @enderror            
            </span>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Ảnh sản phẩm</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="img" >
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="ram">Ram</label>
            <input type="text" class="form-control" name="ram" id="ram" placeholder="Nhập thông số RAM">
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('ram')
              {{$message}}
              @enderror            
            </span>            
        </div>
        <div class="form-group">
            <label for="cpu">Cpu</label>
            <input type="text" class="form-control" name="cpu" id="cpu" placeholder="Nhập thông số CPU" >
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('cpu')
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
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" id="price" min="1" placeholder="Nhập giá tiền" >
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('price')
              {{$message}}
              @enderror            
            </span>
        </div>
        <div class="form-group d-flex flex-column">
          <label for="status">Trạng thái</label>
          <select name="status" id="status"  >
              <option value="0">Hết hàng</option>
              <option value="1">Còn hàng</option>
            </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>       
  </div>
@endsection