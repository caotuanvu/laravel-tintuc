@extends('layout.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="my-form col-md-4 offset-md-4">
             {!!showErrors($errors,'col-md-12')!!}
             {!! showNotification('col-md-12') !!}
            <form action="login" method="POST" id="form-login">
                <header>
                    <i class="fa fa-user"></i>
                    Đăng nhập vào hệ thống
                </header>
                <div class="form-content">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="email">E - mail :</label>
                        <input type="email" name="email" value="{{old('password')}}" title="Nhập địa chỉ email" class="form-control"
                               id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="text" name="password" value="{{old('password')}}" title="Nhập Password" class="form-control"
                               id="password">
                    </div>

                </div>
                <footer>
                    <button type="submit" class="btn btn-primary" id="btnLogin">
                        <i class="fa fa-sign-in"></i>&nbsp
                        Đăng nhập
                    </button>
                </footer>
            </form>
        </div>
    </div>
</div>
    @endsection
