    <style>
        @media screen and (min-width:200px) and (max-width:600px){

            .my_h{height: 200px !important;}
        }
        @media screen and (min-width:601px) and (max-width:800px){
            .my_h{height: 400px !important;}
        }
        @media screen and (min-width:801px) and (max-width:1200px){
            .my_h{height: 680px}
        }
        @media screen and (min-width:1201px) and (max-width:2800px){
            .my_h{height: 937px}
        }

    </style>

    {{--    <h1 class="animate__animated animate__bounce">An animated element</h1>--}}
    <div class="container-fluid" style=" margin-top: -80px;">
        <div class="row radius-1 shadow-md overflow-hidden">
            <style>
                .my-element
                {
                    display: inline-block;
                    margin: 0 0.5rem;
                    animation: pulse; /* referring directly to the animation's @keyframe declaration */
                    animation-duration: 10s; /* don't forget to set a duration! */
                }
            </style>

            <div id="carouselExampleIndicators" class="carousel slide  " data-interval="2500" data-ride="carousel" style="width: 100%">
                <ol class="carousel-indicators">
                    @foreach ($carousels as $carousel)
                        <li data-target="#carouselExampleIndicators"  data-slide-to="{{$loop->index}}" class="@if($loop->index==0 ) active @endif"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($carousels as $carousel5)
                        <div class="carousel-item @if($loop->index==0 ) active @endif">
                            <img src='{{asset(Config::get('app.upload'))}}/{{$carousel5->image}}'  alt= "{{$carousel5->name}}"
                                 class="my-element my_h  "    style="width: 100%;"    >
{{--                            background-color:{{ $settings->{'primary_color'}."88" }}--}}
                            <div  class="carousel-caption animate__animated animate__fadeIn" data-aos="flip-left" style="top: 40% ;bottom: auto;background-color:#0f9bc088">

                                <h1 style="font-weight: bold;color: #fff" class="animate__animated animate__fadeInRight animate__slow">
                                    {{ $carousel5->{'name_'.app()->getLocale()} }}
                                </h1>
                                <h2 style="color: #fff" class="animate__animated animate__fadeInRight animate__slow">
                                    {{ $carousel5->{'details_'.app()->getLocale()} }}
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="transform: rotate(180deg);">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="transform: rotate(180deg);">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

