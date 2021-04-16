@extends('layouts.dashboard')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm slide</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  </div>
  <div class="col-md-6">
    <form action="/dashboard/slideUpdateCheck/{{$slideId}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Nội dung slide</label>
            <input type="text" class="form-control" name="content" id="name" value="{{$data->slide_content}}" placeholder="Nhập nội dung">
            <span class='mt-15 ' style='color:#d90429;font-size:18px'>
              @error('content')
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
          <span class='mt-15 ' style='color:#d90429;font-size:18px'>
            @error('img')
            {{$message}}
            @enderror            
          </span> 
      </div>
      <!-- /.card-body -->
  
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>
  </div>
@endsection