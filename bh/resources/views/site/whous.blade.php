@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.whous') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif " >
            @if(App::getLocale() == 'ar')  {{$whous->whous}}  @else  {{$whous->whous_eng}}   @endif
        </div>
    </div>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #12bad7;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.vision') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif " >
            @if(App::getLocale() == 'ar')  {{$whous->vision}}  @else  {{$whous->vision_eng}}   @endif
        </div>
    </div>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #12bad7;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.mission') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row" style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif " >
            @if(App::getLocale() == 'ar')  {{$whous->mission}}  @else  {{$whous->mission_eng}}   @endif
        </div>
    </div>
@endsection
