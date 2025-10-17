@extends('layouts.site.master')
@section('content')

    <div class="container" style="margin-top: 50px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">

        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;">
                    {{ __('site.terms_and_conditions') }}
                </h3>
            </div>
        </div>
        <style>
            .reset {
                all: unset;
            }
        </style>
        <div class="row ">
            <div class="col-md-12" style="">
                @if(App::getLocale() == 'ar') {!! $terms_conditions->details_ar !!}  @else  {!! $terms_conditions->details_en !!}  @endif
            </div>
        </div>

    </div>


@endsection
