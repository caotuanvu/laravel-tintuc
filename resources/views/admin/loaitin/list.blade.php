@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="menu-header">
        <div class="menu-left">
            <i class="fab fa-accusoft"></i>
            <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                <li><a href="admin/loaitin">Loại tin &nbsp;</a></li>\
                <li class="active">&nbsp;&nbsp;Danh sách loại tin</li>
            </ul>
        </div>

        <div class="add-category">
            <a href="admin/loaitin/add">Tạo loại tin mới</a>
        </div>
    </div>

    <div class="product-content">
        <ul class="nav nav-tabs">
            <li class="active">Home</li>
        </ul>
        <input type="text" class="form-control" placeholder="Tìm kiếm...">

        <div class="form">
            <form action="#" name="product" id="product" method="post">
                {!! showNotification() !!}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" name="checked-toggle"/></th>
                        <th width="15%"><a href="#">Id</a></th>
                        <th width="20%"><a href="#">Tên</a></th>
                        <th width="20%"><a href="#">Tên không dấu</a></th>
                        <th width="20%"><a href="#">Thể loại</a></th>
                        <th width="10%"><a href="#">Edit</a></th>
                        <th width="10%"><a href="#">Delete</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loaitin as $tl)
                        <tr>
                            <td><input type="checkbox" value="{{ $tl->id }}" name="checkbox"/></td>
                            <td>{{ $tl->id }}</td>
                            <td>{{ $tl->ten }}</td>
                            <td>{{ $tl->tenkhongdau }}</td>
                            <td>{{ $tl->category->ten }}</td>
                            <td> <a href="admin/loaitin/edit/{{ $tl->id }}"><i class="far fa-edit"></i>&nbsp;Edit</a></td>
                            <td><a href="admin/loaitin/delete/{{ $tl->id }}"><i class="far fa-trash-alt"></i>&nbsp;Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        {{$loaitin->links()}}
    </div>
</div>

@endsection