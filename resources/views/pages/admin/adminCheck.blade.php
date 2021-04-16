@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bạn không có đủ quyền để truy cập thông tin</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- /.card-body -->
  </div>
  <div>
    <a href='{{URL::to('/admin')}}' class='d-block ml-2 mb-3 mt-3 font-weight-bold'>Đăng nhập để có quyền xem và chỉnh sửa thông tin</a>
</div>
@endsection  