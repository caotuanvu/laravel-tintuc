<!DOCTYPE html>
<head>
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/trumbowyg.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/btn-4.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/fontawesome.css">
    <script type="text/javascript" src="admin_asset/js/jquery-3-2.js"></script>
    <script type="text/javascript" src="admin_asset/js/trumbowyg.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/pasteimage.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/cleanpaste.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/btn-4.js"></script>
    <script type="text/javascript" src="admin_asset/js/custom.js"></script>
    <script type="text/javascript" src="admin_asset/js/submit.js"></script>
    <script type="text/javascript" src="admin_asset/js/fontawesome-all.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/fa-v4-shims.min.js"></script>
    <title>Login</title>
</head>

<body>
<div class="container">
    <div class="row">

        <div class="my-form col-md-4 offset-md-4">
            {!! showErrors($errors,'col-md-12') !!}
            {!! showNotification('col-md-12') !!}
            <form action="admin/user/login" method="POST" id="form-login">
                <header>
                    <i class="fa fa-user"></i>
                    Đăng nhập vào hệ thống
                </header>
                <div class="form-content">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="email">E - mail :</label>
                        <input type="email" name="email" value="{{ old('email') }}" title="Nhập địa chỉ email" class="form-control"
                               id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="text" name="password" value="{{ old('password') }}" title="Nhập Password" class="form-control"
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

</body>
