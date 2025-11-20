@extends('layouts.site.master')

@section('breadcrumb')
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.how_we_work') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif " >
        <div class="col-md-12">
            @if(App::getLocale() == 'ar') {!! $howwework->details_ar !!}  @else  {!! $howwework->details_en !!}  @endif
{{--            @if(App::getLocale() == 'ar')  {{$howwework->details_ar}}  @else  {{$howwework->details_en}}   @endif--}}
        </div>
        </div>
    </div>


    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: center " >
            <video width="650" height="450" controls style="margin: auto">
                <source src="{{asset(Config::get('app.upload'))}}/{{$howwework->{"video_".app()->getLocale()} }}" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>

        </div>
    </div>



@endsection
