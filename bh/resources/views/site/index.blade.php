@extends('layouts.site.master')

{{--@section('carousel1')--}}
{{--    @include('layouts.site.carousel1')--}}
{{--@endsection--}}
@section('carousel1')
    @include('partials.site.carousel1')
@endsection
@section('content')
    @include('partials.site.services')
    <div class="container" style="margin-bottom: 50px;margin-top: 50px;">
        <div class="row" style=" ">
            <div class="col-md-12" style="text-align:center ">
                <h5>
                    @if(App::getLocale() == 'ar') {!! $video->details2_ar !!}  @else  {!! $video->details2_en !!}  @endif
                </h5>
            </div>
        </div>
    </div>


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
    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: center ">
            {{--        width="650" height="450"    <iframe width="650" height="450" src="{{$video->link2}} " style="margin: auto">  </iframe>--}}
            <video class="col-md-10"  controls style="margin: auto">
                <source src="{{asset(Config::get('app.upload'))}}/{{$video->{"video2_".app()->getLocale()} }}"
                        type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

<div style="display: none">
    <a href='http://www.freevisitorcounters.com'>Free Counter</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=c0702a9a6342b2abfb6f2487863d4976e18851d0'></script>
    <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1214853/t/0"></script>



</div>

@endsection

