@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="menu-header">
        <div class="menu-left">
            <i class="fab fa-accusoft"></i>
            <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                <li><a href="admin/user/list">User &nbsp;</a></li>\
                <li class="active">&nbsp;&nbsp;Danh sách user</li>
            </ul>
        </div>

        <div class="add-category">
            <a href="admin/user/add">Tạo tin mới</a>
        </div>
    </div>

    <div class="product-content">
        <ul class="nav nav-tabs">
            <li class="active">Home</li>
        </ul>
        <input type="text" class="form-control" placeholder="Tìm kiếm...">

        <div class="form">
            <form action="admin/user/list" method="POST" name="list-tintuc" id="product" enctype="multipart/form-data">
               {!! showNotification() !!}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" name="checked-toggle"/></th>
                        <th width="5%"><a href="#">Id</a></th>
                        <th width="22%"><a href="">Tên</a></th>
                        <th width="22%"><a href="#">Email</a></th>
                        <th width="10%"><a href="#">Level</a></th>
                        <th width="3%"><a href="#">Edit</a></th>
                        <th width="3%"><a href="#">Delete</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $us)
                        <tr>
                            <td><input type="checkbox" value="{{ $us->id }}" name="form[checkbox]"/></td>
                            <td>{{ $us->id }}</td>
                            <td>{{ $us->name }}</td>
                            <td>{!! $us->email  !!}</td>
                            <td>@if($us->level == 1) {{ 'admin'  }} @else {{'user'}} @endif</td>
                            <td> <a href="admin/user/edit/{{ $us->id }}" title="Sửa !"><i class="far fa-edit"></i>&nbsp;</a></td>
                            <td><a title="Xóa !" href="admin/user/delete/{{ $us->id }}"><i class="far fa-trash-alt"></i>&nbsp;</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
            {{ $user->links() }}
        </div>
    </div>
</div>

@endsection
{{--@section('script')--}}
    {{--<script type="text/javascript">--}}
        {{--function sortOrder() {--}}
            {{--$('form#product').submit();--}}
        {{--}--}}
    {{--</script>--}}
    {{--@endsection--}}