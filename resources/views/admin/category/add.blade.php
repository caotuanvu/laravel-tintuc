@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="">Sản phẩm &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">&nbsp;&nbsp;Tạo sản phẩm mới</li>
                </ul>
            </div>

            <div class="add-category add-product">
                <a href="" class="btn">Hủy</a>
                <button class="btn btn-primary" id="submit">Lưu</button>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/category/add" method="POST" name="main-form" id="main_form" class="row">
                <div class="flexbox-right col-md-7">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Tên thể loại</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên thể loại" class="form-control">
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

        $('#submit').click(function () {
            
        });
    </script>
    @endsection