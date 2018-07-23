@extends('layout.index')
@section('content')
    <div class="container">
        <div class="content">
            {{--start menu category--}}
            <div class="row">
                <div class="col-md-3 content-left">
                    @include('layout.category')
                </div>
                {{--end menu category--}}
                <div class="col-md-9 content-right">
                    <div class="panel panel-default">
                        <div class="panel-heading text-danger bg-primary" style="padding: 19px; font-weight: bold; ">Từ khóa: <span style="color: #ffffff; font-style: italic">{{ $tukhoa }}</span></div>
                        <div class="panel-body"  style=" border: 1px solid #1c7430;">
                            @if(count($tintuc) > 0)
                                @foreach($tintuc as $tin)
                                    <div class="row row-tintuc">
                                        <div class="col-md-4">
                                            <a href=""><img class="img-responsive" width="230px" src="upload/tintuc/{{$tin->hinh}}" alt=""></a>
                                        </div>
                                        <div class="col-md-8">
                                            <h5> {!! focusText($tin->tieude,$tukhoa) !!}</h5>
                                            <p>{!! focusText($tin->tomtat,$tukhoa) !!}<span><a class="btn btn-link btn-danger" href="tintuc/{{$tin->id}}/{{ $tin->tieudekhongdau}}.html">Xem tin</a> </span></p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{'Tin tức đang được được cập nhật !' }}
                            @endif
                        </div>
                    </div>
                    {{$tintuc->links()}}
                </div>

            </div>

        </div>

    </div>
@endsection