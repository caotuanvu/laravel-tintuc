@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/slider/list">Slider &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">&nbsp;&nbsp;Tạo slider  mới</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/slider/add" method="POST" name="main-form" id="main-from" class="row" enctype="multipart/form-data">
                <div class="flexbox-right col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Nhập tên" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Link</label>
                        <input type="text"  name="link" value="{{ old('link') }}" placeholder="Nhập link" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="name">Nội dung</label>
                        <textarea class="ckeditor" name="noidung" cols="80" rows="10">{{ old('noidung') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hinhanh">Hình ảnh</label>
                        <input type="file" name="hinhanh" />
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
