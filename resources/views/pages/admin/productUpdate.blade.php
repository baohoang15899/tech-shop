@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thay đổi thông tin sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

  </div>
  <div class="col-md-6">
    <form action="/dashboard/checkUpdate/{{$id}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group d-flex flex-column">
          <label for="type">Loại sản phẩm</label>
          <select name="type" id="type">
            <option value={{$itemId->product_type}} >{{$name->type_name}}</option>
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
            <option value={{$itemId->product_brand}} >{{$brandName->brand_name}}</option>
            <?php
              foreach ($brand as $item) {
                echo "<option value=$item->brand_id>$item->brand_name</option>";
              }
              ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$itemId->product_name}}" placeholder="Nhập tên sản phẩm">
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
            <input type="text" class="form-control" name="ram" id="ram" value="{{$itemId->product_ram}}" placeholder="Nhập thông số RAM">
        </div>
        <div class="form-group">
            <label for="cpu">Cpu</label>
            <input type="text" class="form-control" name="cpu" value="{{$itemId->product_cpu}}" id="cpu" placeholder="Nhập thông số CPU" >
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" value="{{$itemId->product_description}}" id="description" placeholder="Nhập mô tả" >
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" min="1" id="price" value="{{$itemId->product_price}}" placeholder="Nhập giá tiền" >
        </div>
        <div class="form-group d-flex flex-column">
            <label for="status">Trạng thái</label>
            <select name="status" id="type"  >
                <option value={{$itemId->product_status}}>{{$itemId->product_status == 0 ?  "Hết hàng" : "Còn hàng"}} </option>
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