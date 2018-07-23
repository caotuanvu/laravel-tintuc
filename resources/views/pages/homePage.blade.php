@extends('layout.index')
@section('content')
<div class="container">
    @include('layout.slide')

    <div class="content">
        {{--start menu category--}}
        <div class="row">
            <div class="col-md-3 content-left">
                @include('layout.category')
            </div>
            {{--end menu category--}}
            <div class="col-md-9 content-right">
                <div class="panel panel-default">
                    <div class="panel-heading text-danger bg-primary" style="padding: 20px; font-weight: bold; ">Tin tức trực tuyến</div>
                    <div class="panel-body">
                        @foreach($category as $ct)
                            @if(count($ct->loaitin) > 0)
                                @if(count($ct->tintuc) > 0 )
                            <div class="row row-tintuc">
                                <div class="col-md-8">
                                    {{$ct->ten}} |
                                    @foreach($ct->loaitin as $lt)
                                         <small><a href="loaitin/{{$lt->tenkhongdau}}/{{$lt->id}}.html">{{$lt->ten}}</a></small> |
                                    @endforeach
                                    <?php
                                    $tinnoibat = $ct->tintuc->where('noibat',1)->sortByDesc('created_at')->take(5);
                                    $tin1       = $tinnoibat->shift();
                                    ?>
                                    <div class="row">
                                        <div class="col-md-4"><img width="160px" class="img-responsive" src="upload/tintuc/{{$tin1['hinh']}}" alt=""></div>
                                        <div class="col-md-8">
                                            <h5 class="bg-gray-active">{{$tin1['tieude']}}</h5>
                                            <span class="noidung">{!! $tin1['tomtat'] !!}</span>
                                            <a class="btn btn-danger pull-right" href="tintuc/{{$tin1['id']}}/{{$tin1['tieudekhongdau']}}.html">Xem tin -></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @foreach($tinnoibat->all() as $tin)
                                     <span><i class="fas fa-newspaper"></i>&nbsp;&nbsp;</span><a href="tintuc/{{$tin['id']}}/{{$tin['tieudekhongdau']}}.html">{{ $tin['tieude'] }}</a>
                                        @endforeach
                                </div>
                            </div>
                                    @endif
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
    @endsection