@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/tintuc/list">User &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">&nbsp;&nbsp;Tạo user mới</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/user/add" method="POST" name="main-form" id="main-from" class="row" enctype="multipart/form-data">
                <div class="flexbox-right col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Nhập email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Nhập password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="passwordAgain" value="{{ old('passwordAgain') }}" placeholder="Nhập lại password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Cấp bậc</label>
                        <label class="radio-inline" for="noibat">Admin</label>
                        <input type="radio" name="level" value="1" checked />

                        <label class="radio-inline">Thường</label>
                        <input type="radio" name="level" value="0" />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button class="btn btn-danger" type="reset" name="submit">Làm mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
         $("#category").change(function () {
             var idCategory = $(this).val();
             $.get("admin/ajax/tintuc/"+idCategory,function (data) {
                 $("#loaitin").html(data);
             });
         });
    });
</script>

    @endsection