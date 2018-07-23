<!DOCTYPE html>
<html>
<head>
    <meta name="keywords" content="Vu develop">
    <meta name="description" content="mvc, php, from">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="refresh" content="3600">
    <base href="{{ asset('') }}">
    {{--<link rel="stylesheet" type="text/css" href="admin_asset/css/trumbowyg.min.css">--}}
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/fontawesome.css">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/admin.css">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/style.css">
    <title>@yield('title')</title>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.layout.header')
  <!-- Left side column. contains the logo and sidebar -->

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="seach" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu">
        <li class="header">SYSTEMS</li>
        <li class="treeview">
          <a href="#"><i class="fab fa-accusoft my_icon"></i><span>Quản lý chung</span> <i class="fas fa-angle-down pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admin/user/list"><i class="fas fa-users my_icon"></i></i>User</a></li>
            <li><a href="admin/user/add"><i class="fas fa-user-plus my_icon"></i></i>Thêm User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fas fa-newspaper my_icon"></i><span>Thể loại</span><i class="fas fa-angle-down pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admin/category/list"><i class="fa fa-list my_icon"></i> Danh sách</a></li>
            <li><a href="admin/category/add"><i class="fas fa-plus my_icon"></i> Thêm</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fas fa-newspaper my_icon"></i><span>Loại tin</span><i class="fas fa-angle-down pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admin/loaitin/list"><i class="fa fa-list my_icon"></i> Danh sách</a></li>
            <li><a href="admin/loaitin/add"><i class="fas fa-plus my_icon"></i> Thêm</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fas fa-newspaper my_icon"></i><span>Tin tức</span><i class="fas fa-angle-down pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admin/tintuc/list"><i class="fa fa-list my_icon"></i> Danh sách</a></li>
            <li><a href="admin/tintuc/add"><i class="fas fa-plus my_icon"></i></i> Thêm</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-images my_icon"></i><span>Slider</span><i class="fas fa-angle-down pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="admin/slider/list"><i class="fa fa-list my_icon"></i> Danh sách</a></li>
            <li><a href="admin/slider/add"><i class="fas fa-plus my_icon"></i> Thêm</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
   @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <p>Coppy right 2018</p>
  </footer>
</div>
<script type="text/javascript" src="admin_asset/ckeditor_standard/ckeditor.js"></script>

</body>
{{--<script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>--}}
<script type="text/javascript" src="admin_asset\js\jQuery-2.2.0.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="admin_asset/js/app.min.js"></script>
    <script type="text/javascript" src="admin_asset/js/custom.js"></script>
    <script type="text/javascript" src="js/fontawesome-all.min.js"></script>


@yield('script')
<script type="text/javascript">

    $(document).ready(function(){
        $(".icon-notifi").click(function(){
            $("div.notification").hide('slow');
        });
    });

</script>
</html>










