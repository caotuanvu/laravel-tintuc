<header class="main-header">
    <a href="admin/user/edit/{!! Auth::user()->id !!}" class="logo">
        <span class="logo-lg"><b>{!! Auth::user()->name !!}</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <a style="color: red" href="admin/user/checkout" class="pull-right">
            Logout
        </a>
    </nav>



</header>
