<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="min-height: 200px; padding-top: 10px">
        <ol class="carousel-indicators">
            <?php $i = 0;?>
            @foreach($slide as $sl)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
                <?php $i++;?>
            @endforeach
        </ol>
        <div class="carousel-inner">
            <?php $i = 0;?>
            @foreach($slide as $sl)
            <div @if($i == 0) class="carousel-item active" @else class="carousel-item"  @endif>
                <a href="{{$sl->link}}"><img height="380" class="d-block w-100 img-responsive" src="upload/slider/{{$sl->image}}" alt=""></a>
                <h5 class="text-center text-danger hidden-sm">{!! $sl->content !!}</h5>
            </div>
                    <?php $i++;?>
                @endforeach
        </div>



    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>