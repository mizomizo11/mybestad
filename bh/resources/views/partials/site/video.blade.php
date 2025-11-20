<div class="container" style="margin-bottom: 50px;margin-top: 150px;">
    <div class="row" style=" ">
        <div class="col-md-12" style="text-align:center ">
            <h5>
                @if(App::getLocale() == 'ar') {!! $video->details_ar !!}  @else  {!! $video->details_en !!}  @endif
            </h5>
        </div>
    </div>
</div>
<div class="container" style="margin-bottom: 50px;margin-top: 20px;">
    <div class="row" style="text-align: center ">
        <iframe width="650" height="450" src="{{$video->link}} " style="margin: auto"></iframe>
    </div>
</div>
