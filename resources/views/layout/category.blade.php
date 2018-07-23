<ul class="nav navbar-nav" id="navbarSupportedContent">
    <li class="active nav-link text-center font-weight-bold btn-danger">Menu</li>
    @foreach($category as $ct)
        @if(count($ct->loaitin) > 0)
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$ct->ten}}
                        <span class="caret"></span></a>
                    @foreach($ct->loaitin as $lt)
                    <ul class="dropdown-menu">
                        <li><a href="loaitin/{{$lt->tenkhongdau}}/{{$lt->id}}.html">{{$lt->ten}}</a></li>
                    </ul>
                    @endforeach
                </li>
        @endif
    @endforeach
</ul>