@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/tintuc/list">Tin tức &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">&nbsp;&nbsp;Tạo tin tức mới</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/tintuc/add" method="POST" name="main-form" id="main-from" class="row" enctype="multipart/form-data">
                <div class="flexbox-right col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Thể loại</label>
                        <select name="category" class="form-control" id="category">
                            <option value="0">Chọn thể loại</option>
                            @foreach($category as $ten => $id)
                            <option value="{{$id}}">{{$ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Loại tin</label>
                        <select name="loaitin" class="form-control" id="loaitin">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="tieude" value="{{ old('tieude') }}" placeholder="Nhập tiêu đề" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="name">Tóm tắt</label>
                        <textarea id="editor" name="tomtat" class="form-control ckeditor" rows="5">{{ old('tomtat') }}</textarea>
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
                        <label>Nổi bật</label>

                        <label class="radio-inline" for="noibat">Có</label>
                        <input type="radio" name="noibat" value="1" checked />

                        <label class="radio-inline">Không</label>
                        <input type="radio" name="noibat" value="0" />
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

    CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
</script>
@endsection