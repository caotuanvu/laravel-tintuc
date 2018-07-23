@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="menu-header">
        <div class="menu-left">
            <i class="fab fa-accusoft"></i>
            <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                <li><a href="admin/tintuc/list">Tin tức &nbsp;</a></li>\
                <li class="active">&nbsp;&nbsp;Danh sách tin tức</li>
            </ul>
        </div>

        <div class="add-category">
            <a href="admin/tintuc/add">Tạo tin mới</a>
        </div>
    </div>

    <div class="product-content">
        <ul class="nav nav-tabs">
            <li class="active">Home</li>
        </ul>
        <input type="text" class="form-control" placeholder="Tìm kiếm...">

        <div class="form">
            <form action="admin/tintuc/listsss" method="POST" name="list-tintuc" id="product" enctype="multipart/form-data">
               {!! showNotification() !!}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" name="checked-toggle"/></th>
                        <th width="5%"><a href="#">Id</a></th>
                        <th width="22%"><a href="javascript:sortOrder();">Tiêu đề</a></th>
                        <th width="22%"><a href="#">Tóm tắt</a></th>
                        <th width="10%"><a href="#">Loại tin</a></th>
                        <th width="10%"><a href="#">Thể loại</a></th>
                        <th width="5%"><a href="#">Xem</a></th>
                        <th width="8%"><a href="#">Nổi bật</a></th>
                        <th width="3%"><a href="#">Edit</a></th>
                        <th width="3%"><a href="#">Delete</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tintuc as $tl)
                        <tr>
                            <td><input type="checkbox" value="{{ $tl->id }}" name="form[checkbox]"/></td>
                            <td>{{ $tl->id }}</td>
                            <td>{{ $tl->tieude }}<p><img width="100px" src="upload/tintuc/{{$tl->hinh}}" /> </p></td>
                            <td>{!! $tl->tomtat  !!}</td>
                            <td>{{ $tl->loaitin->ten }}</td>
                            <td>{{ $tl->loaitin->category->ten }}</td>
                            <td>{{ $tl->views }}</td>
                            <td>
                              @if($tl->noibat == 0)
                                {{'Không'}}
                                  @else {{'Có'}}
                                  @endif
                            </td>
                            <td> <a href="admin/tintuc/edit/{{ $tl->loaitin->id }}/{{ $tl->id }}" title="Sửa !"><i class="far fa-edit"></i>&nbsp;</a></td>
                            <td><a title="Xóa !" href="admin/tintuc/delete/{{ $tl->id }}"><i class="far fa-trash-alt"></i>&nbsp;</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
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