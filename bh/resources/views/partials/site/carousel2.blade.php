<div id="carouselExampleIndicators2" class="carousel slide col-md-6 col-sm-12 " data-ride="carousel"
     style="margin: auto;margin-top: 50px;">

    <ol class="carousel-indicators">
        @foreach ($carousels2 as $carousel3)
            @if($loop->index==0 )
                <li data-target="#carouselExampleIndicators2" data-slide-to="{{$loop->index}}" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators2" data-slide-to="{{$loop->index}}"></li>
            @endif
        @endforeach

    </ol>
    <div class="carousel-inner">
        @foreach ($carousels2 as $carousel3)

            @if($loop->index==0 )
                <div class="carousel-item active">
                    <div class="row" style="background-color: #ddd;">
                        <div class="col-md-6">
                            <img class="d-block w-100"
                                 src="{{asset(Config::get('app.upload'))}}/{{$carousel3->image}}"
                                 style="height: 300px;" alt="First slide">
                        </div>
                        <div class="col-md-6" style="text-align: center;padding: 20px;">
                            <h3> {{$carousel3->{"name_".app()->getLocale()}  }}  </h3>
                            <h5>  {{$carousel3->{"details_".app()->getLocale()}  }} </h5>
                        </div>
                    </div>
                </div>
            @else
                <div class="carousel-item ">
                    <div class="row" style="background-color: #ddd;">
                        <div class="col-md-6">
                            <img class="d-block w-100"
                                 src="{{asset(Config::get('app.upload'))}}/{{$carousel3->image}}"
                                 style="height: 300px;" alt="First slide">
                        </div>
                        <div class="col-md-6" style="text-align: center;padding: 20px;">
                            <h3>  {{$carousel3->{"name_".app()->getLocale()}  }}  </h3>
                            <h5>  {{$carousel3->{"details_".app()->getLocale()}  }}    </h5>


                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>


    <style type="text/css">
        .carousel-indicators li {

            height: 10px;
            background-color: #eb1f24;
            border: 1px solid #ffcb09;
        }
    </style>

    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
