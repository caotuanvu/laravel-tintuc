@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="menu-header">
        <div class="menu-left">
            <i class="fab fa-accusoft"></i>
            <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                <li><a href="admin/slider/list">Slider &nbsp;</a></li>\
                <li class="active">&nbsp;&nbsp;Danh sách slider</li>
            </ul>
        </div>

        <div class="add-category">
            <a href="admin/slider/add">Tạo slider mới</a>
        </div>
    </div>

    <div class="product-content">
        <ul class="nav nav-tabs">
            <li class="active">Home</li>
        </ul>
        <input type="text" class="form-control" placeholder="Tìm kiếm...">

        <div class="form">
            <form action="admin/slider/list" method="POST" name="list-tintuc" id="product">
               {!! showNotification() !!}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" name="checked-toggle"/></th>
                        <th width="5%"><a href="#">Id</a></th>
                        <th width="15%"><a href="">Tên</a></th>
                        <th width="30%"><a href="#">Hình ảnh</a></th>
                        <th width="10%"><a href="#">Link</a></th>
                        <th width="20%"><a href="#">Nội dung</a></th>
                        <th width="3%"><a href="#">Edit</a></th>
                        <th width="3%"><a href="#">Delete</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slider as $sd)
                        <tr>
                            <td><input type="checkbox" value="{{ $sd->id }}" name="form[checkbox]"/></td>
                            <td>{{ $sd->id }}</td>
                            <td>{{ $sd->name }}</td>
                            <td><img width="350px" src="upload/slider/{{$sd->image}}"></td>
                            <td>{{ $sd->link }}</td>
                            <td>{!! $sd->content !!} </td>
                            <td> <a href="admin/slider/edit/{{ $sd->id }}" title="Sửa !"><i class="far fa-edit"></i>&nbsp;</a></td>
                            <td><a title="Xóa !" href="admin/slider/delete/{{ $sd->id }}"><i class="far fa-trash-alt"></i>&nbsp;</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
