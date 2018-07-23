@extends('admin.layout.index')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="load-content">
        <div class="menu-header" style="background:#f1f1f1;">
            <div class="menu-left">
                <i class="fab fa-accusoft"></i>
                <ul class="breadcrumb my-breadcrumb" style="background:transparent; display: inline-flex;">
                    <li><a href="admin/loaitin/list">User &nbsp;&nbsp;</a></li>
                    \
                    <li class="active">{{ $user->name }}&nbsp;&nbsp;</li>
                </ul>
            </div>
        </div>

        <div class="flexbox-grid">
            {!! showErrors($errors) !!}
            {!! showNotification() !!}
            <form action="admin/user/edit/{{$user->id}}" method="POST" name="main-form" id="main-from" class="row" enctype="multipart/form-data">
                <div class="flexbox-right col-md-12">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" placeholder="Nhập tên" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" disabled name="email" value="{{ $user->email }}" placeholder="Nhập email" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="changePass" id="changePass">
                        <label for="password">Đổi password</label>
                        <input type="password" disabled name="password" placeholder="Nhập password mới" class="form-control password">
                    </div>

                    <div class="form-group">
                        <label for="password">Nhập lại password</label>
                        <input type="password" disabled name="passwordAgain" placeholder="Nhập lại password" class="form-control password">
                    </div>


                    <div class="form-group">
                        <label>Level</label>

                        <label class="radio-inline" for="noibat">Admin</label>
                         <input type="radio" @if($user->level == 1) {{"checked"}}@endif name="level" value="1" />

                        <label class="radio-inline">User</label>
                        <input type="radio" @if($user->level == 0)  {{"checked"}} @endif name="level" value="0" />
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
        $(document).ready(function(){
             $('#changePass').change(function () {
                 if($(this).is(':checked'))
                 {
                    $('.password').removeAttr("disabled");
                 }else
                 {
                     $('.password').attr("disabled","");
                 }
             })
        });
    </script>
    @endsection