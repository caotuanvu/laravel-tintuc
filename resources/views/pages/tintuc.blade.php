@extends('layout.index')
@section('content')
<div class="container">
    <div class="content">
        {{--start menu category--}}
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="min-height: 50px; line-height: 50px; color: red"><h3>{{$tintuc->tieude}}</h3></div>
                    <div class="panel-body">
                        <div class="img">
                            <img width="770px" class="img-responsive" src="upload/tintuc/{{$tintuc->hinh}}" alt="">
                        </div>
                        <div class="content">
                           <p>{!!$tintuc->noidung  !!}</p>
                        </div>
                        <div class="comment">
                            @if(Auth::user())
                            <div class="write-comment" style="margin-bottom: 20px;">
                                <h4 style="color: #f0ad4e">Comment bài viết !</h4>
                                <form action="comment/{{$tintuc->id}}" method="POST">
                                    <h5 style="color:red;"> {{ $errors->first('comment') }}</h5>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <textarea class="ckeditor" id="comment" name="comment" rows="5" cols="10"></textarea>
                                    <input type="submit" class="btn btn-success" value="Bình luận">
                                </form>
                            </div>
                           @endif
                            <div class="user-comment">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="upload/user/noavt.png" class="media-object" style="width:60px; padding-left: 20px">
                                    </div>
                                    <div class="media-body">
                                         @foreach($tintuc->comment as $cm)
                                            <h5 class="media-heading">{{$cm->user->name}}</h5><small>{{$cm->created_at}}</small>
                                            <p>{!!  $cm->noidung!!}</p>
                                            @endforeach
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tinlienquan" style="border: 1px solid #f0ad4e; padding: 3px; margin-top: 10px;">
                    <h3 style="background: #fff3cd; padding: 5px 10px; color: red">Tin liên quan</h3>
                    @foreach($tinlienquan as $tlq)
                    <div class="row content-tlq">
                        <div class="col-md-3">
                            <img width="60px" class="img-responsive" src="upload/tintuc/{{$tlq->hinh}}" alt="">
                        </div>
                        <div class="col-md-9">
                            <a href="tintuc/{{$tlq->id}}/{{$tlq->tieudekhongdau}}.html">{{$tlq->tieude}}</a>
                            <p>{!! $tlq->tomtat !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>


                <div class="tinnoibat" style="border: 1px solid #f0ad4e; padding: 3px; margin-top: 10px;">
                    <h3 style="background: #fff3cd; padding: 5px 10px; color:red">Tin nổi bật</h3>
                    @foreach($tinnoibat as $tlq)
                        <div class="row content-tlq">
                            <div class="col-md-3">
                                <img width="60px" class="img-responsive" src="upload/tintuc/{{$tlq->hinh}}" alt="">
                            </div>
                            <div class="col-md-9">
                                <a href="tintuc/{{$tlq->id}}/{{$tlq->tieudekhongdau}}.html">{{$tlq->tieude}}</a>
                                <p>{!! $tlq->tomtat !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="admin_asset/ckeditor_standard/ckeditor.js"></script>

@endsection
@section('script')
    <script type="text/javascript">

        CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
    </script>
@endsection