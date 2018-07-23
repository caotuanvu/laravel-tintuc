@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/loaitin/list">Loại tin &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">&nbsp;&nbsp;{{ $loaitin->category->ten }}</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/loaitin/edit/{{ $loaitin->id }}" method="POST" name="main-form" id="main-from" class="row">
                <div class="flexbox-right col-md-7">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="name">Thể loại</label>
                        <select id="theloai" name="category" class="form-control">
                            @foreach($category as $ls)
                                <option @if($ls->id == $loaitin->id_category) {{"selected" }}@endif value="{{ $ls->id }}">{{ $ls->ten }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên loại tin</label>
                        <input type="text" name="name" value="{{$loaitin->ten }}" placeholder="Nhập tên loại tin" class="form-control">
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