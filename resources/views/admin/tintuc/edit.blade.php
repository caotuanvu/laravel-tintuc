@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/loaitin/list">Tin tức &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">{{ $tintuc->tieude }}&nbsp;&nbsp;</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/tintuc/edit/{{$loaitin->id}}/{{ $tintuc->id }}" method="POST" name="main-form" id="main-from" class="row" enctype="multipart/form-data">
                <div class="flexbox-right col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Thể loại</label>
                        <select name="category" class="form-control" id="category">
                            <option value="0">Chọn thể loại</option>
                            @foreach($category as $ten => $id)
                                <option @if($id == $loaitin->id_category) {{"selected" }}@endif  value="{{$id}}">{{$ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Loại tin</label>

                        <select name="loaitin" class="form-control" id="loaitin">
                            <option  value="{{$loaitin->id}}">{{$loaitin->ten}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="tieude" value="{{ $tintuc->tieude }}" placeholder="Nhập tiêu đề" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="name">Tóm tắt</label>
                        <textarea id="editor" name="tomtat" class="form-control ckeditor" rows="5">{{ $tintuc->tomtat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">Nội dung</label>
                        <textarea class="ckeditor" name="noidung" cols="80" rows="10">{{ $tintuc->noidung }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hinhanh">Hình ảnh</label>
                        <p><img width="400px" src="upload/tintuc/{{$tintuc->hinh}}" alt=""></p>
                        <input type="file" name="hinhanh" />
                    </div>

                    <div class="form-group">
                        <label>Nổi bật</label>

                        <label class="radio-inline" for="noibat">Có</label>

                         <input type="radio" @if($tintuc->noibat == 1) {{"checked"}}@endif name="noibat" value="1" />

                        <label class="radio-inline">Không</label>
                        <input type="radio" @if($tintuc->noibat == 0)  {{"checked"}} @endif name="noibat" value="0" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Lưu</button>
                        <button class="btn btn-danger" type="reset" name="submit">Làm mới</button>
                    </div>
                </div>
            </form>
            <div class="menu-header" style="background:#f1f1f1;">
                <div class="menu-left">
                    <i class="fab fa-accusoft"></i>
                    <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                        <li class="active">Comment&nbsp;</li>
                    </ul>
                </div>
            </div>
        <div class="comment">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="5%"><input type="checkbox" name="checked-toggle"/></th>
                    <th width="5%"><a href="#">id</a></th>
                    <th width="15%"><a href="">user</a></th>
                    <th width="35%"><a href="#">Nội dung</a></th>
                    <th width="3%"><a href="#">Delete</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach($comment as $cm)
                    <tr>
                        <td><input type="checkbox" value="{{ $cm->id }}" name="form[checkbox]"/></td>
                        <td>{{ $cm->id }}</td>
                        <td>{{ $cm->user->name }}</td>
                        <td>{!! $cm->noidung  !!}</td>
                        <td><a title="Xóa !" href="admin/comment/delete/{{ $cm->id }}/{{ $loaitin->id }}/{{ $tintuc->id }}"><i class="far fa-trash-alt"></i>&nbsp;Xóa !</a></td>
                    </tr>
                @endforeach
                {{ $comment->links() }}
                </tbody>
            </table>
        </div>

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