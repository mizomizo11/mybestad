@extends('layouts.site.master')

@section('breadcrumb')
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.open_consultations') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
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




@endsection
