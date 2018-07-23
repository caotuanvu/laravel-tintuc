@extends('layout.index')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid" id="load-content">
            <div class="flexbox-grid">
                <form action="user/{{$user->id}}" method="post"  class="row">
                    <div class="flexbox-right col-md-6 offset-md-3">
                        {!! showErrors($errors) !!}
                        {!! showNotification() !!}
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
                            <button class="btn btn-primary" type="submit">Sua</button>
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